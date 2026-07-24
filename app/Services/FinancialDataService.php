<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FinancialDataService
{
    protected $coinMarketCapKeys = [
        'c73686e6-792f-44de-8dde-e4467f8f4a9a',
        'a599425a-479c-4112-9e6c-e02513b1b177',
        'a02010b2-078a-4b9f-90f3-40d4dae5a755'
    ];

    protected $alphaVantageKey = 'CHDB1J8K8HBR1OIY';

    /**
     * Get coin value in USD for a quantity
     */
    public function coinValue(string $coin, float $quantity): float
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start'   => '1',
            'limit'   => '200',
            'convert' => 'USD',
        ];

        $qs = http_build_query($parameters);
        $request = "{$url}?{$qs}";
        $data = null;

        foreach ($this->coinMarketCapKeys as $key) {
            $response = Http::withHeaders([
                'Accepts' => 'application/json',
                'X-CMC_PRO_API_KEY' => $key
            ])->get($request);

            if ($response->successful()) {
                $data = $response->json();
                break;
            }
        }

        if (!$data) {
            throw new \Exception("All CoinMarketCap API keys failed.");
        }

        $cashBal = 0;
        foreach ($data['data'] as $coinData) {
            if (strtoupper($coinData['symbol']) === strtoupper($coin)) {
                $cashBal = round($coinData['quote']['USD']['price'] * $quantity, 2);
                break;
            }
        }


        $ticker['current_price'] = $cashBal;
        return (float)$ticker['current_price'];
    }

    /**
     * Get forex exchange rate
     */
    public function forexValue(string $pair): float
    {
        if (strlen($pair) !== 6) {
            throw new \InvalidArgumentException('Invalid currency pair format.');
        }

        $base  = substr($pair, 0, 3);
        $quote = substr($pair, 3, 3);

        $json = file_get_contents(
            "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency={$base}&to_currency={$quote}&apikey={$this->alphaVantageKey}"
        );

        $data = json_decode($json, true);

        if (!isset($data['Realtime Currency Exchange Rate']['5. Exchange Rate'])) {
            throw new \Exception('Unable to fetch exchange rate.');
        }

        $ticker['current_price'] = $data['Realtime Currency Exchange Rate']['5. Exchange Rate'];
        return (float)$ticker['current_price'];
    }

    /**
     * Get stock price
     */
    public function stockValue(string $symbol): float
    {
        $json = file_get_contents(
            "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$this->alphaVantageKey}"
        );

        $data = json_decode($json, true);

        if (!isset($data['Global Quote']['05. price'])) {
            throw new \Exception('Unable to fetch stock price.');
        }

        $ticker['current_price'] = $data['Global Quote']['05. price'];
        return (float)$ticker['current_price'];
    }

    public function coinGeckoValue(string $coin): float
    {
        $coin = strtolower(str_replace('USDT', '', $coin));
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => $coin,
            'vs_currencies' => 'usd',
        ]);

        $data = $response->json();
        return $data[$coin]['usd'] ?? throw new Exception('CoinGecko price fetch failed.');
    }

    public function getPrice(string $symbol, string $market, float $quantity = 1): ?float
    {
        return match (strtolower($market)) {
            'crypto' => $this->coinValue($symbol, $quantity),
            'forex'  => $this->forexValue($symbol),
            'stocks' => $this->stockValue($symbol),
            default  => null,
        };
    }
}

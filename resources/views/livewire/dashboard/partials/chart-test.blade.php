<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    {{-- <div class="tradingview-widget-container">
        <div id="tradingview_51088"></div>
        <div class="tradingview-widget-copyright"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
        <script type="text/javascript">
            new TradingView.widget(
                {
                    "width": "100%",
                    "height": 600,
                    "symbol": "TWTR",
                    "timezone": "Etc/UTC",
                    "theme": "dark",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "range": "YTD",
                    "container_id": "tradingview_51088"
                }
            );
        </script>
    </div> --}}

    <?php

function coinvalue($coin, $quantity)
{
    // Ensure the input is in the correct format (e.g., USDJPY)


    // Divide the input into base and quote
    $base = substr($coin, 0, strlen($coin) - 4); // Remove last 4 characters
    $quote = substr($coin, -3); // Get the last 3 characters as quote
    dd($base);
    // Fetch data from CoinMarketCap API
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
    $parameters = [
        'start' => '1',
        'limit' => '200',
        'convert' => 'USD'
    ];

    // Your CoinMarketCap API key
    $apiKey = 'c73686e6-792f-44de-8dde-e4467f8f4a9a';

    $qs = http_build_query($parameters);
    $request = "{$url}?{$qs}";

    // Initialize cURL session
    $ch = curl_init($request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: ' . $apiKey
    ]);

    // Execute cURL and decode the response
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        return ['error' => 'Failed to fetch data from CoinMarketCap API.'];
    }

    $data = json_decode($response, true);
    $cash_bal = 0;

    // Loop through the data to find the coin and calculate its value
    for ($i = 0; $i < 200; $i++) {
        $coin_data = [
            $data['data'][$i]['cmc_rank'],
            $data['data'][$i]['symbol'],
            $data['data'][$i]['name'],
            $data['data'][$i]['quote']['USD']['price']
        ];

        // Match the coin symbol
        if ($coin_data[1] == strtoupper($base)) {
            $cash_bal = $coin_data[3] * $quantity;
            $cash_bal = round($cash_bal, 2);
            break;
        }
    }

    // Return the cash balance
    return ['cash_balance' => $cash_bal];
}

// Example usage:
$coin = 'BTCUSDT'; // Example coin symbol (Bitcoin in USD)
$quantity = 1;    // Example quantity
$result = coinvalue($coin, $quantity);

echo json_encode($result, JSON_PRETTY_PRINT);

?>

</body>

</html>
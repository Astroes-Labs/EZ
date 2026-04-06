@php
    $symbols = [
        'Stocks' => [
            ['value' => 'AMD', 'label' => 'AMD'],
            ['value' => 'V', 'label' => 'VISA'],
            ['value' => 'NKE', 'label' => 'NIKE'],
            ['value' => 'TSLA', 'label' => 'TESLA'],
            ['value' => 'AAPL', 'label' => 'APPLE'],
            ['value' => 'ADBE', 'label' => 'ADOBE'],
            ['value' => 'NVDA', 'label' => 'NVIDIA'],
            ['value' => 'PYPL', 'label' => 'PAYPAL'],
            ['value' => 'FUBO', 'label' => 'FUBOTV'],
            ['value' => 'NIO', 'label' => 'NIO INC'],
            ['value' => 'NLFX', 'label' => 'NETFLIX'],
            ['value' => 'TWTR', 'label' => 'TWITTER'],
            ['value' => 'GOOGL', 'label' => 'GOOGLE'],
            ['value' => 'AMZN', 'label' => 'AMAZON'],
            ['value' => 'PLTR', 'label' => 'PALANTIR'],
            ['value' => 'FB', 'label' => 'FACEBOOK'],
            ['value' => 'GME', 'label' => 'GAMESTOP'],
            ['value' => 'OPGN', 'label' => 'OPGEN INC'],
            ['value' => 'OTRK', 'label' => 'ONTRAK INC'],
            ['value' => 'MSFT', 'label' => 'MICROSOFT'],
            ['value' => 'BB', 'label' => 'BLACKBERRY'],
            ['value' => 'MA', 'label' => 'MASTERCARD'],
            ['value' => 'FUV', 'label' => 'ARCIMOTO INC'],
            ['value' => 'CLOV', 'label' => 'CLOVER HEALTH'],
            ['value' => 'JUPW', 'label' => 'JUPITER WELLNESS'],
            ['value' => 'CCIV', 'label' => 'CHURCHILL CAPITAL'],
            ['value' => 'AMC', 'label' => 'AMC ENTERTAINMENT'],
        ],
        'Forex' => [
            ['value' => 'EURUSD', 'label' => 'EURUSD'],
            ['value' => 'EURJPY', 'label' => 'EURJPY'],
            ['value' => 'EURGBP', 'label' => 'EURGBP'],
            ['value' => 'EURAUD', 'label' => 'EURAUD'],
            ['value' => 'EURNZD', 'label' => 'EURNZD'],
            ['value' => 'EURCAD', 'label' => 'EURCAD'],
            ['value' => 'EURCHF', 'label' => 'EURCHF'],
            ['value' => 'EURZAR', 'label' => 'EURZAR'],
            ['value' => 'EURSGD', 'label' => 'EURSGD'],
            ['value' => 'EURPLN', 'label' => 'EURPLN'],
            ['value' => 'USDJPY', 'label' => 'USDJPY'],
            ['value' => 'USDCAD', 'label' => 'USDCAD'],
            ['value' => 'USDCHF', 'label' => 'USDCHF'],
            ['value' => 'USDTRY', 'label' => 'USDTRY'],
            ['value' => 'USDMXN', 'label' => 'USDMXN'],
            ['value' => 'USDZAR', 'label' => 'USDZAR'],
            // ... add other forex pairs
        ],
        'Crypto' => [
            ['value' => 'BTCUSDT', 'label' => 'Bitcoin'],
            ['value' => 'ETHUSDT', 'label' => 'Ethereum'],
            ['value' => 'TRXUSDT', 'label' => 'Tron'],
            ['value' => 'XRPUSDT', 'label' => 'Ripple'],
            ['value' => 'ZECUSDT', 'label' => 'ZCash'],
            ['value' => 'LTCUSDT', 'label' => 'Litecoin'],
            ['value' => 'NEOUSDT', 'label' => 'Neo'],
            ['value' => 'ADAUSDT', 'label' => 'Cardona'],
            ['value' => 'BNBUSDT', 'label' => 'Binance Coin'],
            ['value' => 'XLMUSDT', 'label' => 'Stellar'],
            ['value' => 'EOSUSDT', 'label' => 'EOS'],
            ['value' => 'DASHUSDT', 'label' => 'Dash'],
            ['value' => 'QTUMUSDT', 'label' => 'Qtum'],
            ['value' => 'IOTAUSDT', 'label' => 'IOTA'],
            ['value' => 'SOLUSDT', 'label' => 'Solana'],
            // ... add other crypto pairs
        ],
    ];
@endphp


@foreach($symbols as $market => $marketSymbols)
    @foreach($marketSymbols as $symbol)
        <option data-market="{{ $market }}" value="{{ $symbol['value'] }}">
            {{ $symbol['label'] }}
        </option>
    @endforeach
@endforeach
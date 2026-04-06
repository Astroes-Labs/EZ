<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use /* HasApiTokens, */ HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'dob',
        'email2',
        'country',
        'currency',
        'account_type',
        'plan',
        'referrer_id',
        'address',
        'city',
        'state',
        'postcode',
        'photo_front_view',
        'photo_back_view',
        'identity_verified',
        'account_verified',
        'vgin',
        'swiftcode',
        'pin',
        'login_code',
        'login_code_expires_at',
        'mobile_number',
        'photo_profile',
        'trading_balance',
        'locked_funds',
    ];

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'identity_verified' => 'boolean',
        'account_verified' => 'boolean',

        'login_code_expires_at' => 'datetime',
    ];



    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }



    public function getCurrencySymbol()
    {
        // Define an associative array of currency codes to their symbols
        $currencySymbols = [
            'USD' => '$',
            'GBP' => '£',
            'EUR' => '€',
            'AUD' => 'A$', // You can adjust this based on your preferred symbol format
        ];

        // Return the symbol based on the user's currency field
        return isset($currencySymbols[$this->currency]) ? $currencySymbols[$this->currency] : '';
    }

    public function displayBalance($balance)
    {
        // Format the balance with two decimal places and commas
        return number_format($balance, 2, '.', ',');
    }

    public function traders()
    {
        return $this->belongsToMany(Trader::class, 'trader_user')
            ->withTimestamps();
    }
    // In the User model

    // In the User model
    public function referralCount()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id')->count();
    }
    public function rankArray()
    {
        return [

            ['min_referrals' => 0,   'max_referrals' => 0,    'name' => 'Recruit', 'icon' => 'recruit.png', 'interest' => '2'],
            ['min_referrals' => 1,   'max_referrals' => 5,    'name' => 'Private', 'icon' => 'private.png', 'interest' => '3'],
            ['min_referrals' => 6,   'max_referrals' => 10,   'name' => 'Corporal', 'icon' => 'corporal.png', 'interest' => '4'],
            ['min_referrals' => 11,  'max_referrals' => 20,   'name' => 'Sergeant', 'icon' => 'sergeant.png', 'interest' => '8'],
            ['min_referrals' => 21,  'max_referrals' => 40,   'name' => 'Lieutenant', 'icon' => 'first-lieutenant.png', 'interest' => '10'],
            ['min_referrals' => 41,  'max_referrals' => 75,   'name' => 'Captain', 'icon' => 'captain.png', 'interest' => '10'],
            ['min_referrals' => 76,  'max_referrals' => 100,  'name' => 'Colonel', 'icon' => 'colonel.png', 'interest' => '10'],
            ['min_referrals' => 101, 'max_referrals' => 150,  'name' => 'Brigadier', 'icon' => 'brigadier-general.png', 'interest' => '10'],
            ['min_referrals' => 231, 'max_referrals' => 1000, 'name' => 'Major General', 'icon' => 'major-general.png', 'interest' => '12']
        ];
    }
    public function userClassArray()
    {
        // Define the user classes with their respective ranges and icons
        $userclass = [
            'Basic' => [
                'range' => [1000, 50000],
                'icon' => '', // Replace with the actual icon file name
            ],
            'Gold' => [
                'range' => [51000, 100000],
                'icon' => 'assets/frontend/images/plans/gold.png', // Replace with the actual icon file name
            ],
            'Diamond' => [
                'range' => [101000, 250000],
                'icon' => 'assets/frontend/images/plans/diamond.png', // Replace with the actual icon file name
            ],
            'Platinum' => [
                'range' => [251000, PHP_FLOAT_MAX], // PHP_FLOAT_MAX represents "unlimited"
                'icon' => 'assets/frontend/images/plans/platinum.png', // Replace with the actual icon file name
            ],
        ];

        // Get the authenticated user and calculate the total value
        $user = auth()->user();

        // Calculate the total value by adding locked_funds and trading_balance
        $totalValue = $user->locked_funds + $user->trading_balance;

        // Determine the user class based on the total value
        foreach ($userclass as $class => $details) {
            if ($totalValue >= $details['range'][0] && $totalValue <= $details['range'][1]) {
                return [
                    'class' => $class,
                    'icon' => $details['icon'],
                ];
            }
        }

        // Default return if no class is matched (e.g., for values less than 1000)
        return [
            'class' => 'Unclassified',
            'icon' => 'assets/frontend/images/default-icon.png', // Replace with the actual icon file name
        ];
    }

    public function charts()
    {

        return [
            'chart_1' => [
                'symbol' => 'BINANCE:BTCUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_34a79',
                'pair' => 'BTCUSDT',
                'name' => 'Bitcoin',
            ],
            'chart_2' => [
                'symbol' => 'BINANCE:ETHUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_7569d',
                'pair' => 'ETHUSDT',
                'name' => 'Ethereum',
            ],
            'chart_3' => [
                'symbol' => 'BINANCE:TRXUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_949aa',
                'pair' => 'TRXUSDT',
                'name' => 'Tron',
            ],
            'chart_4' => [
                'symbol' => 'HUOBI:XRPUSDT',
                'exchange' => 'HUOBI',
                'container_id' => 'tradingview_17a1a',
                'pair' => 'XRPUSDT',
                'name' => 'XRP',
            ],
            'chart_5' => [
                'symbol' => 'BINANCE:ZECUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_399a7',
                'pair' => 'ZECUSDT',
                'name' => 'Zcash',
            ],
            'chart_6' => [
                'symbol' => 'BINANCE:LTCUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_f1d12',
                'pair' => 'LTCUSDT',
                'name' => 'Litecoin',
            ],
            'chart_7' => [
                'symbol' => 'BINANCE:NEOUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_1800f',
                'pair' => 'NEOUSDT',
                'name' => 'Neo',
            ],
            'chart_8' => [
                'symbol' => 'KUCOIN:ADAUSDT',
                'exchange' => 'KUCOIN',
                'container_id' => 'tradingview_6e6c0',
                'pair' => 'ADAUSDT',
                'name' => 'Cardano',
            ],
            'chart_9' => [
                'symbol' => 'KUCOIN:ONTUSDT',
                'exchange' => 'KUCOIN',
                'container_id' => 'tradingview_d459b',
                'pair' => 'ONTUSDT',
                'name' => 'Ontology',
            ],
            'chart_10' => [
                'symbol' => 'KUCOIN:OMGUSDT',
                'exchange' => 'KUCOIN',
                'container_id' => 'tradingview_edc24',
                'pair' => 'OMGUSDT',
                'name' => 'OmiseGo',
            ],
            'chart_11' => [
                'symbol' => 'BINANCE:BNBUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_523b5',
                'pair' => 'BNBUSDT',
                'name' => 'Binance Coin',
            ],
            'chart_12' => [
                'symbol' => 'BINANCE:XLMUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_bc62f',
                'pair' => 'XLMUSDT',
                'name' => 'Stellar',
            ],
            'chart_13' => [
                'symbol' => 'BINANCE:EOSUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_18261',
                'pair' => 'EOSUSDT',
                'name' => 'EOS',
            ],
            'chart_14' => [
                'symbol' => 'BINANCE:DASHUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_dfaf5',
                'pair' => 'DASHUSDT',
                'name' => 'Dash',
            ],
            'chart_15' => [
                'symbol' => 'BINANCE:QTUMUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_2c587',
                'pair' => 'QTUMUSDT',
                'name' => 'Qtum',
            ],
            'chart_16' => [
                'symbol' => 'BINANCE:IOTAUSDT',
                'exchange' => 'BINANCE',
                'container_id' => 'tradingview_95bbb',
                'pair' => 'IOTAUSDT',
                'name' => 'IOTA',
            ],
            //forex
            'chart_17' => [
                'symbol' => 'EURUSD',
                'exchange' => '',
                'container_id' => 'tradingview_29363',
                'pair' => 'EURUSD',
                'name' => 'EURUSD',
            ],
            'chart_18' => [
                'symbol' => 'EURJPY',
                'exchange' => '',
                'container_id' => 'tradingview_7a554',
                'pair' => 'EURJPY',
                'name' => 'EURJPY',
            ],
            'chart_19' => [
                'symbol' => 'EURGBP',
                'exchange' => '',
                'container_id' => 'tradingview_2c2b4',
                'pair' => 'EURGBP',
                'name' => 'EURGBP',
            ],
            'chart_20' => [
                'symbol' => 'EURAUD',
                'exchange' => '',
                'container_id' => 'tradingview_903b2',
                'pair' => 'EURAUD',
                'name' => 'EURAUD',
            ],
            'chart_21' => [
                'symbol' => 'EURNZD',
                'exchange' => '',
                'container_id' => 'tradingview_be61a',
                'pair' => 'EURNZD',
                'name' => 'EURNZD',
            ],
            'chart_22' => [
                'symbol' => 'EURNZD',
                'exchange' => '',
                'container_id' => 'tradingview_e6912',
                'pair' => 'EURNZD',
                'name' => 'EURNZD',
            ],
            'chart_23' => [
                'symbol' => 'EURCHF',
                'exchange' => '',
                'container_id' => 'tradingview_4d245',
                'pair' => 'EURCHF',
                'name' => 'EURCHF',
            ],
            'chart_24' => [
                'symbol' => 'EURZAR',
                'exchange' => '',
                'container_id' => 'tradingview_52eb9',
                'pair' => 'EURZAR',
                'name' => 'EURZAR',
            ],
            'chart_25' => [
                'symbol' => 'EURSGD',
                'exchange' => '',
                'container_id' => 'tradingview_44f99',
                'pair' => 'EURSGD',
                'name' => 'EURSGD',
            ],
            'chart_26' => [
                'symbol' => 'EURPLN',
                'exchange' => '',
                'container_id' => 'tradingview_85bff',
                'pair' => 'EURPLN',
                'name' => 'EURPLN',
            ],
            'chart_27' => [
                'symbol' => 'USDJPY',
                'exchange' => '',
                'container_id' => 'tradingview_184e3',
                'pair' => 'USDJPY',
                'name' => 'USDJPY',
            ],
            'chart_28' => [
                'symbol' => 'USDCAD',
                'exchange' => '',
                'container_id' => 'tradingview_4c508',
                'pair' => 'USDCAD',
                'name' => 'USDCAD',
            ],
            'chart_29' => [
                'symbol' => 'USDCHF',
                'exchange' => '',
                'container_id' => 'tradingview_b670a',
                'pair' => 'USDCHF',
                'name' => 'USDCHF',
            ],
            'chart_30' => [
                'symbol' => 'USDTRY',
                'exchange' => '',
                'container_id' => 'tradingview_ee8cd',
                'pair' => 'USDTRY',
                'name' => 'USDTRY',
            ],
            'chart_31' => [
                'symbol' => 'USDMXN',
                'exchange' => '',
                'container_id' => 'tradingview_2af82',
                'pair' => 'USDMXN',
                'name' => 'USDMXN',
            ],
            'chart_32' => [
                'symbol' => 'USDZAR',
                'exchange' => '',
                'container_id' => 'tradingview_7d381',
                'pair' => 'USDZAR',
                'name' => 'USDZAR',
            ],
            'chart_33' => [
                'symbol' => 'USDINR',
                'exchange' => '',
                'container_id' => 'tradingview_bd762',
                'pair' => 'USDINR',
                'name' => 'USDINR',
            ],
            'chart_34' => [
                'symbol' => 'USDSGD',
                'exchange' => '',
                'container_id' => 'tradingview_3cdef',
                'pair' => 'USDSGD',
                'name' => 'USDSGD',
            ],
            'chart_35' => [
                'symbol' => 'USDTHB',
                'exchange' => '',
                'container_id' => 'tradingview_6e639',
                'pair' => 'USDTHB',
                'name' => 'USDTHB',
            ],
            'chart_36' => [
                'symbol' => 'USDCNH',
                'exchange' => '',
                'container_id' => 'tradingview_44a06',
                'pair' => 'USDCNH',
                'name' => 'USDCNH',
            ],
            'chart_37' => [
                'symbol' => 'GBPUSD',
                'exchange' => '',
                'container_id' => 'tradingview_8e19e',
                'pair' => 'GBPUSD',
                'name' => 'GBPUSD',
            ],
            'chart_38' => [
                'symbol' => 'GBPJPY',
                'exchange' => '',
                'container_id' => 'tradingview_fedd4',
                'pair' => 'GBPJPY',
                'name' => 'GBPJPY',
            ],
            'chart_39' => [
                'symbol' => 'GBPAUD',
                'exchange' => '',
                'container_id' => 'tradingview_d3ba2',
                'pair' => 'GBPAUD',
                'name' => 'GBPAUD',
            ],
            'chart_40' => [
                'symbol' => 'GBPCAD',
                'exchange' => '',
                'container_id' => 'tradingview_f36d8',
                'pair' => 'GBPCAD',
                'name' => 'GBPCAD',
            ],
            'chart_41' => [
                'symbol' => 'GBPCAD',
                'exchange' => '',
                'container_id' => 'tradingview_c8b94',
                'pair' => 'GBPCAD',
                'name' => 'GBPCAD',
            ],
            'chart_42' => [
                'symbol' => 'GBPCHF',
                'exchange' => '',
                'container_id' => 'tradingview_cc442',
                'pair' => 'GBPCHF',
                'name' => 'GBPCHF',
            ],
            'chart_43' => [
                'symbol' => 'GBPSGD',
                'exchange' => '',
                'container_id' => 'tradingview_83ae6',
                'pair' => 'GBPSGD',
                'name' => 'GBPSGD',
            ],
            'chart_44' => [
                'symbol' => 'GBPZAR',
                'exchange' => '',
                'container_id' => 'tradingview_c82e7',
                'pair' => 'GBPZAR',
                'name' => 'GBPZAR',
            ],
            'chart_45' => [
                'symbol' => 'GBPPLN',
                'exchange' => '',
                'container_id' => 'tradingview_50424',
                'pair' => 'GBPPLN',
                'name' => 'GBPPLN',
            ],
            'chart_46' => [
                'symbol' => 'GBPHKD',
                'exchange' => '',
                'container_id' => 'tradingview_ad4e7',
                'pair' => 'GBPHKD',
                'name' => 'GBPHKD',
            ],
            'chart_47' => [
                'symbol' => 'AUDUSD',
                'exchange' => '',
                'container_id' => 'tradingview_3d015',
                'pair' => 'AUDUSD',
                'name' => 'AUDUSD',
            ],
            'chart_48' => [
                'symbol' => 'AUDJPY',
                'exchange' => '',
                'container_id' => 'tradingview_341d7',
                'pair' => 'AUDJPY',
                'name' => 'AUDJPY',
            ],
            'chart_49' => [
                'symbol' => 'AUDCAD',
                'exchange' => '',
                'container_id' => 'tradingview_670c7',
                'pair' => 'AUDCAD',
                'name' => 'AUDCAD',
            ],
            'chart_50' => [
                'symbol' => 'AUDNZD',
                'exchange' => '',
                'container_id' => 'tradingview_5e5cf',
                'pair' => 'AUDNZD',
                'name' => 'AUDNZD',
            ],
            'chart_51' => [
                'symbol' => 'AUDCHF',
                'exchange' => '',
                'container_id' => 'tradingview_53e2f',
                'pair' => 'AUDCHF',
                'name' => 'AUDCHF',
            ],
            'chart_52' => [
                'symbol' => 'AUDSGD',
                'exchange' => '',
                'container_id' => 'tradingview_ec4ae',
                'pair' => 'AUDSGD',
                'name' => 'AUDSGD',
            ],
            'chart_53' => [
                'symbol' => 'AUDHKD',
                'exchange' => '',
                'container_id' => 'tradingview_95676',
                'pair' => 'AUDHKD',
                'name' => 'AUDHKD',
            ],
            'chart_54' => [
                'symbol' => 'NZDUSD',
                'exchange' => '',
                'container_id' => 'tradingview_5b531',
                'pair' => 'NZDUSD',
                'name' => 'NZDUSD',
            ],
            'chart_55' => [
                'symbol' => 'NZDJPY',
                'exchange' => '',
                'container_id' => 'tradingview_b2d33',
                'pair' => 'NZDJPY',
                'name' => 'NZDJPY',
            ],
            'chart_56' => [
                'symbol' => 'NZDCAD',
                'exchange' => '',
                'container_id' => 'tradingview_443c2',
                'pair' => 'NZDCAD',
                'name' => 'NZDCAD',
            ],
            'chart_57' => [
                'symbol' => 'NZDCHF',
                'exchange' => '',
                'container_id' => 'tradingview_0d398',
                'pair' => 'NZDCHF',
                'name' => 'NZDCHF',
            ],
            'chart_58' => [
                'symbol' => 'NZDSGD',
                'exchange' => '',
                'container_id' => 'tradingview_1a1b9',
                'pair' => 'NZDSGD',
                'name' => 'NZDSGD',
            ],
            'chart_59' => [
                'symbol' => 'NZDHKD',
                'exchange' => '',
                'container_id' => 'tradingview_7d264',
                'pair' => 'NZDHKD',
                'name' => 'NZDHKD',
            ],
            'chart_60' => [
                'symbol' => 'CADJPY',
                'exchange' => '',
                'container_id' => 'tradingview_efaf3',
                'pair' => 'CADJPY',
                'name' => 'CADJPY',
            ],
            'chart_61' => [
                'symbol' => 'CADCHF',
                'exchange' => '',
                'container_id' => 'tradingview_e4aed',
                'pair' => 'CADCHF',
                'name' => 'CADCHF',
            ],
            'chart_62' => [
                'symbol' => 'CADSGD',
                'exchange' => '',
                'container_id' => 'tradingview_78e3a',
                'pair' => 'CADSGD',
                'name' => 'CADSGD',
            ],
            'chart_63' => [
                'symbol' => 'CADHKD',
                'exchange' => '',
                'container_id' => 'tradingview_5ba9f',
                'pair' => 'CADHKD',
                'name' => 'CADHKD',
            ],

            //stocks


            'chart_64' => [
                'symbol' => 'AMD',
                'exchange' => '',
                'container_id' => 'tradingview_a7a66',
                'pair' => 'AMD',
                'name' => 'AMD',
            ],
            'chart_65' => [
                'symbol' => 'V',
                'exchange' => '',
                'container_id' => 'tradingview_1b871',
                'pair' => 'V',
                'name' => 'VISA',
            ],
            'chart_66' => [
                'symbol' => 'NKE',
                'exchange' => '',
                'container_id' => 'tradingview_36745',
                'pair' => 'NKE',
                'name' => 'NIKE',
            ],
            'chart_67' => [
                'symbol' => 'TSLA',
                'exchange' => '',
                'container_id' => 'tradingview_c0c8c',
                'pair' => 'TSLA',
                'name' => 'NIKE',
            ],
            'chart_68' => [
                'symbol' => 'AAPL',
                'exchange' => '',
                'container_id' => 'tradingview_1c5f1',
                'pair' => 'AAPL',
                'name' => 'APPLE',
            ],
            'chart_69' => [
                'symbol' => 'ADBE',
                'exchange' => '',
                'container_id' => 'tradingview_c9c09',
                'pair' => 'ADBE',
                'name' => 'ADOBE',
            ],
            'chart_70' => [
                'symbol' => 'NVDA',
                'exchange' => '',
                'container_id' => 'tradingview_98daa',
                'pair' => 'NVDA',
                'name' => 'NVIDIA',
            ],
            'chart_71' => [
                'symbol' => 'PYPL',
                'exchange' => '',
                'container_id' => 'tradingview_45706',
                'pair' => 'PYPL',
                'name' => 'PAYPAL',
            ],
            'chart_72' => [
                'symbol' => 'FUBO',
                'exchange' => '',
                'container_id' => 'tradingview_9a1ab',
                'pair' => 'FUBO',
                'name' => 'FUBOTV',
            ],
            'chart_73' => [
                'symbol' => 'NIO',
                'exchange' => '',
                'container_id' => 'tradingview_0ff56',
                'pair' => 'NIO',
                'name' => 'NIO INC',
            ],
            'chart_74' => [
                'symbol' => 'NFLX',
                'exchange' => '',
                'container_id' => 'tradingview_47c3e',
                'pair' => 'NFLX',
                'name' => 'NETFLIX',
            ],
            'chart_75' => [
                'symbol' => 'TWTR',
                'exchange' => '',
                'container_id' => 'tradingview_51088',
                'pair' => 'TWTR',
                'name' => 'TWITTER INC',
            ],
            'chart_76' => [
                'symbol' => 'GOOGL',
                'exchange' => '',
                'container_id' => 'tradingview_7aebf',
                'pair' => 'GOOGL',
                'name' => 'GOOGLE',
            ],
            'chart_77' => [
                'symbol' => 'AMZN',
                'exchange' => '',
                'container_id' => 'tradingview_370b3',
                'pair' => 'AMZN',
                'name' => 'AMAZON',
            ],
            'chart_78' => [
                'symbol' => 'PLTR',
                'exchange' => '',
                'container_id' => 'tradingview_86cb3',
                'pair' => 'PLTR',
                'name' => 'PALANTIR',
            ],
            'chart_79' => [
                'symbol' => 'FB',
                'exchange' => '',
                'container_id' => 'tradingview_36aec',
                'pair' => 'FB',
                'name' => 'META INC',
            ],
            'chart_80' => [
                'symbol' => 'GME',
                'exchange' => '',
                'container_id' => 'tradingview_84577',
                'pair' => 'GME',
                'name' => 'GAMESTOP',
            ],
            'chart_81' => [
                'symbol' => 'OPGN',
                'exchange' => '',
                'container_id' => 'tradingview_98a93',
                'pair' => 'OPGN',
                'name' => 'OPGEN INC',
            ],
            'chart_82' => [
                'symbol' => 'OTRK',
                'exchange' => '',
                'container_id' => 'tradingview_1ba0e',
                'pair' => 'OTRK',
                'name' => 'ONTRAK INC',
            ],
            'chart_83' => [
                'symbol' => 'MSFT',
                'exchange' => '',
                'container_id' => 'tradingview_6a620',
                'pair' => 'MSFT',
                'name' => 'MICROSOFT',
            ],
            'chart_84' => [
                'symbol' => 'BB',
                'exchange' => '',
                'container_id' => 'tradingview_c4a59',
                'pair' => 'BB',
                'name' => 'BLACKBERRY',
            ],
            'chart_85' => [
                'symbol' => 'MA',
                'exchange' => '',
                'container_id' => 'tradingview_c949c',
                'pair' => 'MA',
                'name' => 'MASTERCARD',
            ],
            'chart_86' => [
                'symbol' => 'FUV',
                'exchange' => '',
                'container_id' => 'tradingview_432d5',
                'pair' => 'FUV',
                'name' => 'ARCIMOTO INC',
            ],
            'chart_87' => [
                'symbol' => 'CLOV',
                'exchange' => '',
                'container_id' => 'tradingview_a50ee',
                'pair' => 'CLOV',
                'name' => 'CLOVER HEALTH',
            ],
            'chart_88' => [
                'symbol' => 'JUPW',
                'exchange' => '',
                'container_id' => 'tradingview_8629a',
                'pair' => 'JUPW',
                'name' => 'JUPITER WELLNESS',
            ],
            'chart_89' => [
                'symbol' => 'CCVI',
                'exchange' => '',
                'container_id' => 'tradingview_f8f8a',
                'pair' => 'CCVI',
                'name' => 'CHURCHILL CAPITAL',
            ],
            'chart_90' => [
                'symbol' => 'AMC',
                'exchange' => '',
                'container_id' => 'tradingview_bd975',
                'pair' => 'AMC',
                'name' => 'AMC ENTERTAINMENT',
            ],



        ];
    }

    public function rank()
    {
        $referralCount = $this->referralCount();
        $ranks = $this->rankArray(); // Using the rankArray method

        // Default rank if no matches
        $defaultRank = ['name' => 'Unranked', 'icon' => 'default.png'];

        // Find the rank that matches the referral count
        foreach ($ranks as $rank) {
            if ($referralCount >= $rank['min_referrals'] && $referralCount <= $rank['max_referrals']) {
                return $rank;
            }
        }

        // If no rank matches, return the default rank
        return $defaultRank;
    }

    public function rankName()
    {
        return $this->rank()['name'];
    }

    public function rankIcon()
    {
        return asset('assets/frontend/images/ranks/' . $this->rank()['icon']);
    }

    public function unreadNotifications()
    {
        return $this->hasMany(Notification::class)->where('read', false);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'user_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}

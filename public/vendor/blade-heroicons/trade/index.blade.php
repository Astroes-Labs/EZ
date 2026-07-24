<div class="row">

    <!-- Chart Area -->
    <div class="col-lg-8 col-md-12 px-0" id="chart">
        <div class="site-card mb-0">
            {{-- <div class="site-card-header d-flex justify-content-between align-items-center">
                <h3 class="title">Live Market Chart</h3>
                <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)" class="btn btn-sm btn-secondary">
                    <i class="anticon anticon-reload"></i>
                </a>
            </div> --}}
            <div class="site-card-body p-0" id="chart-body">
                <div id="chart-container" style="width: 100%; height: 100%;">
                    <div class="tradingview-widget-container">
                        <div id="tradingview_34a79"></div>
                        <script type="text/javascript">
                            new TradingView.widget(
                                {
                                    "width": "100%",
                                    "height": "100%",
                                    "symbol": "BINANCE:BTCUSDT",
                                    "timezone": "Etc/UTC",
                                    "theme": "dark",
                                    "style": "1",
                                    "locale": "en",
                                    "toolbar_bg": "#f1f3f6",
                                    "enable_publishing": false,
                                    "range": "YTD",
                                    "container_id": "tradingview_34a79"
                                }
                            );
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .site-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .site-card-header {
            flex-shrink: 0;
        }

        .site-card-body {
            flex-grow: 1;
            overflow-y: auto;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #e73667;
            border-color: #dee2e6 #dee2e6 #fff;
        }


        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link {
            color: #e73667;
        }

        .transaction-left {
            width: 60% !important;
        }

        .transaction-right {
            width: 40% !important;
        }

        /* Ensure the parent containers allow full height */
        #chart-side,
        .row>div {
            height: 100%;
        }
    </style>
    <!-- Switchable Tab Area -->
    <div class="col-lg-4 col-md-12 px-0" id="chart-side">
        <div class="site-card">
            {{-- <div class="site-card-header">
                <h3 class="title">Trade Execution Area</h3>
            </div> --}}
            <div class="site-card-body">
                <ul class="nav nav-tabs mb-2 justify-content-center border-0" id="tradeTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="execution-tab" data-bs-toggle="tab" href="#execution"
                            role="tab"><i class="anticon anticon-line-chart"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link side-nav-item " id="active-tab" data-bs-toggle="tab" href="#openTrades"
                            role="tab"><i class="anticon anticon-appstore"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link current" id="history-tab" data-bs-toggle="tab" href="#history" role="tab">
                            <i class="anticon anticon-unordered-list"></i></a>
                    </li>
                </ul>
                <div class="tab-content" id="tradeTabContent">
                    <!-- Trade Execution Area -->



                    <div class="progress-steps-form tab-pane fade   show active" id="execution" role="tabpanel">
                        <form action="" method="post" enctype="multipart/form-data" id="tradeForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <label for="exampleFormControlInput1" class="form-label">Market:</label>
                                    <div class="input-group">
                                        <select name="market" id="markets" class="site-nice-select text-secondary">
                                            <option value="Crypto">Crypto</option>
                                            <option value="Stock">Stock</option>
                                            <option value="Forex">Forex</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label for="marketPairs" class="form-label">Pairs:</label>
                                    <div class="input-group">
                                        <select name="symbol" id="marketPairs" class="site-nice-select text-secondary">
                                            @include('dashboard.trade.market-pairs-options')
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="investment" class="form-label">Quantity:</label>
                                    <div class="input-group">
                                        <input type="text" name="investment" class="form-control"
                                            oninput="this.value = validateDouble(this.value)" aria-label="Investment"
                                            id="investment" aria-describedby="basic-addon1" required>
                                        <span class="input-group-text"
                                            id="basic-addon1">{{ Auth::user()->getCurrencySymbol()}}</span>
                                    </div>
                                    <div class="input-info-text text-secondary min-max">Available:
                                        {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->trading_balance) }}
                                    </div>
                                </div>

                            </div>


                            <div class="mt-3 d-flex-none">
                                <button type="submit" class="btn btn-success btn-block btn-lg w-100 mb-3" id="buyBtn">
                                    Buy<i class="anticon anticon-arrow-up"></i>
                                </button>
                                <button type="submit" class="btn btn-danger btn-block btn-lg w-100" id="sellBtn">
                                    Sell<i class="anticon anticon-arrow-down"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Open Trades -->
                    {{-- <div class="tab-pane fade" id="history" role="tabpanel">
                        <div class="transaction-list table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tradeHistory as $trade)
                                    <tr>
                                        <td>{{ $trade->created_at->format('M d Y H:i') }}</td>
                                        <td>{{ ucfirst($trade->type) }}</td>
                                        <td>{{ number_format($trade->amount, 2) }}</td>
                                        <td>{{ number_format($trade->price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <style>
                    </style>
                    <div class="mobile-transactions tab-pane fade" id="openTrades" role="tabpanel"
                        style="background: none;">
                        <div class="content">
                            @forelse ($openTrades as $trade)
                                <div class="single-transaction">
                                    <div class="transaction-left">
                                        <div class="transaction-des">
                                            <div class="transaction-title">
                                                <strong> <span
                                                        class="{{ $trade->type == 'BUY' ? 'text-success' : 'text-danger' }}">
                                                        {{ $trade->type }} {{ $trade->symbol }}
                                                    </span>
                                                    ({{ Auth::user()->getCurrencySymbol()}}{{ number_format($trade->investment, 2) }})</strong>
                                            </div>
                                            <div class="transaction-date text-muted">
                                                {{ \Carbon\Carbon::parse($trade->created_at)->format('d-m-Y H:i') }}
                                            </div>
                                            <div class="transaction-title">
                                                ENTRY: {{ number_format($trade->opening_price, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-right">
                                        <i class="anticon anticon-close text-danger p-3 border-primary-rounded"
                                            data-id="{{ $trade->id }}" data-toggle="modal" data-target="#closeTradeModal"
                                            onclick="console.log('clicked')"></i>
                                        <div
                                            class="transaction-amount {{ $trade->profit > 0 ? 'text-success' : ($trade->profit < 0 ? 'text-danger' : 'text-black') }}">
                                            <br>
                                            {{ number_format($trade->profit, 2) }}
                                        </div>
                                        <div class="transaction-gateway">
                                            (<span
                                                class="{{ ($trade->profit / $trade->investment) * 100 > 0 ? 'text-success' : (($trade->profit / $trade->investment) * 100 < 0 ? 'text-danger' : 'text-black') }}">
                                                {{ round(($trade->profit / $trade->investment) * 100, 2) }}%
                                            </span>)
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted">
                                    No open trades
                                </div>
                            @endforelse



                        </div>

                    </div>
                    <style>

                    </style>


                    <!-- History -->
                    <div class="mobile-transactions tab-pane fade" id="history" role="tabpanel"
                        style="background: none;">
                        <div class="content">
                            @forelse ($tradeHistory as $trade)
                                <div class="single-transaction">
                                    <div class="transaction-left">
                                        <div class="transaction-des">
                                            <div class="transaction-title">
                                                <strong> <span
                                                        class="{{ $trade->type == 'BUY' ? 'text-success' : 'text-danger' }}">
                                                        {{ $trade->type }} {{ $trade->symbol }}
                                                    </span>
                                                </strong>
                                            </div>
                                            <div class="transaction-date text-muted">
                                                {{ \Carbon\Carbon::parse($trade->created_at)->format('d-m-Y H:i') }}
                                            </div>
                                            <div class="transaction-title">
                                                {{ number_format($trade->opening_price, 2) }} ->
                                                {{ number_format($trade->closing_price, 2) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-right">
                                        <div
                                            class="transaction-amount {{ $trade->profit > 0 ? 'text-success' : ($trade->profit < 0 ? 'text-danger' : 'text-black') }}">
                                            <br>
                                            {{ number_format($trade->profit, 2) }}
                                        </div>
                                        <div class="transaction-title">
                                            ({{ Auth::user()->getCurrencySymbol()}}{{ number_format($trade->investment, 2) }})

                                        </div>

                                        <div class="transaction-gateway">

                                        </div>

                                    </div>
                                </div>


                            @empty
                                <p class="text-center">No Recent Trade</p>
                            @endforelse





                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




</div>


<!-- Modal Structure -->
<div class="modal fade" id="closeTradeModal" tabindex="-1" role="dialog" aria-labelledby="closeTradeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closeTradeModalLabel">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to close this trade?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="confirmCloseTrade">Yes</button>
            </div>
        </div>
    </div>
</div>
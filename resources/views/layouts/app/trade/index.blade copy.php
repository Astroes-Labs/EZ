<div class="row">
    <!-- Chart Area -->
    <div class="col-9">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Live Market Chart</h3>
            </div>
            <div class="site-card-body vh-100">
                <div id="chart-container">
                    <!-- Chart will be rendered here (use JavaScript for charting library) -->
                    <canvas id="marketChart" style="width: 100%; height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Switchable Tab Area -->
    <div class="col-3">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Trading Tools</h3>
            </div>
            <div class="site-card-body">
                <ul class="nav nav-tabs" id="tradeTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="execution-tab" data-bs-toggle="tab" href="#execution"
                            role="tab">Trade Execution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab">Trade
                            History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="active-tab" data-bs-toggle="tab" href="#active" role="tab">Active
                            Trades</a>
                    </li>
                </ul>
                <div class="tab-content" id="tradeTabContent">
                    <!-- Trade Execution Area -->
                    <div class="tab-pane fade show active" id="execution" role="tabpanel">
                        <form action="{{ route('trade.execute') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="tradeAmount" class="form-label">Amount:</label>
                                <input type="text" id="tradeAmount" name="amount" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tradeType" class="form-label">Trade Type:</label>
                                <select id="tradeType" name="type" class="form-control">
                                    <option value="buy">Buy</option>
                                    <option value="sell">Sell</option>
                                </select>
                            </div>
                            <button type="submit" class="site-btn blue-btn">Execute Trade</button>
                        </form>
                    </div>

                    <!-- Trade History -->
                    <div class="tab-pane fade" id="history" role="tabpanel">
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
                    </div>

                    <!-- Active Trades -->
                    <div class="tab-pane fade" id="active" role="tabpanel">
                        <div class="transaction-list table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Trade ID</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activeTrades as $trade)
                                        <tr>
                                            <td>{{ $trade->id }}</td>
                                            <td>{{ ucfirst($trade->type) }}</td>
                                            <td>{{ number_format($trade->amount, 2) }}</td>
                                            <td>{{ number_format($trade->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
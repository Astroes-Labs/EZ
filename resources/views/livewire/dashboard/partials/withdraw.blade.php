<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Withdraw Money</h3>
                <div class="card-header-links">
                    <a href="{{ route('withdraw.history') }}" onclick="openCustom(event, this)"
                        class="card-header-link">withdrawal History</a>
                </div>
            </div>
            <div class="site-card-body">
                <div class="progress-steps">
                    <div class="single-step current">
                        <div class="number">01</div>
                        <div class="content">
                            <h4>Withdraw Funds</h4>
                            <p>Enter your withdraw details</p>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="number">02</div>
                        <div class="content">
                            <h4>Success</h4>
                            <p>Successful Withdrawal</p>
                        </div>
                    </div>
                </div>
                <div class="progress-steps-form">
                    <form action="{{ route('withdraw.store') }}" method="post" enctype="multipart/form-data"
                        id="withdrawForm">
                        @csrf
                        <div class="row">

                            <div class="col-xl-6 col-md-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Source:</label>
                                <div class="input-group">
                                    <select name="from" id="fromSelect" class="site-nice-select text-secondary">
                                        <option selected value="1">
                                            {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->trading_balance) }} (Trading Balance)
                                        </option>
                                        <option value="2">
                                            {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->locked_funds) }} (Locked Funds)
                                        </option>
                                    </select>
                                </div>
                                <div class="input-info-text charge"></div>
                            </div>

                            <div class="col-xl-6 col-md-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Payment
                                    Method:</label>
                                <div class="input-group">
                                    <select name="payment_method" id="payment_method" class="site-nice-select text-secondary">
                                        <option selected="" value="">--Select Payment Method--</option>
                                        <option value="BTC">Bitcoin</option>
                                        <option value="ETH">Ethereum</option>
                                        <option value="USDT">USDT</option>
                                        <option value="XRP">Ripple</option>
                                        <option value="DOGE">Dogecoin</option>
                                        <option value="BNB">Binance Coin</option>
                                    </select>
                                </div>
                                <div class="input-info-text charge"></div>
                            </div>
                            
                            <div class="col-xl-6 col-md-12">
                                <label for="exampleFormControlInput1" class="form-label">Enter
                                    Amount:</label>
                                <div class="input-group">
                                    <input type="text" name="amount" class="form-control" aria-label="Amount"
                                        id="amount" aria-describedby="basic-addon1" required="">
                                    <span class="input-group-text" id="basic-addon1">{{ Auth::user()->currency }}</span>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-12">
                                <label for="exampleFormControlInput1" class="form-label">Wallet Address:</label>
                                <div class="input-group">
                                    <input type="text" name="wallet_address" class="form-control" aria-label="Wallet Address"
                                        id="wallet_address" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>


                        </div>

                        <div class="row manual-row">

                        </div>


                        <div class="buttons">
                            <button type="submit" class="site-btn blue-btn">
                                Proceed to Payment<i class="anticon anticon-double-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
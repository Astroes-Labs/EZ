<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Add Money</h3>
                <div class="card-header-links">
                    <a href="{{ route('deposit.history') }}" onclick="openCustom(event, this)"
                        class="card-header-link">Deposit History</a>
                </div>
            </div>
            <div class="site-card-body">
                <div class="progress-steps">
                    <div class="single-step current">
                        <div class="number">01</div>
                        <div class="content">
                            <h4>Deposit Amount</h4>
                            <p>Enter your deposit details</p>
                        </div>
                    </div>
                    <div class="single-step">
                        <div class="number">02</div>
                        <div class="content">
                            <h4>Success</h4>
                            <p>Deposit Successful</p>
                        </div>
                    </div>
                </div>
                <div class="progress-steps-form">
                    <form action="{{ route('deposit.store') }}" method="post" enctype="multipart/form-data"
                        id="depositForm">
                        @csrf
                        <div class="row">

                            <div class="col-xl-6 col-md-12">
                                <label for="exampleFormControlInput1" class="form-label">Enter
                                    Amount:</label>
                                <div class="input-group">
                                    <input type="text" name="amount" class="form-control" aria-label="Amount"
                                        id="amount" aria-describedby="basic-addon1" required="">
                                    <input type="hidden" name="coin_price" id="coin_price" required="">
                                    <span class="input-group-text" id="basic-addon1">{{ Auth::user()->currency }}</span>
                                </div>
                                <div class="input-info-text min-max"></div>
                            </div>

                            <div class="col-xl-6 col-md-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Payment
                                    Method:</label>
                                <div class="input-group">
                                    <select name="gateway_code" id="gatewaySelect"
                                        class="site-nice-select text-secondary">
                                        <option selected="" value="">--Select Payment Method--</option>
                                        <option value="BTC">Bitcoin</option>
                                        <option value="ETH">Ethereum</option>
                                        <option value="USDT">USDT</option>
                                        {{-- <option value="XRP">Ripple</option> --}}
                                        {{-- <option value="DOGE">Dogecoin</option> --}}
                                        <option value="BNB">Binance Coin</option>
                                    </select>
                                </div>
                                <div class="input-info-text charge"></div>
                            </div>

                        </div>

                        <div class="row manual-row">

                        </div>

                        {{--
                        <div class="transaction-list table-responsive">
                            <div class="user-panel-title">
                                <h3>Review Details:</h3>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Amount</strong></td>
                                        <td><span class="amount"></span> <span class="currency"></span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Amount</strong></td>
                                        <td><span class="paymentAmount"></span><span class="paymentCurrency"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Method</strong></td>
                                        <td id="logo"><img src="" class="payment-method" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td class="total"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                        <!-- Review Details -->
                        <div class="review-section mt-4" id="reviewSection" style="display: none;">
                            <div class="uc-section-label">Review Deposit Details</div>

                            <div class="review-card">
                                <div class="review-item">
                                    <span class="review-label">You Deposit</span>
                                    <span class="review-value accent">
                                        <span class="amount">0.00</span>
                                        <span class="currency">{{ Auth::user()->currency }}</span>
                                    </span>
                                </div>

                                <div class="review-item">
                                    <span class="review-label">Payment Amount</span>
                                    <span class="review-value">
                                        <span class="paymentAmount">0.00</span>
                                        <span class="paymentCurrency"></span>
                                    </span>
                                </div>

                                <div class="review-item">
                                    <span class="review-label">Payment Method</span>
                                    <span class="review-value" id="logo">
                                        <!-- Default Icon (Hidden by default) -->
                                        <img src="{{ asset('assets/frontend/images/default-icon.png') }}"
                                            class="payment-method default-icon" alt="Select Method"
                                            style="width: 28px; height: 28px; border-radius: 6px;">

                                        <span class="ms-2" id="gateway-name"></span>
                                    </span>
                                </div>

                                <div class="review-item total-row">
                                    <span class="review-label">Total Cost</span>
                                    <span class="review-value accent total"></span>
                                </div>
                            </div>
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
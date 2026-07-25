<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Fixed Deposit</h3>
            </div>
            <div class="site-card-body">
                <div class="row">
                    <div class="col-12 text-lg-left">
                        <!-- Display Fixed Deposit -->
                        <div class="locked-funds-card mb-4">
                            <div class="locked-funds-inner">
                                <div class="locked-funds-top">
                                    <span class="locked-label">Fixed Deposit</span>
                                </div>

                                <div class="locked-amount">
                                    {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->locked_funds) }}
                                </div>

                                <div class="locked-meta">
                                    Funds currently locked in active plans
                                </div>
                            </div>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-xl-6 col-12">
                                <div class="site-card h-100 border-0" style="background: var(--bg-layer1, #1a1d24);">
                                    <div class="site-card-body p-4">
                                        <h4 class="mb-3" style="color: var(--text-primary);"><b>WHAT DOES THIS MEAN?</b></h4>
                                        <p class="text-left mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                            Our expertise in the financial business of trading and having different clients with their requirements made us think and brought up an additional product on the platform called Fixed Deposit, A sort of Time Deposit – A savings account with a time frame where the customer receives an attractive interest rate to lock the money (part of your total Balance) with a minimum of 4 months and 12 months Max.
                                        </p>
                                        <p class="text-left mt-3 mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                            <b>The benefits</b> – The longer you keep it locked, the higher the interest rate. A conservative and solid way of saving you don’t get the menial interest rates banks give you, so you don’t need them.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-12">
                                <div class="site-card h-100 border-0" style="background: var(--bg-layer1, #1a1d24);">
                                    <div class="site-card-body p-4">
                                        <h4 class="mb-3" style="color: var(--text-primary);"><b>How does it work?</b></h4>
                                        <p class="text-left mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                            Very easy just use the Fixed Deposit Part on our site - deposit the amount you want from the trading balance; Choose a Timeframe Between 4-12Months; Oh and remember, you can withdraw anytime!
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-12">
                                <div class="site-card h-100 border-0" style="background: var(--bg-layer1, #1a1d24);">
                                    <div class="site-card-body p-4">
                                        <h4 class="mb-3 text-uppercase" style="color: var(--text-primary);"><b>Benefit with time and interest rate</b></h4>
                                        <p class="text-left mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                            Our conclusion and aim is to keep our clients satisfied. We offer diversification for Investments and we are continuously working on it. You receive your interest returns Monthly which can be withdrawn or added to your trading balance.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-12">
                                <div class="site-card h-100 border-0" style="background: var(--bg-layer1, #1a1d24);">
                                    <div class="site-card-body p-4">
                                        <h4 class="mb-3" style="color: var(--text-primary);"><b>FOR MORE INFORMATION</b></h4>
                                        <p class="text-left mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                            Contact our support team or any of our qualified and validated Managers to secure your additional 5% for the Fixed Deposit of 4 months and 10% for 6 months.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="site-card border-0 mb-4" style="background: var(--bg-layer1, #1a1d24);">
                            <div class="site-card-body p-4">
                                <h4 class="mb-3" style="color: var(--text-primary);"><b>WHAT DO I DO?</b></h4>
                                <p class="text-left mb-3" style="color: var(--text-muted); line-height: 1.6;">
                                    On the next screen enter the amount you would like to lock.<br>
                                    Choose a time frame ranging from Four (4) Months to Twelve (12) Months and Click on the "LOCK" button.
                                </p>

                                <h4 class="mb-3" style="color: var(--text-primary);"><b>NOTE</b></h4>
                                <p class="text-left mb-0" style="color: var(--text-muted); line-height: 1.6;">
                                    <span class="text-danger">*</span> Fixed Deposit cannot be Traded.<br>
                                    <span class="text-danger">*</span> Interest Rates are added on a monthly basis.
                                </p>
                            </div>
                        </div>

                        <a href="{{ route('locked.funds.show') }}" onclick="openCustom(event, this)"
                            class="site-btn blue-btn w-100 text-center">
                            Proceed to Deposit Funds
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
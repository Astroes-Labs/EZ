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
                        <h4 class=" "><b>WHAT DOES THIS MEAN?</b></h4>
                        <p style="text-align:left;" class="text-left">
                            Our expertise in the financial business of trading and having different clients with their
                            requirements made us think and brought up an additional product on the platform called
                            Fixed Deposit, A sort of Time Deposit – A savings account with a time frame where the
                            customer receives an attractive interest rate to lock the money (part of your total Balance)
                            with a minimum of 4 months and 12 months Max.
                            <br><br>
                            <b>The benefits</b> – The longer you keep it locked, the higher the interest rate. A
                            conservative and solid way of saving you don’t get the menial interest rates banks give you,
                            so you don’t need them.
                        </p><br>

                        <h4 class=" "><b>How does it work?</b></h4>
                        <p style="text-align:left;" class="text-left">
                            Very easy just use the Fixed Deposit Part on our site - deposit the amount you want from the
                            trading balance; Choose a Timeframe Between 4-12Months; Oh and remember, you can withdraw
                            anytime!
                        </p><br>

                        <h4 class="  text-uppercase"><b>Benefit with time and interest rate</b></h4>
                        <p style="text-align:left;" class="text-left">
                            Our conclusion and aim is to keep our clients satisfied. We offer diversification for
                            Investments and we are continuously working on it. You receive your interest returns Monthly
                            which can be withdrawn or added to your trading balance.
                        </p><br>

                        <h4 class=" "><b>FOR MORE INFORMATION</b></h4>
                        <p style="text-align:left;" class="text-left">
                            Contact our support team or any of our qualified and validated Managers to secure your
                            additional 5% for the Fixed Deposit of 4 months and 10% for 6 months.
                        </p><br>

                        <h4 class=" "><b>WHAT DO I DO?</b></h4>
                        <p style="text-align:left;" class="text-left">
                            On the next screen enter the amount you would like to lock.<br>
                            Choose a time frame ranging from Four (4) Months to Twelve (12) Months and Click on the
                            "LOCK" button.
                        </p><br>

                        <h4 class=" "><b>NOTE</b></h4>
                        <p style="text-align:left;" class="text-left">
                            <span class="text-danger">*</span> Fixed Deposit cannot be Traded.<br>
                            <span class="text-danger">*</span> Interest Rates are added on a monthly basis.
                        </p><br>

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
<div class="desktop-screen-show">

    @include('livewire.dashboard.partials.copy-referral-link')
    <div class="row user-cards">
        <div class="col-12">
            <div class="referral-link">
                <div class="referral-link-form">
                    <a class="user-sidebar-btn btn btn-primary border-rounded  btn-lg btn-block"
                        href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                        <i class="anticon anticon-plus"></i>
                        <span class="text-uppercase">Fund account now</span>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <div class="row user-cards">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-inbox"></i></div>
                <div class="content">
                    <h4><span class="count">{{ $allTransactionsCount }}</span></h4>
                    <p>All Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-file-add"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span
                            class="count">{{ number_format($totalDeposited) }}</span></h4>
                    <p>Total Deposit</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-check-square"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span
                            class="count">{{ number_format($totalTrade) }}</span></h4>
                    <p>Total Investment</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-credit-card"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span
                            class="count">{{ number_format($totalTradeProfit) }}</span></h4>
                    <p>Total Profit</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-lock"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span
                            class="count">{{ number_format(Auth::user()->locked_funds, 0) }}</span></h4>
                    <p>Total Fixed Deposit </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-money-collect"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span
                            class="count">{{ number_format($totalWithdrawn) }}</span></h4>
                    <p>Total Withdrawal</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-gift"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span class="count">0</span></h4>
                    <p>Referral Bonus</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-account-book"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span class="count">0</span></h4>
                    <p>Deposit Bonus</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-gold"></i></div>
                <div class="content">
                    <h4><b>{{ Auth::user()->getCurrencySymbol()}}</b><span class="count">0</span></h4>
                    <p>Investment Bonus</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-inbox"></i></div>
                <div class="content">
                    <h4 class="count">{{ Auth::user()->referralCount() }}</h4>
                    <p>Total Referral</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-radar-chart"></i></div>
                <div class="content">
                    <h4 id="target" style="display: none;">{{ Auth::user()->rankName() }}</h4>
                    <p>Rank Achieved</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="single">
                <div class="icon"><i class="anticon anticon-question"></i></div>
                <div class="content">
                    <h4 class="count">0</h4>
                    <p>Total Ticket</p>
                </div>
            </div>
        </div>
    </div>


    @include('livewire.dashboard.partials.recent-trans-desktop')
</div>
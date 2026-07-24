<div class="mobile-screen-show">
    <div class="row">
        <div class="col-12">
            <div class="user-ranking-mobile">
                <div class="icon"><img
                        src="{{ Auth::user()->photo_profile ?? '../assets/global/materials/upload.svg' }}" alt=""
                        height="45" width="45" style="border-radius: 50%;" /></div>
                <div class="name">
                    <h4>Hi, {{ Auth::user()->name  }}

                    </h4>
                    <p>
                        <span> {{ $userClass['class']  }}

                        </span>
                    </p>
                </div>
                <div class="rank-badge"><img src="{{ $userClass['icon']  }}" alt="" />
                </div>
            </div>
            <div class="user-wallets-mobile">
                <img src="../assets/frontend/materials/wallet-shadow.png" alt="" class="wallet-shadow">
                <div class="head">All Wallets in {{ Auth::user()->currency  }}</div>
                <div class="one">
                    <div class="balance">

                        <span
                            class="symbol">{{ Auth::user()->getCurrencySymbol() . ' ' . Auth::user()->displayBalance(Auth::user()->trading_balance) }}</span>
                        <span class="after-dot">
                        </span>
                    </div>
                    <div class="wallet">Total Balance</div>
                </div>


                <div class="one p-wal">
                    <div class="balance">
                        <span
                            class="symbol">{{ Auth::user()->getCurrencySymbol() . ' ' . Auth::user()->displayBalance(Auth::user()->locked_funds) }}</span>
                        <span class="after-dot">
                        </span>
                    </div>
                    <div class="wallet">Fixed Deposit</div>
                </div>
                <div class="info">
                    <i icon-name="info"></i>You Earned 0 {{ Auth::user()->currency  }} This Week
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="mob-shortcut-btn">

                <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                    <div class="w-100">
                        <img src="{{ asset('assets\frontend\icons\layout-dashboard.svg')  }}" alt="">
                    </div>

                    Deposit
                </a>
                <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)">
                    <div class="w-100">
                        <img src="{{ asset('assets\frontend\icons\home.svg')  }}" alt="">
                    </div> Trade Hub
                </a>
                <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)">
                    <div class="w-100">
                        <img src="{{ asset('assets\frontend\icons\send.svg')  }}" alt="">
                    </div> Withdraw
                </a>
            </div>
        </div>


        <div class="col-12">
            <!-- all navigation -->
            <div class="all-feature-mobile mb-3 mobile-screen-show">
                <div class="title">All Navigations</div>

                <div class="contents row">
                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('plans') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/schema.png" alt="">
                                </div>
                                <div class="name">Pricing</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/deposit.png" alt="">
                                </div>
                                <div class="name">Fund Account</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('deposit.history') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/deposit-log.png" alt="">
                                </div>
                                <div class="name">Deposit History</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/withdraw.png" alt="">
                                </div>
                                <div class="name">Withdraw</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('withdraw.history') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/withdraw-log.png" alt="">
                                </div>
                                <div class="name">Withdraw History</div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('account.info') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/schema-log.png" alt="">
                                </div>
                                <div class="name">Account Info</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('traders.index') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/transactions.png" alt="">
                                </div>
                                <div class="name">Copy Trading</div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('user.verify') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/transfer-log.png" alt="">
                                </div>
                                <div class="name">ID Verification </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="single">
                            <a href="{{ route('locked.funds') }}" onclick="openCustom(event, this)">
                                <div class="icon"><img src="../assets/frontend/materials/transfer.png" alt="">
                                </div>
                                <div class="name">Fixed Deposit</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="moretext">
                    <div class="row contents">

                        <div class="col-4">
                            <div class="single">
                                <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)">
                                    <div class="icon"><img src="../assets/frontend/materials/referral.png" alt="">
                                    </div>
                                    <div class="name">Referral/Rank</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="single">
                                <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)">
                                    <div class="icon"><img src="../assets/frontend/materials/settings.png" alt="">
                                    </div>
                                    <div class="name">Settings</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="single">
                                <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">
                                    <div class="icon"><img src="../assets/frontend/materials/profile.png" alt="">
                                    </div>
                                    <div class="name">Notifications</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="centered">
                    <button class="moreless-button site-btn-sm grad-btn">Load more</button>
                </div>
            </div>

            <!-- all Statistic -->
            <div class="all-feature-mobile mb-3 mobile-screen-show">
                <div class="title">All Statistic</div>
                <div class="row">
                    <div class="col-12">
                        <div class="all-cards-mobile">
                            <div class="contents row">
                                <div class="col-12">
                                    <div class="single-card">
                                        <div class="icon">
                                            <img src="{{ asset('assets\frontend\icons\home-white.svg')  }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="amount count">{{ $allTransactionsCount }}
                                            </div>
                                            <div class="name">All Transactions</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-card">
                                        <div class="icon">
                                            <img src="{{ asset('assets\frontend\icons\download.svg')  }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                    class="count">{{ number_format($totalDeposited) }}</span>
                                            </div>
                                            <div class="name">Total Deposit</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single-card">
                                        <div class="icon">
                                            <img src="{{ asset('assets\frontend\icons\box-white.svg')  }}" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                    class="count">{{ number_format($totalTrade) }}</span>
                                            </div>
                                            <div class="name">Total Investment</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="moretext-2">
                                <div class="contents row">
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\credit-card.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount"> {{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">{{ number_format($totalTradeProfit) }}</span>
                                                </div>
                                                <div class="name">Total Profit</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\log-in.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">{{ number_format(Auth::user()->locked_funds, 0) }}</span>
                                                </div>
                                                <div class="name">Total Fixed Deposit</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\log-in.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount"> {{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">{{ number_format($totalWithdrawn) }}</span>
                                                </div>
                                                <div class="name">Total Withdraw</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\users-2.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount"> {{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">0</span>
                                                </div>
                                                <div class="name">Referral Bonus</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\anchor.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">0</span>
                                                </div>
                                                <div class="name">Deposit Bonus</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\archive.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                        class="count">0</span>
                                                </div>
                                                <div class="name"> Investment Bonus</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\gift.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount count">
                                                    {{ Auth::user()->referralCount() }}
                                                </div>
                                                <div class="name"> Total Referral</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\award.svg')  }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount ">
                                                    {{ Auth::user()->rankName() }}
                                                </div>
                                                <div class="name">Rank Achieved</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="single-card">
                                            <div class="icon">
                                                <img src="{{ asset('assets\frontend\icons\alert-triangle.svg')  }}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <div class="amount count">0</div>
                                                <div class="name"> Total Ticket</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="centered">
                                <button class="moreless-button-2 site-btn-sm grad-btn">Load more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           @include('livewire.dashboard.partials.recent-trans-mobile')
        </div>

        <div class="col-12">
            <div class="mobile-ref-url mb-4">
                <div class="all-feature-mobile">
                    <div class="title">Referral URL</div>
                    <div class="mobile-referral-link-form">

                        <input type="text" value="{{ route('register') . '?refid=' . Auth::id() }}" id="refLink"
                            readonly />
                        <button type="submit" onclick="copyRef()">
                            <span id="copy">Copy</span>
                        </button>
                    </div>
                    <p class="referral-joined">
                        {{ Auth::user()->referralCount() }} people have joined using this URL.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content=" {{ config('app.name') }}">
    <meta name="description" content=" {{ config('app.name') }}">

    <link type="image/x-icon" href="{{ url('assets/images/rel-icon.png') }}">
    <link rel="icon" href="{{ url('assets/images/rel-icon.png') }}">
    <link rel="stylesheet" href="{{ url('../assets/global/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/global/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/global/css/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/global/css/simple-notify.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ url('../assets/vendor/mckenziearts/laravel-notify/css/notify.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/global/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/styles.css?var=2.1') }}" />
    <link rel="stylesheet" href="{{ url('../assets/frontend/css/toastr.min.css') }}">

    <style>
        .site-head-tag {
            margin: 0;
            padding: 0;
        }
    </style>
    <style>
        /* Spinner Styles */
        #spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            /* Use flexbox to center the spinner */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            z-index: 1050;
        }

        /* Spinner Circle */
        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            /* Light gray border */
            border-top: 4px solid #fff;
            /* White border for the spinning effect */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        /* Spinner Animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>


    <title>
        {{ config('app.name') }} - Dashboard
    </title>


</head>

<body class="dark-theme">

    <div id="spinner-overlay">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <div class="panel-layout">
        <!--Header-->
        <div class="panel-header">
            <div class="logo">
                <a href="..">
                    <img class="logo-unfold" src=" {{ url('assets/images/rel-icon.png') }}" alt="Logo" />
                    <img class="logo-fold" src="{{ url('assets/images/rel-icon.png') }}" alt="Logo" />
                </a>
            </div>
            <div class="nav-wrap">
                <div class="nav-left">
                    <button class="sidebar-toggle">
                        <i class="anticon anticon-arrow-left"></i>
                    </button>
                    {{-- <div class="col-12 ms-2">
                        <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)"
                            class="btn btn-sm btn-secondary">
                            <i class="anticon anticon-reload"></i>
                        </a>
                    </div> --}}
                    <div class="mob-logo">
                        <a href="..">
                            <img src="{{ url('assets/images/rel-icon.png') }}" alt="{{ config('app.name') }}" />
                        </a>
                    </div>
                </div>
                <div class="nav-right">
                    <div class="single-nav-right">

                        <div class="single-right">
                            <div class="color-switcher">
                                <i icon-name="moon" class="dark-icon" data-mode="dark"></i>
                                <i icon-name="sun" class="light-icon" data-mode="light"></i>
                            </div>
                        </div>

                        <div class="single-nav-right user-notifications">
                            @php
                                $notifications = $notifications ?? collect();
                            @endphp

                            <div class="single-nav-right user-notifications">
                                <button type="button" class="item notification-dot" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                                        <path d="M4 2C2.8 3.7 2 5.7 2 8"></path>
                                        <path d="M22 8c0-2.3-.8-4.3-2-6"></path>
                                    </svg>
                                    <div class="number" id="outer-unread-count">
                                        {{ Auth::user()->unreadNotifications->count() }}</div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end notification-pop"
                                    data-bs-auto-close="outside">
                                    <div class="noti-head">Notifications <span
                                            id="outer-unread-count">{{ Auth::user()->unreadNotifications->count() }}</span>
                                    </div>
                                    <div class="all-noti">
                                        @forelse ($notifications as $notification)
                                            <div class="single-noti">
                                                <a href="{{ route('notifications.show', $notification->id) }}"
                                                    onclick="openCustom(event, this); loadNotifications();updateUnreadCount();"
                                                    class="{{ ($notification->read == 1) ? "read" : "" }}">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="3" x2="21" y1="22" y2="22"></line>
                                                            <line x1="6" x2="6" y1="18" y2="11"></line>
                                                            <line x1="10" x2="10" y1="18" y2="11"></line>
                                                            <line x1="14" x2="14" y1="18" y2="11"></line>
                                                            <line x1="18" x2="18" y1="18" y2="11"></line>
                                                            <polygon points="12 2 20 7 4 7"></polygon>
                                                        </svg>
                                                    </div>
                                                    <div class="content">
                                                        <div class="main-cont">
                                                            <span>{{ $notification->title ?? 'Notification' }}</span>
                                                            {{ \Illuminate\Support\Str::limit($notification->message, 20, '...') ?? 'You have a new notification.' }}
                                                        </div>
                                                        <div class="time">{{ $notification->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @empty
                                            <p class="text-center my-3">No notifications found</p>
                                        @endforelse
                                    </div>
                                    <div class="noti-footer mt-3">
                                        <a class="noti-btn-1 me-1 w-100" href="javascript:void(0);"
                                            onclick="markAllAsRead()">Mark All as Read</a>
                                        <a class="noti-btn-2 ms-1 w-100" href="{{ route('notifications.index') }}"
                                            onclick="openCustom(event, this)">See all Notifications</a>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="single-right">
                            <select name="language" id="" class="site-nice-select"
                                onchange="window.location.href=this.options[this.selectedIndex].value;">
                                <option value="../language-update?name=en" selected>English</option>
                                <option value="../language-update?name=es">Spanish</option>
                                <option value="../language-update?name=fr">Franch</option>
                            </select>
                        </div>
                        <div class="single-right">
                            <button type="button" class="item" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="anticon anticon-user"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)"
                                        class="dropdown-item" type="button">
                                        <i class="anticon anticon-setting"></i>Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('avatar.edit') }}" onclick="openCustom(event, this)"
                                        class="dropdown-item" type="button">
                                        <i class="anticon anticon-picture"></i>Update Avatar
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('email.update') }}" onclick="openCustom(event, this)"
                                        class="dropdown-item" type="button">
                                        <i class="anticon anticon-mail"></i>Update Email
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('password.update') }}" onclick="openCustom(event, this)"
                                        class="dropdown-item" type="button">
                                        <i class="anticon anticon-lock"></i>Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="../user/support-ticket-index.html" class="dropdown-item" type="button">
                                        <i class="anticon anticon-customer-service"></i>Support Tickets
                                    </a>
                                </li>
                                <li class="logout">
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <input type="hidden" name="logout" value="logout">
                                        <a href="javascript:void(0);"
                                            onclick="document.getElementById('logout-form').submit();"
                                            class="dropdown-item">
                                            <i class="anticon anticon-logout"></i>Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Header-->

        <div class="desktop-screen-show">
            <div class="side-nav ">
                <div class="side-wallet-box default-wallet mb-0">
                    <div class="user-balance-card">
                        <div class="wallet-name">
                            <div class="name">Account Balance</div>
                            <div class="default">Wallet</div>
                        </div>
                        <div class="wallet-info">
                            <div class="wallet-id"><i icon-name="wallet"></i>Total Portfolio</div>
                            <div class="balance" id="mainBalance">
                                {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance($totalProfit) }}
                            </div>
                        </div>
                        <div class="wallet-info">
                            <div class="wallet-id"><i icon-name="landmark"></i>Locked Funds</div>
                            <div class="balance" id="lockedfundsBalance">
                                {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->locked_funds) }}
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="{{ route('deposit') }}" onclick="openCustom(event, this)" class="user-sidebar-btn"><i
                                class="anticon anticon-file-add"></i>Deposit</a>
                        <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)"
                            class="user-sidebar-btn red-btn">
                            <i class="anticon anticon-home"></i>Trade Hub</a>
                    </div>
                </div>
                <div class="side-nav-inside">
                    <ul class="side-nav-menu">
                        <li class="side-nav-item ">
                            <a href="{{ route('index') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-appstore"></i><span>Dashboard</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('plans') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-tags"></i><span>Pricing</span></a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="{{ route('deposit') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-file-add"></i><span>Fund Account</span></a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="{{ route('deposit.history') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-unordered-list"></i><span>Deposit
                                    History</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-bank"></i><span>Withdraw</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('withdraw.history') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-credit-card"></i><span>Withdraw
                                    History</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('account.info') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-info-circle"></i><span>Account Info</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-setting"></i><span>Edit Account Info</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('avatar.edit') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-picture"></i><span>Update Photo</span></a>
                        </li>

                        {{-- <li class="side-nav-item ">
                            <a href="../user/transactions.html"><i class="anticon anticon-file-text"></i><span>All
                                    Transactions</span></a>
                        </li> --}}

                        <li class="side-nav-item ">
                            <a href="{{ route('traders.index') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-copy"></i><span>Copy
                                    Trading</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('user.verify') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-idcard"></i><span>ID Verification</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('email.update') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-mail"></i><span>Update Email</span></a>
                        </li>
                        <li class="side-nav-item ">
                            <a href="{{ route('password.update') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-key"></i><span>Change Password</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('locked.funds') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-lock"></i><span>Locked Funds</span></a>
                        </li>

                        <li class="side-nav-item ">
                            <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)"><i
                                    class="anticon anticon-usergroup-add"></i><span>Referrals/Rank</span></a>
                        </li>


                        {{-- <li class="side-nav-item ">
                            <a href="../user/support-ticket-index.html"><i
                                    class="anticon anticon-tool"></i><span>Support
                                    Tickets</span></a>
                        </li> --}}

                        <li class="side-nav-item ">
                            <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-notification"></i><span>Notifications</span></a>
                        </li>

                        <li class="side-nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="site-btn grad-btn w-100">
                                    <i class="anticon anticon-logout"></i><span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-container">
            <div class="main-content pb-0">
                <div class="section-gap pt-3 pb-0">
                    <div class="container-fluid">
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>


                        <div class="row desktop-screen-show">
                            <div class="col">

                            </div>
                        </div>
                        <div class="row mobile-screen-show">
                            <div class="col-12">

                            </div>
                        </div>
                        <!--Page Content-->

                        @yield('content')





                        <!--Page Content-->
                    </div>
                </div>
            </div>
        </div>


        <!-- Show in 575px in Mobile Screen -->
        <div class="mobile-screen-show">
            <div class="bottom-appbar">
                <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)">
                    <i icon-name="layout-dashboard"></i>
                </a>
                <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                    <i icon-name="download"></i>
                </a>

                <a href="{{ route('index') }}" onclick="openCustom(event, this)">
                    <i icon-name="home"></i>
                </a>
                <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)">
                    <i icon-name="gift"></i>
                </a>
                <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)">
                    <i icon-name="settings"></i>
                </a>
            </div>
        </div>
        <!-- Show in 575px in Mobile Screen End -->

        <!-- Automatic Popup -->

        <!-- Automatic Popup End -->
    </div>
    <!--Full Layout-->

    <script src="{{ asset('assets/global/js/jquery.min.js') }}"></script>
    <!-- Include Toastr JS -->
    <script src="{{ asset('static/auth/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/jquery-migrate.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/scrollUp.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('assets/global/js/datatables.min.js') }}" type="text/javascript" charset="utf8"></script>
    <script src="{{ asset('assets/global/js/simple-notify.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js?var=5') }}"></script>
    <script src="{{ asset('assets/frontend/js/cookie.js') }}"></script>
    <script src="{{ asset('assets/global/js/pusher.min.js') }}"></script>

    @yield('xtraJs')


</body>

</html>
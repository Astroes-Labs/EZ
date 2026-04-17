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
    @include("layouts.app.spinner")

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
            @include('layouts.app.header')

            <div class="desktop-screen-show">
                @include('layouts.app.side-nav')
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
            @include('layouts.app.mobile-menu-bar')
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
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
                <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)" class="btn btn-sm btn-secondary">
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
                    @include('layouts.app.notice-drop-down')

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

                    @include('layouts.app.nav-mini')
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Header-->
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
        <a href="{{ route('settings') }}" onclick="openCustom(event, this)">
            <i icon-name="settings"></i>
        </a>
    </div>
</div>
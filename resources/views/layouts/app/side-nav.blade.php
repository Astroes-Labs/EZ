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
                <div class="wallet-id"><i icon-name="landmark"></i>Fixed Deposit</div>
                <div class="balance" id="lockedfundsBalance">
                    {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->locked_funds) }}
                </div>
            </div>
        </div>
        <div class="actions">
            <a href="{{ route('deposit') }}" onclick="openCustom(event, this)" class="user-sidebar-btn"><i
                    class="anticon anticon-file-add"></i>Deposit</a>
            <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)" class="user-sidebar-btn red-btn">
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

            <li class="side-nav-item ">
                <a href="{{ route('settings') }}" onclick="openCustom(event, this)"><i class="anticon anticon-file-text"></i><span>Settings</span></a>
            </li>

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
                <a href="{{ route('email.update') }}" onclick="openCustom(event, this)"><i class="anticon anticon-mail"></i><span>Update Email</span></a>
            </li>
            <li class="side-nav-item ">
                <a  href="{{ route('password.update') }}" onclick="openCustom(event, this)"><i class="anticon anticon-key"></i><span>Change Password</span></a>
            </li>

            <li class="side-nav-item ">
                <a href="{{ route('locked.funds') }}" onclick="openCustom(event, this)"><i class="anticon anticon-lock"></i><span>Fixed Deposit</span></a>
            </li>

            <li class="side-nav-item ">
                <a  href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)"><i class="anticon anticon-usergroup-add"></i><span>Referrals/Rank</span></a>
            </li>

            
           {{--  <li class="side-nav-item ">
                <a href="../user/support-ticket-index.html"><i class="anticon anticon-tool"></i><span>Support
                        Tickets</span></a>
            </li> --}}

            <li class="side-nav-item ">
                <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">
                    <i
                        class="anticon anticon-notification"></i><span>Notifications</span></a>
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
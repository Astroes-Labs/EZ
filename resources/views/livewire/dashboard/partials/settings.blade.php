<div class="uc-page">

    {{-- ── Profile Hero ── --}}
    <div class="uc-profile">
        <div class="uc-profile-top">
            <div class="uc-avatar-wrap">
                @if(Auth::user()->photo_profile)
                    <img class="uc-avatar" src="{{ Auth::user()->photo_profile }}" alt="Avatar">
                @else
                    <div class="uc-avatar-default">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="uc-avatar-badge">
                    <svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 6l3 3 5-5" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
            <div class="uc-profile-info">
                <div class="uc-nickname">{{ Auth::user()->name }}</div>
                <div class="uc-uid">UID: {{ Auth::id() }}</div>
                <span class=" badge rounded-pill px-3 py-2 fs-6 fw-semibold
                    @if(Auth::user()->identity_verified == 1)
                           uc-kyc-verified
                    @else
                        uc-kyc-badge
                    @endif">

                    @if(Auth::user()->identity_verified == 1)
                        ✓ Verified
                    @else
                        ⚠ Unverified
                    @endif
                </span>
            </div>
        </div>


    </div>

    {{-- ── Tab Bar ── --}}
    <div class="uc-tabs">
        <button class="uc-tab active" onclick="ucTab(this,'tab-myinfo')">My Info</button>
        <button class="uc-tab" onclick="ucTab(this,'tab-security')">Security</button>
        <button class="uc-tab" onclick="ucTab(this,'tab-preferences')">Preferences</button>
        <button class="uc-tab" onclick="ucTab(this,'tab-general')">General</button>
    </div>

    {{-- ════════════════════════════════════
    TAB 1 — MY INFO
    ════════════════════════════════════ --}}
    <div class="uc-panel active" id="tab-myinfo">

        {{-- PFP Card --}}
        <div class="uc-section-label">Profile</div>
        <div class="uc-pfp-card">
            @if(Auth::user()->photo_profile)
                <img class="uc-pfp-large" src="{{ Auth::user()->photo_profile }}" alt="Profile">
            @else
                <div class="uc-pfp-large-default">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            @endif
            <div class="uc-pfp-info">
                <div class="uc-pfp-name">{{ Auth::user()->name }}</div>
                <div class="uc-pfp-email">{{ Auth::user()->email }}</div>
                <a href="{{ route('avatar.edit') }}" onclick="openCustom(event, this)" class="uc-pfp-edit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                        <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z" />
                    </svg>
                    Edit Photo
                </a>
            </div>
        </div>

        {{-- Account Details --}}
        <div class="uc-section-label">Account Details</div>
        <div class="uc-list">
            <div class="uc-list-item" onclick="openCustom(event, {getAttribute: () => '{{ route('account.info') }}'})">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Full Name</div>
                    <div class="uc-item-sub">Your registered name</div>
                </div>
                <div class="uc-item-value">{{ Auth::user()->name }}</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <line x1="2" x2="22" y1="10" y2="10" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Nickname</div>
                    <div class="uc-item-sub">{{ Auth::user()->email }}</div>
                </div>
                <div class="uc-item-value muted">—</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M4 7h16M4 12h16M4 17h7" />
                        <path d="m15 15 5 5m0-5-5 5" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">User ID</div>
                    <div class="uc-item-sub">Your unique account identifier</div>
                </div>
                <div class="uc-item-value accent">{{ Auth::id() }}</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item" onclick="openCustom(event, {getAttribute: () => '{{ route('account.currency.edit') }}'})">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Currency</div>
                    <div class="uc-item-sub">Active display currency</div>
                </div>
                <div class="uc-item-value accent">{{ Auth::user()->currency }}</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>
        </div>

        {{-- Identity Verification --}}
        <div class="uc-section-label">Identity Verification</div>
        <div class="uc-list">
            <a href="{{ route('user.verify') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">KYC Verification</div>
                    <div class="uc-kyc-levels" style="margin-top:6px;">
                        <!-- Level 1 -->
                        <span class="uc-kyc-level 
                            @if(Auth::user()->identity_verified == 0) done @else locked @endif">
                            Lv 1
                        </span>

                        <!-- Level 2 -->
                        <span class="uc-kyc-level 
                            @if(Auth::user()->identity_verified == 1) done @else locked @endif">
                            Lv 2
                        </span>
                    </div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>
        </div>

        <div class="uc-profile-actions mt-5">
            <form method="POST" action="{{ route('logout') }}" style="flex:1;">
                @csrf
                <button type="submit" class="uc-btn-logout" style="width:100%;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>


    </div>

    {{-- ════════════════════════════════════
    TAB 2 — SECURITY
    ════════════════════════════════════ --}}
    <div class="uc-panel" id="tab-security">

        <div class="uc-section-label">Basic Protection</div>
        <div class="uc-section-desc">Essential protection for your everyday account activity.</div>
        <div class="uc-list">

            <a href="{{ route('email.update') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Email Address</div>
                    <div class="uc-item-sub">{{ Auth::user()->email }}</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

            <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                        <path d="M12 18h.01" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Mobile Number</div>
                    <div class="uc-item-sub">Link your phone for extra security</div>
                </div>
                <div class="uc-item-value muted">Not Set</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

            <div class="uc-list-item" style="cursor:default;">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Two-Factor Authentication</div>
                    <div class="uc-item-sub">Add extra security to your account</div>
                </div>
                <label class="uc-toggle">
                    <input type="checkbox" id="toggle2fa" {{ Auth::user()->two_factor_secret ? 'checked' : '' }}
                        onchange="toggle2FA(this)">
                    <span class="uc-toggle-track"></span>
                </label>
            </div>

        </div>

        <div class="uc-section-label" style="margin-top:20px;">Password</div>
        <div class="uc-section-desc">Keep your account secure with a strong password.</div>
        <div class="uc-list">

            <a href="{{ route('password.update') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Reset Password</div>
                    <div class="uc-item-sub">Change your login password</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

        </div>

    </div>

    {{-- ════════════════════════════════════
    TAB 3 — PREFERENCES
    ════════════════════════════════════ --}}
    <div class="uc-panel" id="tab-preferences">

        <div class="uc-section-label">Display</div>
        <div class="uc-list">

            <a href="{{ route('account.currency.edit') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                        <path d="M2 12h20" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Display Currency</div>
                    <div class="uc-item-sub">Change how amounts appear</div>
                </div>
                <div class="uc-item-value accent">{{ Auth::user()->currency }}</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

            {{-- <div class="uc-list-item" style="cursor:default;">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4" />
                        <path
                            d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Dark Mode</div>
                    <div class="uc-item-sub">Toggle dark / light appearance</div>
                </div>
                <label class="uc-toggle"
                    onclick="event.stopPropagation(); $(document.body).toggleClass('dark-theme'); $.get('{{ route('theme.toggle') }}');">
                    <input type="checkbox" checked>
                    <span class="uc-toggle-track"></span>
                </label>
            </div> --}}

        </div>

        <div class="uc-section-label" style="margin-top:20px;">Notifications</div>
        <div class="uc-list">

            <div class="uc-list-item" style="cursor:default;">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Push Notifications</div>
                    <div class="uc-item-sub">Deposit, withdrawal & trade alerts</div>
                </div>
                <label class="uc-toggle" onclick="event.stopPropagation()">
                    <input type="checkbox" checked>
                    <span class="uc-toggle-track"></span>
                </label>
            </div>

            <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Notification History</div>
                    <div class="uc-item-sub">View all your past alerts</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

        </div>

    </div>

    {{-- ════════════════════════════════════
    TAB 4 — GENERAL
    ════════════════════════════════════ --}}
    <div class="uc-panel" id="tab-general">

        <div class="uc-section-label">Platform</div>
        <div class="uc-list">

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                        <path d="M2 12h20" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Language</div>
                    <div class="uc-item-sub">Interface display language</div>
                </div>
                <div class="uc-item-value accent">English</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)" class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Referral Program</div>
                    <div class="uc-item-sub">Invite friends and earn rewards</div>
                </div>
                <div class="uc-item-value accent">{{ Auth::user()->referralCount() }} referred</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </a>

        </div>

        <div class="uc-section-label" style="margin-top:20px;">Support</div>
        <div class="uc-list">
        @php
            $supportEmail = 'support@' . (config('app.name') 
                ? strtolower(str_replace(' ', '', config('app.name'))) 
                : 'platform') . '.com';
        @endphp

        <div class="uc-list-item" 
            onclick="window.location.href='mailto:{{ $supportEmail }}?subject=Support%20Request%20-%20{{ config('app.name') }}'">
            
            <div class="uc-item-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                </svg>
            </div>
            
            <div class="uc-item-body">
                <div class="uc-item-title">Contact via Email</div>
                <div class="uc-item-sub">
                    {{ $supportEmail }}
                </div>
            </div>
            
            <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6" />
            </svg>
        </div>

            <div class="uc-list-item"  onclick="window.location.href='{{ route('contact') }}'">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.55 2 2 0 0 1 3.6 1.37h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8a16 16 0 0 0 6.09 6.09l.91-.91a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Phone Support</div>
                    <div class="uc-item-sub">Call our support line</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Live Chat</div>
                    <div class="uc-item-sub">Chat with us in real time</div>
                </div>
                <div class="uc-item-value success">Online</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

        </div>

        <div class="uc-section-label" style="margin-top:20px;">About</div>
        <div class="uc-list">

            <div class="uc-list-item" onclick="window.location.href='{{ route('faq') }}'">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4M12 8h.01" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Help Center</div>
                    <div class="uc-item-sub">FAQs, guides and tutorials</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z" />
                        <path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">User Feedback</div>
                    <div class="uc-item-sub">Share your thoughts with us</div>
                </div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

            <div class="uc-list-item">
                <div class="uc-item-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>
                <div class="uc-item-body">
                    <div class="uc-item-title">Version</div>
                    <div class="uc-item-sub">{{ config('app.name') }} Platform</div>
                </div>
                <div class="uc-item-value muted">v2.1.0</div>
                <svg class="uc-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </div>

        </div>

    </div>

</div>

<script>
    function ucTab(el, panelId) {
        // deactivate all tabs + panels
        document.querySelectorAll('.uc-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.uc-panel').forEach(p => p.classList.remove('active'));
        // activate clicked
        el.classList.add('active');
        document.getElementById(panelId).classList.add('active');
    }

    // Preserve active tab on dynamic reload
    (function () {
        var saved = sessionStorage.getItem('uc_tab');
        if (saved) {
            var btn = document.querySelector('.uc-tab[onclick*="' + saved + '"]');
            if (btn) ucTab(btn, saved);
        }
    })();

    document.querySelectorAll('.uc-tab').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var match = btn.getAttribute('onclick').match(/'([^']+)'\)/);
            if (match) sessionStorage.setItem('uc_tab', match[1]);
        });
    });
</script>
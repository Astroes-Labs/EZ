<div class="uc-panel active">

    {{-- Section Header --}}
    <div class="uc-section-label">Account Info</div>

    {{-- Top Card (Avatar + Basic Info) --}}
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

            <a href="{{ route('account.info.edit') }}" 
               onclick="openCustom(event, this)" 
               class="uc-pfp-edit">
               
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4Z"/>
                </svg>

                Edit Info
            </a>
        </div>
    </div>

    {{-- Details List --}}
    <div class="uc-section-label">Personal Details</div>
    <div class="uc-list">

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Full Name</div>
                <div class="uc-item-sub">{{ Auth::user()->name }}</div>
            </div>
        </div>

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Email Address</div>
                <div class="uc-item-sub">{{ Auth::user()->email }}</div>
            </div>
        </div>

        @if (!empty(Auth::user()->email2))
        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Second Email</div>
                <div class="uc-item-sub">{{ Auth::user()->email2 }}</div>
            </div>
        </div>
        @endif

    </div>

    {{-- Address Info --}}
    <div class="uc-section-label">Address</div>
    <div class="uc-list">

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Street Address</div>
                <div class="uc-item-sub">{{ Auth::user()->address ?? '—' }}</div>
            </div>
        </div>

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">City</div>
                <div class="uc-item-sub">{{ Auth::user()->city ?? '—' }}</div>
            </div>
        </div>

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">State</div>
                <div class="uc-item-sub">{{ Auth::user()->state ?? '—' }}</div>
            </div>
        </div>

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Postal Code</div>
                <div class="uc-item-sub">{{ Auth::user()->postcode ?? '—' }}</div>
            </div>
        </div>

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Country</div>
                <div class="uc-item-sub">{{ Auth::user()->country ?? '—' }}</div>
            </div>
        </div>

    </div>

    {{-- Meta Info --}}
    <div class="uc-section-label">Account Meta</div>
    <div class="uc-list">

        <div class="uc-list-item">
            <div class="uc-item-body">
                <div class="uc-item-title">Joining Date</div>
                <div class="uc-item-sub">
                    {{ Auth::user()->created_at->format('D, M j, Y h:i A') }}
                </div>
            </div>
        </div>

    </div>

</div>
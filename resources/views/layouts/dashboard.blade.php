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

    {{-- Google Fonts for the premium design system --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <style>
        /* ============================================================
           INLINE OVERRIDES — Premium Dark Fintech Theme
           These override styles.css without editing it directly.
           Import your themed styles.css here if you replace the original.
        ============================================================ */

        :root {
            --bg-deep: #0a0f1c;
            --bg-layer1: #111827;
            --bg-layer2: #1a2238;
            --bg-layer3: #1e2a42;
            --accent: #eac46e;
            --accent-dim: rgba(234, 196, 110, 0.12);
            --accent-border: rgba(234, 196, 110, 0.25);
            --border: #222f53;
            --border-soft: rgba(34, 47, 83, 0.6);
            --text-primary: #f0f4ff;
            --text-secondary: #8fa0bf;
            --text-muted: #4e6085;
            --success: #3dd68c;
            --danger: #f87171;
            --warning: #fbbf24;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --shadow-card: 0 4px 24px rgba(0, 0, 0, 0.35);
            --shadow-accent: 0 0 24px rgba(234, 196, 110, 0.08);
            --transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ── Global base ── */
        html,
        body {
            background: var(--bg-deep) !important;
            color: var(--text-primary) !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: sans-serif !important;
            color: var(--text-primary) !important;
        }

        /* ── Spinner ── */
        #spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(10, 15, 28, 0.7);
            z-index: 1050;
        }

        .spinner-border.text-primary {
            border-color: var(--accent);
            border-right-color: transparent;
            width: 40px;
            height: 40px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ── Panel Header ── */
        .panel-layout .panel-header {
            background: var(--bg-layer1) !important;
            border-bottom: 1px solid var(--border) !important;
        }

        .panel-layout .panel-header .logo {
            background: var(--bg-layer1) !important;
            border-right: 1px solid var(--border) !important;
            border-bottom: 1px solid var(--border) !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .panel-layout .panel-header .nav-wrap {
            background: var(--bg-layer1) !important;
            border-bottom: 1px solid var(--border) !important;
        }

        /* sidebar toggle */
        .panel-layout .panel-header .nav-wrap .nav-left .sidebar-toggle {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
            border: 1px solid var(--accent-border) !important;
            border-radius: var(--radius-sm) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-left .sidebar-toggle:hover {
            background: var(--accent) !important;
            color: var(--bg-deep) !important;
        }

        /* nav items */
        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .item {
            background: var(--bg-layer3) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-secondary) !important;
            border-radius: var(--radius-sm) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .item:hover {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
            border-color: var(--accent-border) !important;
        }

        /* color-switcher */
        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .color-switcher {
            color: var(--text-secondary) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .color-switcher svg.dark-icon {
            display: inline-block;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .color-switcher svg.light-icon {
            display: none;
        }

        /* nice-select in header */
        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .site-nice-select {
            background: var(--bg-layer3) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-primary) !important;
            border-radius: var(--radius-sm) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .site-nice-select::after {
            border-bottom-color: var(--text-muted) !important;
            border-right-color: var(--text-muted) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .site-nice-select .list {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .site-nice-select .list li {
            color: var(--text-secondary) !important;
            background: transparent !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .site-nice-select .list li:hover {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
        }

        /* dropdown menu */
        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
            box-shadow: var(--shadow-card) !important;
            border-radius: var(--radius-md) !important;
            padding: 8px !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu li .dropdown-item {
            color: var(--text-secondary) !important;
            border-radius: var(--radius-sm) !important;
            font-size: 13px !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu li .dropdown-item i {
            color: var(--accent) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu li .dropdown-item:hover {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu li.logout .dropdown-item {
            background: rgba(248, 113, 113, 0.08) !important;
            color: var(--danger) !important;
        }

        .panel-layout .panel-header .nav-wrap .nav-right .single-nav-right .single-right .dropdown-menu li.logout .dropdown-item:hover {
            background: var(--danger) !important;
            color: #fff !important;
        }

        /* notification dot */
        .notification-dot {
            color: var(--text-secondary) !important;
        }

        .notification-dot .number {
            background: var(--danger) !important;
        }

        .notification-pop {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
            box-shadow: var(--shadow-card) !important;
            border-radius: var(--radius-md) !important;
        }

        .notification-pop .noti-head {
            background: var(--bg-layer1) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-sm) !important;
            font-family: sans-serif !important;
        }

        .notification-pop .all-noti .single-noti a {
            background: var(--bg-layer1) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-primary) !important;
            border-radius: var(--radius-sm) !important;
            margin-bottom: 4px !important;
            font-weight: 600 !important;
        }

        .notification-pop .all-noti .single-noti a:hover {
            background: var(--bg-layer3) !important;
            border-color: var(--accent-border) !important;
        }

        .notification-pop .all-noti .single-noti a.read {
            background: transparent !important;
            font-weight: 400 !important;
            color: var(--text-muted) !important;
        }

        .notification-pop .all-noti .single-noti a .icon {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
            border: 1px solid var(--accent-border) !important;
        }

        .notification-pop .all-noti .single-noti a .content .main-cont {
            color: var(--text-primary) !important;
        }

        .notification-pop .all-noti .single-noti a .content .time {
            color: var(--text-muted) !important;
        }

        .notification-pop .noti-footer .noti-btn-1 {
            background: rgba(248, 113, 113, 0.1) !important;
            color: var(--danger) !important;
            border: 1px solid rgba(248, 113, 113, 0.2) !important;
            border-radius: var(--radius-sm) !important;
        }

        .notification-pop .noti-footer .noti-btn-1:hover {
            background: var(--danger) !important;
            color: #fff !important;
        }

        .notification-pop .noti-footer .noti-btn-2 {
            background: var(--accent) !important;
            color: var(--bg-deep) !important;
            border-radius: var(--radius-sm) !important;
        }

        .notification-pop .noti-footer .noti-btn-2:hover {
            background: #f0d08a !important;
        }

        /* ── Side Nav ── */
        .panel-layout .side-nav {
            background: var(--bg-layer1) !important;
            border-right: 1px solid var(--border) !important;
        }

        /* Side wallet box */
        .side-wallet-box {
            background: var(--bg-layer2) !important;
            border-bottom: 1px solid var(--border) !important;
        }

        .side-wallet-box .user-balance-card {
            background: linear-gradient(135deg, var(--bg-layer3), var(--bg-layer2)) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-md) !important;
        }

        .side-wallet-box .user-balance-card .wallet-name .name {
            color: var(--text-muted) !important;
            font-size: 11px !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .side-wallet-box .user-balance-card .wallet-name .default {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
            border: 1px solid var(--accent-border) !important;
            border-radius: var(--radius-sm) !important;
        }

        .side-wallet-box .user-balance-card .wallet-info .wallet-id {
            color: var(--text-muted) !important;
            font-size: 12px !important;
        }

        .side-wallet-box .user-balance-card .wallet-info .balance {
            color: var(--accent) !important;
            font-family: sans-serif !important;
            font-weight: 700 !important;
        }

        .side-wallet-box .actions .user-sidebar-btn {
            background: var(--accent) !important;
            color: var(--bg-deep) !important;
            border-radius: var(--radius-sm) !important;
            font-family: sans-serif !important;
            font-weight: 700 !important;
            border: none !important;
        }

        .side-wallet-box .actions .user-sidebar-btn:hover {
            background: #f0d08a !important;
        }

        .side-wallet-box .actions .user-sidebar-btn:last-of-type {
            background: var(--bg-layer3) !important;
            color: var(--text-primary) !important;
            border: 1px solid var(--border) !important;
        }

        .side-wallet-box .actions .user-sidebar-btn:last-of-type:hover {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
            border-color: var(--accent-border) !important;
        }

        /* Side nav menu items */
        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item a {
            color: var(--text-secondary) !important;
            border-radius: var(--radius-sm) !important;
            font-family: sans-serif !important;
            font-weight: 600 !important;
            font-size: 12px !important;
            text-transform: uppercase !important;
            letter-spacing: 0.03em !important;
        }

        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item a i {
            color: var(--text-muted) !important;
        }

        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item a:hover {
            color: var(--accent) !important;
            background: var(--accent-dim) !important;
        }

        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item a:hover i {
            color: var(--accent) !important;
        }

        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item.active a {
            background: var(--accent-dim) !important;
            border: 1px solid var(--accent-border) !important;
            color: var(--accent) !important;
        }

        .panel-layout .side-nav .side-nav-inside .side-nav-menu .side-nav-item.active a i {
            color: var(--accent) !important;
        }

        /* logout button inside side nav */
        .side-nav .site-btn.grad-btn {
            background: transparent !important;
            border: 1px solid var(--border) !important;
            color: var(--text-muted) !important;
            border-radius: var(--radius-sm) !important;
            font-family: sans-serif !important;
            font-weight: 600 !important;
            font-size: 11px !important;
            text-transform: uppercase !important;
            transition: var(--transition) !important;
            width: 100%;
        }

        .side-nav .site-btn.grad-btn:hover {
            background: rgba(248, 113, 113, 0.08) !important;
            color: var(--danger) !important;
            border-color: rgba(248, 113, 113, 0.2) !important;
        }

        /* ── Page container & main content ── */
        .panel-layout .page-container {
            background: var(--bg-deep) !important;
        }

        .panel-layout .page-container .main-content {
            color: var(--text-primary) !important;
        }

        /* ── Bottom app bar (mobile) ── */
        .bottom-appbar {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
            border-radius: 100px !important;
            box-shadow: var(--shadow-card) !important;
        }

        .bottom-appbar a {
            color: var(--text-muted) !important;
        }

        .bottom-appbar a.active {
            color: var(--accent) !important;
        }

        /* ── Global form inputs override ── */
        .form-control,
        .form-select {
            background: var(--bg-layer1) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-primary) !important;
            border-radius: var(--radius-sm) !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-border) !important;
            box-shadow: none !important;
            background: var(--bg-layer3) !important;
        }

        .form-control::placeholder {
            color: var(--text-muted) !important;
        }

        /* ── Bootstrap overrides ── */
        .dropdown-menu {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-md) !important;
        }

        .dropdown-item {
            color: var(--text-secondary) !important;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background: var(--accent-dim) !important;
            color: var(--accent) !important;
        }

        .modal-content {
            background: var(--bg-layer2) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-lg) !important;
            color: var(--text-primary) !important;
        }

        .modal-header {
            border-bottom: 1px solid var(--border) !important;
        }

        .modal-footer {
            border-top: 1px solid var(--border) !important;
        }

        .btn-close {
            filter: invert(1) brightness(0.6);
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar {
            width: 5px;
            height: 4px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: var(--border);
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-layer1);
        }

        /* ── site-head-tag ── */
        .site-head-tag {
            margin: 0;
            padding: 0;
        }

        /* ── Input group text ── */
        .input-group-text {
            background: var(--bg-layer3) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-secondary) !important;
        }
    </style>


    <style>
        /* Account Info Btn */
        .uc-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: 14px;
            cursor: pointer;
            padding: 6px 4px;
        }

        .uc-back-btn svg {
            width: 18px;
            height: 18px;
        }

        .uc-back-btn:hover {
            opacity: 0.7;
        }

        /* Account Info Btn */
        /* ============================================================
        USER CENTER PAGE — Matches premium dark fintech theme
        ============================================================ */
        :root {
            --bg-deep: #0a0f1c;
            --bg-layer1: #111827;
            --bg-layer2: #1a2238;
            --bg-layer3: #1e2a42;
            --accent: #eac46e;
            --accent-dim: rgba(234, 196, 110, 0.12);
            --accent-border: rgba(234, 196, 110, 0.25);
            --border: #222f53;
            --border-soft: rgba(34, 47, 83, 0.5);
            --text-primary: #f0f4ff;
            --text-secondary: #8fa0bf;
            --text-muted: #4e6085;
            --success: #3dd68c;
            --danger: #f87171;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --shadow-card: 0 4px 24px rgba(0, 0, 0, 0.35);
            --transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .uc-page {
            /* max-width: 680px; */
            margin: 0 auto;
            padding: 0 0 80px;
            font-family: 'DM Sans', sans-serif;
            color: var(--text-primary);
        }

        /* ── Profile Hero ── */
        .uc-profile {
            background: var(--bg-layer2);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px 20px 20px;
            margin-bottom: 16px;
            position: relative;
            overflow: hidden;
        }

        .uc-profile::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 0%, rgba(234, 196, 110, 0.07) 0%, transparent 60%);
            pointer-events: none;
        }

        .uc-profile-top {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .uc-avatar-wrap {
            position: relative;
            flex-shrink: 0;
        }

        .uc-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent-border);
        }

        .uc-avatar-default {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--bg-layer3);
            border: 2px solid var(--accent-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--accent);
        }

        .uc-avatar-badge {
            position: absolute;
            bottom: 2px;
            right: 2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--success);
            border: 2px solid var(--bg-layer2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .uc-avatar-badge svg {
            width: 9px;
            stroke: #fff;
        }

        .uc-profile-info {
            flex: 1;
            min-width: 0;
        }

        .uc-nickname {
            font-family: sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-uid {
            font-size: 0.72rem;
            color: var(--text-muted);
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .uc-kyc-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 20px;
            background: var(--accent-dim);
            border: 1px solid var(--accent-border);
            font-size: 0.68rem;
            font-weight: 600;
            color: var(--accent);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-family: sans-serif;
        }

        .uc-kyc-badge svg {
            width: 10px;
        }

        /* Verified KYC Badge - Green Version */
        .uc-kyc-verified {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-family: sans-serif;
            background: rgba(61, 214, 140, 0.15);
            border: 1px solid rgba(61, 214, 140, 0.4);
            color: var(--success);
        }

        .uc-kyc-verified svg {
            width: 14px;
            height: 14px;
        }

        

        /* logout + settings row */
        .uc-profile-actions {
            display: flex;
            gap: 10px;
        }

        .uc-btn-logout {
            flex: 1;
            height: 42px;
            background: rgba(248, 113, 113, 0.1);
            border: 1px solid rgba(248, 113, 113, 0.25);
            border-radius: var(--radius-sm);
            color: var(--danger);
            font-family: sans-serif;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .uc-btn-logout:hover {
            background: rgba(248, 113, 113, 0.18);
            border-color: rgba(248, 113, 113, 0.4);
        }

        .uc-btn-settings {
            flex: 1;
            height: 42px;
            background: var(--accent-dim);
            border: 1px solid var(--accent-border);
            border-radius: var(--radius-sm);
            color: var(--accent);
            font-family: sans-serif;
            font-weight: 700;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
        }

        .uc-btn-settings:hover {
            background: rgba(234, 196, 110, 0.2);
            color: var(--accent);
        }

        /* ── Tab Bar ── */
        .uc-tabs {
            display: flex;
            background: var(--bg-layer2);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 5px;
            margin-bottom: 16px;
            gap: 4px;
        }

        .uc-tab {
            flex: 1;
            padding: 9px 4px;
            text-align: center;
            font-family: sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid transparent;
            background: transparent;
            white-space: nowrap;
        }

        .uc-tab:hover {
            color: var(--text-secondary);
        }

        .uc-tab.active {
            background: var(--accent-dim);
            border-color: var(--accent-border);
            color: var(--accent);
        }

        /* ── Tab Panels ── */
        .uc-panel {
            display: none;
        }

        .uc-panel.active {
            display: block;
        }

        /* ── Section Label ── */
        .uc-section-label {
            font-family: sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            padding: 0 4px;
            margin: 20px 0 8px;
        }

        .uc-section-label:first-child {
            margin-top: 0;
        }

        /* ── Settings List ── */
        .uc-list {
            background: var(--bg-layer2);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .uc-list-item {
            display: flex;
            align-items: center;
            padding: 16px 18px;
            border-bottom: 1px solid var(--border-soft);
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            gap: 14px;
        }

        .uc-list-item:last-child {
            border-bottom: none;
        }

        .uc-list-item:hover {
            background: var(--bg-layer3);
        }

        .uc-item-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: var(--radius-sm);
            background: var(--bg-layer1);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .uc-list-item:hover .uc-item-icon {
            background: var(--accent-dim);
            border-color: var(--accent-border);
        }

        .uc-item-icon svg {
            width: 16px;
            stroke: var(--text-muted);
            transition: var(--transition);
        }

        .uc-list-item:hover .uc-item-icon svg {
            stroke: var(--accent);
        }

        .uc-item-body {
            flex: 1;
            min-width: 0;
        }

        .uc-item-title {
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-item-sub {
            font-size: 0.72rem;
            color: var(--text-muted);
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-item-value {
            font-size: 0.78rem;
            color: var(--text-muted);
            text-align: right;
            flex-shrink: 0;
            max-width: 140px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-item-value.accent {
            color: var(--accent);
        }

        .uc-item-value.success {
            color: var(--success);
        }

        .uc-item-value.danger {
            color: var(--danger);
        }

        .uc-item-value.muted {
            color: var(--text-muted);
        }

        .uc-chevron {
            width: 16px;
            height: 16px;
            min-width: 16px;
            stroke: var(--text-muted);
            flex-shrink: 0;
            transition: var(--transition);
        }

        .uc-list-item:hover .uc-chevron {
            stroke: var(--accent);
            transform: translateX(2px);
        }

        /* ── Toggle Switch ── */
        .uc-toggle {
            position: relative;
            width: 44px;
            height: 24px;
            flex-shrink: 0;
        }

        .uc-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .uc-toggle-track {
            position: absolute;
            inset: 0;
            background: var(--bg-layer1);
            border: 1px solid var(--border);
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition);
        }

        .uc-toggle input:checked+.uc-toggle-track {
            background: var(--accent);
            border-color: var(--accent);
        }

        .uc-toggle-track::before {
            content: '';
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--text-muted);
            top: 2px;
            left: 2px;
            transition: var(--transition);
        }

        .uc-toggle input:checked+.uc-toggle-track::before {
            transform: translateX(20px);
            background: var(--bg-deep);
        }

        /* ── My Info — PFP big card ── */
        .uc-pfp-card {
            background: var(--bg-layer2);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 0;
            position: relative;
            overflow: hidden;
        }

        .uc-pfp-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 90% 50%, var(--accent-dim), transparent 60%);
            pointer-events: none;
        }

        .uc-pfp-large {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent-border);
            flex-shrink: 0;
        }

        .uc-pfp-large-default {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: var(--bg-layer3);
            border: 2px solid var(--accent-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: sans-serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--accent);
            flex-shrink: 0;
        }

        .uc-pfp-info {
            flex: 1;
            min-width: 0;
        }

        .uc-pfp-name {
            font-family: sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-pfp-email {
            font-size: 0.78rem;
            color: var(--text-secondary);
            margin-bottom: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .uc-pfp-edit {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 20px;
            background: var(--accent-dim);
            border: 1px solid var(--accent-border);
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .uc-pfp-edit:hover {
            background: rgba(234, 196, 110, 0.2);
            color: var(--accent);
        }

        .uc-pfp-edit svg {
            width: 10px;
            stroke: var(--accent);
        }

        /* KYC levels */
  .uc-kyc-levels {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

    .uc-kyc-level {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-family: sans-serif;
    }

    .uc-kyc-level.done {
        background: rgba(61, 214, 140, 0.15);
        border: 1px solid rgba(61, 214, 140, 0.4);
        color: var(--success);
    }

    .uc-kyc-level.pending {
        background: rgba(251, 191, 36, 0.15);
        border: 1px solid rgba(251, 191, 36, 0.5);
        color: var(--warning);
    }

    .uc-kyc-level.locked {
        background: rgba(255,255,255,0.05);
        border: 1px solid var(--border);
        color: var(--text-muted);
    }

        /* Preferences radio-style rows */
        .uc-pref-group {
            margin-bottom: 0;
        }

        .uc-pref-label {
            font-family: sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            padding: 14px 18px 6px;
            display: block;
        }

        /* ── Empty state ── */
        .uc-empty {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .uc-empty svg {
            width: 40px;
            stroke: var(--text-muted);
            margin-bottom: 12px;
            opacity: 0.4;
        }

        /* ── Section description ── */
        .uc-section-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-bottom: 10px;
            padding: 0 2px;
            line-height: 1.5;
        }

        .locked-funds-card {
            background: linear-gradient(135deg, var(--bg-layer2), var(--bg-layer1));
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            position: relative;
            overflow: hidden;
        }

        .locked-funds-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, var(--accent-dim), transparent 60%);
            pointer-events: none;
        }

        .locked-funds-inner {
            padding: 24px 20px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .locked-label {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            font-family: sans-serif;
        }

        .locked-amount {
            font-size: 2.2rem;
            font-weight: 700;
            font-family: sans-serif;
            color: var(--accent);
            margin-top: 8px;
        }

        .locked-meta {
            font-size: 12px;
            color: var(--text-secondary);
            margin-top: 6px;
        }

        /* subtle hover effect */
        .locked-funds-card:hover {
            border-color: var(--accent-border);
            box-shadow: var(--shadow-accent);
            transform: translateY(-2px);
        }

        /* Review Section - Premium Dark Theme */
        .review-section {
            margin-top: 24px;
        }

        .review-card {
            background: var(--bg-layer2);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-card);
        }

        .review-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
            border-bottom: 1px solid var(--border-soft);
        }

        .review-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .review-label {
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .review-value {
            color: var(--text-primary);
            font-weight: 600;
            font-family: sans-serif;
            text-align: right;
        }

        .review-value.accent {
            color: var(--accent);
        }

        .review-value.total {
            font-size: 1.15rem;
            font-weight: 700;
        }

        .payment-method {
            vertical-align: middle;
            border: 1px solid var(--accent-border);
        }

        /* Highlight total row */
        .total-row {
            margin-top: 8px;
            padding-top: 16px !important;
            border-top: 1px solid var(--accent-border);
        }

        .total-row .review-label {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ── Responsive ── */
        @media (max-width: 575px) {
            .uc-page {
                padding-bottom: 90px;
            }

            .uc-tab {
                font-size: 0.65rem;
                padding: 8px 2px;
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
            {{-- <div class="logo">
                <a href="..">
                    <img class="logo-unfold" src="{{ url('assets/images/rel-icon.png') }}" alt="Logo" />
                    <img class="logo-fold" src="{{ url('assets/images/rel-icon.png') }}" alt="Logo" />
                </a>
            </div> --}}

            <div class="logo">
                <img class="logo-unfold h-8 w-8" src="{{ url('assets/images/rel-icon.png') }}" alt="Logo" />
                <span class="text-lg font-semibold">{{ config('app.name') }}</span>
            </div>
            <div class="nav-wrap">
                <div class="nav-left">
                    <button class="sidebar-toggle">
                        <i class="anticon anticon-menu"></i>
                    </button>
                    <div class="mob-logo mobile-screen-show">
                        <a href="..">
                            <img src="{{ url('assets/images/rel-icon.png') }}" style="height: 48px; width: 48px;"
                                alt="{{ config('app.name') }}" />
                        </a>
                    </div>
                </div>
                <div class="nav-right">
                    <div class="single-nav-right">

                        <div class="single-right">
                            {{-- <div class="color-switcher">
                                <i icon-name="moon" class="dark-icon" data-mode="dark"></i>
                                <i icon-name="sun" class="light-icon" data-mode="light"></i>
                            </div> --}}
                        </div>

                        <div class="single-nav-right user-notifications">
                            @php $notifications = $notifications ?? collect(); @endphp

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
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </div>
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
                                                    onclick="openCustom(event, this); loadNotifications(); updateUnreadCount();"
                                                    class="{{ ($notification->read == 1) ? 'read' : '' }}">
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
                                            <p class="text-center my-3" style="color: var(--text-muted); font-size: 13px;">
                                                No notifications found</p>
                                        @endforelse
                                    </div>
                                    <div class="noti-footer mt-3">
                                        <a class="noti-btn-1 me-1 w-100" href="javascript:void(0);"
                                            onclick="markAllAsRead()">Mark All as Read</a>
                                        <a class="noti-btn-2 ms-1 w-100" href="{{ route('notifications.index') }}"
                                            onclick="openCustom(event, this)">See all</a>
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
                                            <i class="anticon anticon-logout text-danger"></i>Logout
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
            <div class="side-nav">
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
                        <a href="{{ route('deposit') }}" onclick="openCustom(event, this)" class="user-sidebar-btn">
                            <i class="anticon anticon-file-add"></i>Deposit
                        </a>
                        <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)"
                            class="user-sidebar-btn red-btn">
                            <i class="anticon anticon-home"></i>Trade Hub
                        </a>
                    </div>
                </div>
                <div class="side-nav-inside">
                    <ul class="side-nav-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('index') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-appstore"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('plans') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-tags"></i><span>Pricing</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-file-add"></i><span>Fund Account</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('deposit.history') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-unordered-list"></i><span>Deposit History</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-bank"></i><span>Withdraw</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('withdraw.history') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-credit-card"></i><span>Withdraw History</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('settings') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-setting"></i><span>Settings</span>
                            </a>
                        </li>
                        {{-- <li class="side-nav-item">
                            <a href="{{ route('account.info') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-info-circle"></i><span>Account Info</span>
                            </a>
                        </li> --}}
                        <li class="side-nav-item">
                            <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-setting"></i><span>Edit Account Info</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('avatar.edit') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-picture"></i><span>Update Photo</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('traders.index') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-copy"></i><span>Copy Trading</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('user.verify') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-idcard"></i><span>ID Verification</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('email.update') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-mail"></i><span>Update Email</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('password.update') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-key"></i><span>Change Password</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('locked.funds') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-lock"></i><span>Locked Funds</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-usergroup-add"></i><span>Referrals/Rank</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">
                                <i class="anticon anticon-notification"></i><span>Notifications</span>
                            </a>
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
                            <div class="col"></div>
                        </div>
                        <div class="row mobile-screen-show">
                            <div class="col-12"></div>
                        </div>
                        {{-- BACK BUTTON --}}
                        <div id="back-button-container" style="display: none;">
                            <div class="uc-section-label" style="display:flex;align-items:center;gap:10px;">
                                @include('livewire.dashboard.partials.back-button')
                            </div>
                        </div>
                        <!--Page Content-->
                            
                        <!-- ADD THIS WRAPPER -->
                        <div id="dynamic-content">
                            @if(isset($content_view))
                                @include($content_view)
                            @else
                                @yield('content')
                            @endif
                        </div>
                        <!--/Page Content-->
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Bottom App Bar -->
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
        <!-- /Mobile Bottom App Bar -->

    </div>
    <!--/Panel Layout-->

    <script src="{{ asset('assets/global/js/jquery.min.js') }}"></script>
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
    <script src="{{ asset('assets/frontend/js/custom-router.js') }}"></script>

    {{-- @yield('xtraJs') --}}


    {{-- @section('xtraJs') --}}
    @include('layouts.app.xtrajs')
    {{-- @endsection --}}

</body>

</html>
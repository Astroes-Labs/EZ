@extends('layouts.dashboard')
@section('title', 'Dashboard | ' . config('app.name'))

@section('content')

    <style>
        /* ─── DESIGN TOKENS ─────────────────────────────── */
        :root {
            --bg-base: #0a0f1c;
            --bg-layer: #111827;
            --bg-card: #1a2238;
            --bg-card-hover: #1f2a44;
            --border: #222f53;
            --accent: #eac46e;
            --accent-dim: rgba(234, 196, 110, 0.12);
            --accent-text: #0a0f1c;
            --text-primary: #f1f5f9;
            --text-muted: #8b9ec7;
            --text-faint: #4a5a80;
            --success: #22c55e;
            --danger: #ef4444;
            --shadow-card: 0 4px 24px rgba(0, 0, 0, 0.35);
            --radius-lg: 16px;
            --radius-xl: 22px;
            --transition: all 0.22s cubic-bezier(.4, 0, .2, 1);
        }

        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Syne:wght@600;700;800&display=swap');

        #dynamic-content {
            background: var(--bg-base);
            min-height: 100vh;
            font-family: 'DM Sans', 'Segoe UI', sans-serif;
            color: var(--text-primary);
        }

        /* ─── SITE-CARD OVERRIDE ─────────────────────────── */
        .site-card {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-xl) !important;
            box-shadow: var(--shadow-card) !important;
            overflow: hidden;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .site-card:hover {
            border-color: rgba(234, 196, 110, 0.2) !important;
        }

        .site-card-header {
            background: transparent !important;
            border-bottom: 1px solid var(--border) !important;
            padding: 1.25rem 1.75rem !important;
        }

        .site-card-header .title {
            font-family: 'DM Sans', sans-serif !important;
            font-weight: 700 !important;
            font-size: 1rem !important;
            color: var(--text-primary) !important;
            letter-spacing: 0.02em !important;
            margin: 0 !important;
        }

        .site-card-body {
            padding: 1.5rem 1.75rem !important;
        }

        /* ─── USER RANKING CARD ──────────────────────────── */
        .user-ranking {
            background: linear-gradient(135deg, #1a2238 0%, #162040 100%) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-xl) !important;
            box-shadow: var(--shadow-card) !important;
            padding: 1.75rem 1.25rem !important;
            text-align: center;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: var(--transition);
        }

        .user-ranking::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(234, 196, 110, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .user-ranking h4 {
            font-family: 'DM Sans', sans-serif !important;
            font-weight: 800 !important;
            font-size: 1.1rem !important;
            color: var(--accent) !important;
            margin: 0 !important;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .user-ranking .rank {
            width: 56px;
            height: 56px;
            background: var(--accent-dim);
            border: 1.5px solid var(--accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
        }

        /* ─── REFERRAL LINK ──────────────────────────────── */
        .referral-link-form {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .referral-link-form input[type="text"] {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            color: var(--text-muted) !important;
            padding: 0.75rem 1.1rem !important;
            font-size: 0.9rem !important;
            flex: 1;
            /* Input takes most space */
            outline: none;
            transition: var(--transition);
            min-width: 0;
            /* Prevents overflow issues */
        }

        .referral-link-form input[type="text"]:focus {
            border-color: var(--accent) !important;
            color: var(--text-primary) !important;
        }

        .referral-link-form button {
            background: var(--accent) !important;
            color: var(--accent-text) !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 0.75rem 1.5rem !important;
            font-weight: 700 !important;
            font-size: 0.9rem !important;
            white-space: nowrap;
            cursor: pointer;
            transition: var(--transition);
            flex-shrink: 0;
            /* Button keeps its natural width */
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .referral-link-form button:hover {
            background: #f0d080 !important;
            transform: translateY(-1px);
        }

        .referral-joined {
            color: var(--text-faint) !important;
            font-size: 0.78rem !important;
            margin-top: 0.6rem !important;
        }

        /* ─── FUND ACCOUNT BUTTON ────────────────────────── */
        .user-sidebar-btn.btn-primary {
            background: var(--accent) !important;
            color: var(--accent-text) !important;
            border: none !important;
            border-radius: 12px !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            letter-spacing: 0.06em !important;
            padding: 0.85rem 1.5rem !important;
            width: 100%;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px;
            transition: var(--transition) !important;
            box-shadow: 0 4px 20px rgba(234, 196, 110, 0.25) !important;
        }

        .user-sidebar-btn.btn-primary:hover {
            background: #f0d080 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 28px rgba(234, 196, 110, 0.35) !important;
        }

        /* ─── STAT CARDS ─────────────────────────────────── */
        .user-cards .single {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-lg) !important;
            padding: 1.35rem 1.25rem !important;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            transition: var(--transition);
            box-shadow: var(--shadow-card);
            position: relative;
            overflow: hidden;
        }

        .user-cards .single::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .user-cards .single:hover {
            background: var(--bg-card-hover) !important;
            border-color: rgba(234, 196, 110, 0.3) !important;
            transform: translateY(-3px);
        }

        .user-cards .single:hover::after {
            width: 100%;
        }

        .user-cards .single .icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            background: var(--accent-dim);
            border: 1px solid rgba(234, 196, 110, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-cards .single .icon i {
            font-size: 1.2rem !important;
            color: var(--accent) !important;
        }

        .user-cards .single .content h4 {
            font-family: 'DM Sans', sans-serif !important;
            font-size: 1.15rem !important;
            font-weight: 700 !important;
            color: var(--text-primary) !important;
            margin: 0 0 2px !important;
            line-height: 1.2 !important;
        }

        .user-cards .single .content h4 b {
            color: var(--accent) !important;
            font-weight: 700 !important;
        }

        .user-cards .single .content p {
            font-size: 0.75rem !important;
            color: var(--text-muted) !important;
            margin: 0 !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* ─── TABLE ──────────────────────────────────────── */
        .data-table {
            width: 100% !important;
            border-collapse: separate !important;
            border-spacing: 0 4px !important;
        }

        .data-table thead tr th {
            background: transparent !important;
            color: var(--text-faint) !important;
            font-size: 0.72rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            font-weight: 600 !important;
            padding: 0.5rem 1rem !important;
            border: none !important;
        }

        .data-table tbody tr td {
            background: rgba(255, 255, 255, 0.02) !important;
            color: var(--text-primary) !important;
            padding: 0.9rem 1rem !important;
            font-size: 0.85rem !important;
            border: none !important;
            border-top: 1px solid var(--border) !important;
            vertical-align: middle;
        }

        .data-table tbody tr:hover td {
            background: rgba(234, 196, 110, 0.04) !important;
        }

        .data-table .date {
            font-size: 0.72rem !important;
            color: var(--text-faint) !important;
            margin-top: 3px;
        }

        .data-table .text-success {
            color: var(--success) !important;
            font-weight: 600;
        }

        .data-table .text-danger {
            color: var(--danger) !important;
            font-weight: 600;
        }

        /* ─── BADGES ─────────────────────────────────────── */
        .site-badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px !important;
            border-radius: 6px !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            letter-spacing: 0.05em;
            text-transform: capitalize;
        }

        .site-badge.badge-success,
        .site-badge.bg-success {
            background: rgba(34, 197, 94, 0.15) !important;
            color: #22c55e !important;
            border: 1px solid rgba(34, 197, 94, 0.3) !important;
        }

        .site-badge.badge-warning,
        .site-badge.bg-warning {
            background: rgba(234, 196, 110, 0.15) !important;
            color: var(--accent) !important;
            border: 1px solid rgba(234, 196, 110, 0.3) !important;
        }

        .site-badge.badge-danger,
        .site-badge.bg-danger {
            background: rgba(239, 68, 68, 0.15) !important;
            color: #ef4444 !important;
            border: 1px solid rgba(239, 68, 68, 0.3) !important;
        }

        .site-badge.badge-secondary,
        .site-badge.bg-secondary {
            background: rgba(139, 158, 199, 0.12) !important;
            color: var(--text-muted) !important;
            border: 1px solid var(--border) !important;
        }

        /* ─── MOBILE RANKING ─────────────────────────────── */
        .user-ranking-mobile {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-xl) !important;
            padding: 1.25rem 1.5rem !important;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .user-ranking-mobile .name h4 {
            font-family: 'DM Sans', sans-serif !important;
            font-weight: 700 !important;
            font-size: 1rem !important;
            color: var(--text-primary) !important;
            margin: 0 !important;
        }

        .user-ranking-mobile .name p {
            color: var(--accent) !important;
            font-size: 0.78rem !important;
            margin: 2px 0 0 !important;
        }

        /* ─── MOBILE WALLET ──────────────────────────────── */
        .user-wallets-mobile {
            background: linear-gradient(135deg, #162040 0%, #1a2238 100%) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-xl) !important;
            padding: 1.5rem !important;
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .user-wallets-mobile .head {
            font-size: 0.75rem !important;
            color: var(--text-faint) !important;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .user-wallets-mobile .one .balance .symbol {
            font-family: 'DM Sans', sans-serif !important;
            font-size: 1.6rem !important;
            font-weight: 800 !important;
            color: var(--text-primary) !important;
        }

        .user-wallets-mobile .one .wallet {
            font-size: 0.75rem !important;
            color: var(--text-muted) !important;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-top: 2px;
        }

        .user-wallets-mobile .one.p-wal {
            margin-top: 1rem;
        }

        .user-wallets-mobile .info {
            font-size: 0.75rem !important;
            color: var(--text-faint) !important;
            margin-top: 1rem;
            padding-top: 0.75rem;
            border-top: 1px solid var(--border);
        }

        /* ─── MOBILE SHORTCUT ────────────────────────────── */
        .mob-shortcut-btn {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .mob-shortcut-btn a {
            flex: 1;
            background: var(--accent-dim) !important;
            border: 1px solid rgba(234, 196, 110, 0.35) !important;
            border-radius: var(--radius-lg) !important;
            padding: 0.9rem 0.5rem !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 6px;
            color: var(--accent) !important;
            font-size: 0.72rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            text-align: center;
            transition: var(--transition) !important;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        /* Hover becomes subtle */
        .mob-shortcut-btn a:hover {
            background: var(--bg-card) !important;
            border-color: var(--border) !important;
            color: var(--text-muted) !important;
            transform: translateY(-2px);
        }

        /* ─── ALL FEATURE MOBILE ─────────────────────────── */
        .all-feature-mobile {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-xl) !important;
            padding: 1.25rem 1.25rem 1rem !important;
            box-shadow: var(--shadow-card);
        }

        .all-feature-mobile .title {
            font-family: 'DM Sans', sans-serif !important;
            font-size: 0.8rem !important;
            font-weight: 700 !important;
            color: var(--text-faint) !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            margin-bottom: 1rem !important;
        }

        .all-feature-mobile .single .icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            transition: var(--transition);
        }

        .all-feature-mobile .single a:hover .icon {
            background: var(--accent-dim);
            border-color: rgba(234, 196, 110, 0.3);
        }

        .all-feature-mobile .single a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none !important;
            padding: 0.5rem 0.25rem;
        }

        .all-feature-mobile .single .name {
            font-size: 0.68rem !important;
            color: var(--text-muted) !important;
            text-align: center;
            margin-top: 6px;
            font-weight: 500;
        }

        /* ─── MOBILE TRANSACTION ─────────────────────────── */
        .single-transaction {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 0.9rem 0 !important;
            border-bottom: 1px solid var(--border) !important;
            transition: var(--transition);
        }

        .single-transaction:last-child {
            border-bottom: none !important;
        }

        .transaction-title strong {
            font-size: 0.85rem !important;
            color: var(--text-primary) !important;
            font-weight: 600 !important;
        }

        .transaction-id {
            font-size: 0.68rem !important;
            color: var(--text-faint) !important;
            margin-top: 2px;
        }

        .transaction-date {
            font-size: 0.7rem !important;
            color: var(--text-faint) !important;
            margin-top: 2px;
        }

        .transaction-amount {
            font-size: 0.9rem !important;
            font-weight: 700 !important;
            text-align: right;
        }

        .transaction-amount.text-success {
            color: var(--success) !important;
        }

        .transaction-amount.text-danger {
            color: var(--danger) !important;
        }

        .transaction-gateway {
            font-size: 0.7rem !important;
            color: var(--text-faint) !important;
            text-align: right;
            margin-top: 3px;
        }

        /* ─── LOAD MORE ──────────────────────────────────── */
        .site-btn-sm.grad-btn,
        .moreless-button,
        .moreless-button-2 {
            background: transparent !important;
            color: var(--accent) !important;
            border: 1px solid rgba(234, 196, 110, 0.35) !important;
            border-radius: 8px !important;
            padding: 0.45rem 1.25rem !important;
            font-size: 0.78rem !important;
            font-weight: 600 !important;
            cursor: pointer;
            transition: var(--transition) !important;
            letter-spacing: 0.04em;
        }

        .site-btn-sm.grad-btn:hover,
        .moreless-button:hover,
        .moreless-button-2:hover {
            background: var(--accent) !important;
            color: var(--accent-text) !important;
        }

        .centered {
            text-align: center;
            margin-top: 1rem;
        }

        /* ─── SINGLE CARD MOBILE ─────────────────────────── */
        .single-card {
            background: rgba(255, 255, 255, 0.025) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px !important;
            padding: 0.9rem 1rem !important;
            display: flex;
            align-items: center;
            gap: 0.85rem;
            margin-bottom: 0.6rem;
            transition: var(--transition);
        }

        .single-card:hover {
            background: var(--accent-dim) !important;
            border-color: rgba(234, 196, 110, 0.25) !important;
        }

        .single-card .icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            background: rgba(234, 196, 110, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .single-card .content .amount {
            font-family: 'DM Sans', sans-serif !important;
            font-size: 1rem !important;
            font-weight: 700 !important;
            color: var(--text-primary) !important;
        }

        .single-card .content .name {
            font-size: 0.72rem !important;
            color: var(--text-muted) !important;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-top: 2px;
        }

        /* ─── MOBILE REFERRAL ────────────────────────────── */
        .mobile-referral-link-form {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .mobile-referral-link-form input[type="text"] {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid var(--border) !important;
            border-radius: 8px !important;
            color: var(--text-muted) !important;
            padding: 0.55rem 0.85rem !important;
            font-size: 0.78rem !important;
            flex: 1;
            outline: none;
        }

        .mobile-referral-link-form button {
            background: var(--accent) !important;
            color: var(--accent-text) !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 0.55rem 1rem !important;
            font-size: 0.78rem !important;
            font-weight: 700 !important;
            cursor: pointer;
            transition: var(--transition) !important;
        }

        .mobile-referral-link-form button:hover {
            background: #f0d080 !important;
        }

        /* ─── DATATABLE OVERRIDES ────────────────────────── */
        .dataTables_wrapper .dataTables_filter input {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid var(--border) !important;
            border-radius: 8px !important;
            color: var(--text-primary) !important;
            padding: 0.4rem 0.8rem !important;
        }

        .dataTables_wrapper .dataTables_length select {
            background: var(--bg-card) !important;
            border: 1px solid var(--border) !important;
            border-radius: 6px !important;
            color: var(--text-primary) !important;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: var(--text-muted) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--accent) !important;
            color: var(--accent-text) !important;
            border-radius: 6px !important;
            border: none !important;
        }

        /* ─── MORETEXT COLLAPSED ─────────────────────────── */
        .moretext,
        .moretext-2 {
            display: none;
        }

        /* ─── SCROLLBAR ──────────────────────────────────── */
        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-base);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent);
        }

        /* ─── REVIEW CARD ───────────────────────────── */
        .review-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-xl);
            padding: 1.4rem 1.5rem;
            box-shadow: var(--shadow-card);
        }

        /* Title */
        .review-card .user-panel-title h5 {
            color: var(--accent);
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.04em;
        }

        /* ─── TABLE RESET ───────────────────────────── */
        .review-table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Rows */
        .review-table tr {
            border-bottom: 1px solid var(--border);
        }

        .review-table tr:last-child {
            border-bottom: none;
        }

        /* Left labels */
        .review-table td:first-child {
            color: var(--text-faint);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.85rem 0;
        }

        /* Right values */
        .review-table td.value {
            text-align: right;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Currency accent */
        .review-table .currency,
        .review-table .paymentCurrency {
            color: var(--accent);
            margin-left: 4px;
        }

        /* Payment logo */
        .review-table .payment-method {
            /* height: 30px; */
            padding: 4px 6px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 6px;
        }

        /* Total row highlight */
        .review-table .total-row td {
            padding-top: 1rem;
            font-weight: 700;
        }

        .review-table .total-row td:first-child {
            color: var(--text-primary);
        }

        .review-table .total-row td.value {
            color: var(--accent);
            font-size: 1rem;
        }

        /* Optional hover (very subtle) */
        .review-table tr:hover td {
            background: rgba(234, 196, 110, 0.03);
        }

        /* ─── ENHANCED RANK CARD ───────────────────── */
        .user-ranking.enhanced {
            text-align: center;
            gap: 0.6rem;
        }

        .user-ranking.enhanced .rank-badge {
            width: 80px;
            height: 80px;
            margin-bottom: 0.4rem;
            background: var(--accent-dim);
            border: 1px solid rgba(234, 196, 110, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .user-ranking.enhanced .rank-badge img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .user-ranking.enhanced h4 {
            color: var(--accent) !important;
            font-size: 1rem !important;
        }

        .user-ranking.enhanced .rank-label {
            font-size: 0.7rem;
            color: var(--text-muted);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* ─── REFERRAL CARD POLISH ─────────────────── */
        .referral-card {
            position: relative;
        }

        .referral-card::after {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(234, 196, 110, 0.08), transparent 70%);
            border-radius: 50%;
        }

        /* Input improvement */
        .referral-link-form input {
            font-size: 0.85rem !important;
        }

        /* Button refinement */
        .referral-link-form button {
            display: flex;
            align-items: center;
            gap: 6px;
        }
    </style>

    <!-- Placeholder for dynamically loaded content -->
    <div id="dynamic-content">
        <div class="desktop-screen-show" style="padding: 1.5rem;">

            <div class="row g-3 align-items-stretch">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="user-ranking">

                        <h4>
                            {{ $userClass['class'] }}
                        </h4>
                        {{-- <p style="margin:0;">
                            <img src="{{ $userClass['icon']  }}" alt=""
                                style="height: 75px; width: 75px; filter: drop-shadow(0 4px 12px rgba(234,196,110,0.3));">
                        </p> --}}
                        <div class="rank" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                            <img src="{{ $userClass['icon']  }}" alt="" style="height: ; width: 36px;">
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-12">
                    <div class="site-card" style="height:100%; margin-bottom:0;">
                        <div class="site-card-header">
                            <h3 class="title">Referral Link</h3>
                        </div>
                        <div class="site-card-body">
                            <div class="referral-link">
                                <div class="referral-link-form">
                                    <input type="text" value="{{ route('register') . '?refid=' . Auth::id() }}" id="refLink"
                                        readonly />


                                    <button type="submit" onclick="copyRef()">
                                        <i class="anticon anticon-copy"></i>
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
            <div class="row user-cards g-3" style="margin-top:1.25rem;">
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
            <div class="row user-cards g-3" style="margin-top:1.25rem;">
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
                            <p>Total Locked Funds </p>
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
                            <h4 id="target"
                                style="display: none; font-family:'DM Sans',sans-serif; font-size:0.95rem; color:var(--accent);">
                                {{ Auth::user()->rankName() }}
                            </h4>
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


            <div class="row" style="margin-top:1.5rem;">
                <div class="col-xl-12">
                    <div class="site-card">
                        <div class="site-card-header">
                            <h3 class="title">Recent Transactions</h3>
                        </div>
                        <div class="site-card-body table-responsive">
                            <div class="site-datatable">
                                <table class="display data-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>
                                                    <strong>
                                                        @if ($transaction['type'] === 'Withdrawal')
                                                            Withdrawn {{ $transaction['currency'] ?? 'N/A' }}
                                                        @else
                                                            {{ $transaction['comment'] ?? 'Deposit' }}
                                                        @endif
                                                    </strong>
                                                    <div class="date">
                                                        {{ \Carbon\Carbon::parse($transaction['created_at'])->format('M d Y H:i') }}
                                                    </div>
                                                </td>

                                                <td
                                                    class="{{ $transaction['type'] === 'Withdrawal' ? 'text-danger' : 'text-success' }}">
                                                    {{ $transaction['type'] === 'Withdrawal' ? '-' : '+' }}
                                                    {{ number_format($transaction['amount'], 2) }}
                                                </td>
                                                <td>
                                                    <div class="site-badge {{ $transaction['status_class'] }}">
                                                        {{ ucfirst($transaction['status']) }}
                                                    </div>
                                                </td>
                                                <td>{{ $transaction['type'] === 'Withdrawal' ? $transaction['payment_method'] : $transaction['crypto_currency'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-screen-show" style="padding: 1rem;">
            <div class="row g-3">
                <div class="col-12">
                    <div class="user-ranking-mobile">
                        <div class="icon"><img
                                src="{{ Auth::user()->photo_profile ?? '../assets/global/materials/upload.svg' }}" alt=""
                                height="45" width="45"
                                style="border-radius: 50%; border: 2px solid var(--accent); object-fit:cover;" /></div>
                        <div class="name">
                            <h4>Hi, {{ Auth::user()->name  }}

                            </h4>
                            <p>
                                <span> {{ $userClass['class']  }}

                                </span>
                            </p>
                        </div>
                        <div class="rank-badge" style="margin-left:auto;"><img src="{{ $userClass['icon']  }}" alt=""
                                style="height:36px;width:36px;" />
                        </div>
                    </div>
                    <div class="user-wallets-mobile">
                        <img src="../assets/frontend/materials/wallet-shadow.png" alt="" class="wallet-shadow"
                            style="display:none;">
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
                                <span class="symbol"
                                    style="font-size:1.1rem !important; color:var(--text-muted) !important;">{{ Auth::user()->getCurrencySymbol() . ' ' . Auth::user()->displayBalance(Auth::user()->locked_funds) }}</span>
                                <span class="after-dot">
                                </span>
                            </div>
                            <div class="wallet">Locked Funds</div>
                        </div>
                        <div class="info">
                            <i icon-name="info"></i>You Earned 0 {{ Auth::user()->currency  }} This Week
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mob-shortcut-btn">

                        <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                            <div class="w-100" style="display:flex;justify-content:center;">
                                <img src="{{ asset('assets\frontend\icons\layout-dashboard.svg')  }}" alt=""
                                    style="height:22px;width:22px;opacity:0.7;">
                            </div>

                            Deposit
                        </a>
                        <a href="{{ route('trade.index') }}" onclick="openCustom(event, this)">
                            <div class="w-100" style="display:flex;justify-content:center;">
                                <img src="{{ asset('assets\frontend\icons\home.svg')  }}" alt=""
                                    style="height:22px;width:22px;opacity:0.7;">
                            </div> Trade Hub
                        </a>
                        <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)">
                            <div class="w-100" style="display:flex;justify-content:center;">
                                <img src="{{ asset('assets\frontend\icons\send.svg')  }}" alt=""
                                    style="height:22px;width:22px;opacity:0.7;">
                            </div> Withdraw
                        </a>
                    </div>
                </div>


                <div class="col-12">
                    <!-- all navigation -->
                    <div class="all-feature-mobile mb-3 mobile-screen-show">
                        <div class="title">All Navigations</div>

                        <div class="contents row g-2">
                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('plans') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/schema.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Pricing</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('deposit') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/deposit.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Fund Account</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('deposit.history') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/deposit-log.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Deposit History</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('withdraw') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/withdraw.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Withdraw</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('withdraw.history') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/withdraw-log.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Withdraw History</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('account.info') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/schema-log.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Account Info</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('traders.index') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/transactions.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Copy Trading</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('user.verify') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/transfer-log.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">ID Verification </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="single">
                                    <a href="{{ route('locked.funds') }}" onclick="openCustom(event, this)">
                                        <div class="icon"><img src="../assets/frontend/materials/transfer.png" alt=""
                                                style="height:22px;width:22px;">
                                        </div>
                                        <div class="name">Locked Funds</div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="moretext">
                            <div class="row g-2 contents">

                                <div class="col-4">
                                    <div class="single">
                                        <a href="{{ route('referrals.rank.show') }}" onclick="openCustom(event, this)">
                                            <div class="icon"><img src="../assets/frontend/materials/referral.png" alt=""
                                                    style="height:22px;width:22px;">
                                            </div>
                                            <div class="name">Referral/Rank</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="single">
                                        <a href="{{ route('account.info.edit') }}" onclick="openCustom(event, this)">
                                            <div class="icon"><img src="../assets/frontend/materials/settings.png" alt=""
                                                    style="height:22px;width:22px;">
                                            </div>
                                            <div class="name">Settings</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="single">
                                        <a href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">
                                            <div class="icon"><img src="../assets/frontend/materials/profile.png" alt=""
                                                    style="height:22px;width:22px;">
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
                                                    <img src="{{ asset('assets\frontend\icons\home-white.svg')  }}" alt=""
                                                        style="height:18px;width:18px;">
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
                                                    <img src="{{ asset('assets\frontend\icons\download.svg')  }}" alt=""
                                                        style="height:18px;width:18px;">
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
                                                    <img src="{{ asset('assets\frontend\icons\box-white.svg')  }}" alt=""
                                                        style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\credit-card.svg')  }}"
                                                            alt="" style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\log-in.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
                                                    </div>
                                                    <div class="content">
                                                        <div class="amount">{{ Auth::user()->getCurrencySymbol()}}<span
                                                                class="count">{{ number_format(Auth::user()->locked_funds, 0) }}</span>
                                                        </div>
                                                        <div class="name">Total Locked Funds</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="single-card">
                                                    <div class="icon">
                                                        <img src="{{ asset('assets\frontend\icons\log-in.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\users-2.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\anchor.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\archive.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\gift.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                        <img src="{{ asset('assets\frontend\icons\award.svg')  }}" alt=""
                                                            style="height:18px;width:18px;">
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
                                                            alt="" style="height:18px;width:18px;">
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

                    <div class="all-feature-mobile mobile-transactions mb-3 mobile-screen-show" style="display: block;">
                        <div class="title">Recent Transactions</div>
                        <div class="contents">
                            @foreach ($transactions as $transaction)
                                <div class="single-transaction">
                                    <div class="transaction-left">
                                        <div class="transaction-des">
                                            <div class="transaction-title">
                                                <strong>
                                                    @if ($transaction['type'] === 'Withdrawal')
                                                        Withdrawal
                                                    @else
                                                        {{ $transaction['comment'] ?? 'Deposit' }}
                                                    @endif
                                                </strong>
                                            </div>
                                            <div class="transaction-id">
                                                {{ $transaction['transaction_id'] }}
                                            </div>
                                            <div class="transaction-date">
                                                {{ \Carbon\Carbon::parse($transaction['created_at'])->format('M d Y H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="transaction-right" style="text-align:right;">
                                        <div
                                            class="transaction-amount {{ $transaction['type'] === 'Withdrawal' ? 'text-danger' : 'text-success' }}">
                                            {{ $transaction['type'] === 'Withdrawal' ? '-' : '+' }}
                                            {{ number_format($transaction['amount'], 2) }} {{ $transaction['currency'] ?? '' }}
                                        </div>
                                        <div class="transaction-fee sub">
                                        </div>
                                        <div class="transaction-gateway">
                                            {{ $transaction['gateway'] }}
                                        </div>
                                        <div class="site-badge {{ $transaction['status_class'] }}" style="margin-top:4px;">
                                            {{ ucfirst($transaction['status']) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
    </div>

@endsection

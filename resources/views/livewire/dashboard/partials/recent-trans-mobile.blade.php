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
                <div class="transaction-right">
                    <div class="transaction-amount {{ $transaction['type'] === 'Withdrawal' ? 'text-danger' : 'text-success' }}">
                        {{ $transaction['type'] === 'Withdrawal' ? '-' : '+' }}
                        {{ number_format($transaction['amount'], 2) }} {{ $transaction['currency'] ?? '' }}
                    </div>
                    <div class="transaction-fee sub">
                    </div>
                    <div class="transaction-gateway">
                        {{ $transaction['gateway'] }}
                    </div>
                    <div class="site-badge {{ $transaction['status_class'] }}">
                        {{ ucfirst($transaction['status']) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
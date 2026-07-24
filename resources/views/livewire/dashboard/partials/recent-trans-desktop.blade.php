<div class="row">
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
                                    
                                    <td class="{{ $transaction['type'] === 'Withdrawal' ? 'text-danger' : 'text-success' }}">
                                        {{ $transaction['type'] === 'Withdrawal' ? '-' : '+' }}
                                        {{ number_format($transaction['amount'], 2) }}
                                    </td>
                                    <td>
                                        <div class="site-badge {{ $transaction['status_class'] }}">
                                            {{ ucfirst($transaction['status']) }}
                                        </div>
                                    </td>
                                    <td>{{ $transaction['type'] === 'Withdrawal' ? $transaction['payment_method'] : $transaction['crypto_currency'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
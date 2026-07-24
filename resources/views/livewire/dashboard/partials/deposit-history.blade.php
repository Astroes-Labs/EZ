<style>
    table {
        table-layout: auto;
        width: auto;
        border-collapse: collapse;
        min-width: auto !important;
    }

    td,
    th {
        padding: 0px;
        word-wrap: break-word;
        white-space: nowrap;
        /* white-space: normal; */
    }
</style>
<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">All Deposit Log</h3>
            </div>
            <div class="site-card-body">
                <div class="site-table">
                    <div class="table-filter d-none">
                        <div class="filter">
                            <form action="" method="get">
                                <div class="search">
                                    <input type="text" id="search" placeholder="Search" value="" name="query2">
                                    <input type="date" name="date2" value="">
                                    <button type="submit" class="apply-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" data-lucide="search"
                                            icon-name="search" class="lucide lucide-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: auto;">Description</th>
                                    <th style="width: auto;">Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($deposits as $deposit)
                                    <tr>
                                        <td style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <div class="table-description">
                                                <div class="icon">
                                                    @if (Str::contains($deposit->comment, ['Deposited', 'Bonus']))

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="arrow-down-left" icon-name="arrow-down-left"
                                                            class="lucide lucide-arrow-down-left">
                                                            <path d="M17 7 7 17"></path>
                                                            <path d="M17 17H7V7"></path>
                                                        </svg>
                                                    @else {{-- ($deposit->comment === "Locked") --}}

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="lock" icon-name="lock" class="lucide lucide-lock">
                                                            <rect x="3" y="11" width="18" height="10" rx="2"></rect>
                                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div class="description">
                                                    {{ $deposit->comment }} <strong>
                                                        @if($deposit->comment === "Deposited")
                                                            {{ $deposit->price_in_crypto }} {{ $deposit->crypto_currency }}
                                                        @else {{-- ($deposit->comment === "Locked") --}}
                                                            {{ number_format($deposit->price, 0) }} {{ Auth::user()->currency}}
                                                        @endif
                                                    </strong>
                                                    <div class="date">{{ $deposit->created_at->format('M d Y H:i') }}
                                                    </div>

                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if (Str::contains($deposit->comment, ['Deposited', 'Bonus']))
                                                <strong class="green-color">+{{ $deposit->price }}</strong>
                                            @else
                                                <strong>{{ $deposit->price }}</strong>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="site-badge {{ $deposit->status_class }}">
                                                {{ ucfirst($deposit->status) }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No deposits found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    table {
        table-layout: auto;
        width: auto;
        border-collapse: collapse;
        min-width: auto !important;
    }

    td, th {
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
                <h3 class="title">All Withdrawal Log</h3>
            </div>
            <div class="site-card-body">
                <div class="site-table">
                    <div class="table-filter d-none">
                        <div class="filter">
                            <form action="" method="get">
                                <div class="search">
                                    <input type="text" id="search" placeholder="Search" value=""
                                        name="query2">
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
                                @forelse ($withdrawals as $withdrawal)
                                    <tr>
                                        <td
                                            style=" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <div class="table-description">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-down-left" icon-name="arrow-down-left" class="lucide lucide-arrow-down-left" transform="rotate(180, 0, 0)"><path d="M17 7 7 17"></path><path d="M17 17H7V7"></path></svg>
                                                </div>
                                                <div class="description">
                                                    Withdrawn {{ $withdrawal->currency }}<strong> {{ number_format($withdrawal->amount, 2) }} 
                                                      </strong>
                                                    <div class="date">{{ $withdrawal->created_at->format('M d Y H:i') }}
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td><strong class="red-color">-
                                                {{ number_format($withdrawal->amount, 2) }}</strong></td>
                                        <td>
                                            <div class="site-badge {{ $withdrawal->status_class }}">
                                                {{ ucfirst($withdrawal->status) }}</div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No withdrawals found.</td>
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

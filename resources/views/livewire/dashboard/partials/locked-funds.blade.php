<div class="container mt-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">Top-Up Locked Funds</h3>
                </div>
                <div class="site-card-body">
                    <div class="text-center mb-4">
                        <h4>Your Trading Balance:</h4>
                        <p style="font-size: 1.5rem; font-weight: bold;">
                            {{ Auth::user()->getCurrencySymbol() . " " . Auth::user()->displayBalance(Auth::user()->trading_balance) }}
                        </p>
                    </div>

                    <form action="{{ route('locked.funds.store') }}" method="post" id="lockFundsForm">
                        @csrf
                        <div class="row">
                            <!-- Locked Funds Input -->
                            <div class="col-12 mb-3">
                                <label for="locked_funds" class="form-label">Amount to Lock:</label>
                                <div class="input-group">
                                    <input type="number" name="locked_funds" id="locked_funds" class="form-control"
                                        min="1" required="">
                                </div>
                            </div>

                            <!-- Locked Duration Selection -->
                            <div class="col-12 mb-3">
                                <label for="locked_duration" class="form-label">Duration:</label>
                                <select name="locked_duration" id="locked_duration" class="form-control" required>
                                    @for ($i = 4; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }} Months</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Interest Rate Display -->
                            <div class="col-12 mb-3">
                                <label for="interest_rate" class="form-label">Interest Rate:</label>
                                <span id="interest_rate" style="font-size: 1.2rem; font-weight: bold;">10%</span>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="site-btn blue-btn w-100">
                                Lock<i class="anticon anticon-double-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

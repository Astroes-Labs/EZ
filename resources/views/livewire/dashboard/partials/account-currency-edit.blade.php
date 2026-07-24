<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="site-card mb-4">
            <div class="site-card-header">
                <h3 class="title">Account Currency</h3>
            </div>
            <div class="site-card-body">
                <div class="uc-section-label mb-3">Select Display Currency</div>

                <div class="row g-3" id="currencySelector">
                    <div class="col-6 col-md-3">
                        <label class="currency-option {{ Auth::user()->currency === 'USD' ? 'active' : '' }}">
                            <input type="radio" name="currency" value="USD" {{ Auth::user()->currency === 'USD' ? 'checked' : '' }} hidden>
                            <div class="currency-box">
                                <span class="flag">🇺🇸</span>
                                <strong>USD</strong>
                            </div>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="currency-option {{ Auth::user()->currency === 'GBP' ? 'active' : '' }}">
                            <input type="radio" name="currency" value="GBP" {{ Auth::user()->currency === 'GBP' ? 'checked' : '' }} hidden>
                            <div class="currency-box">
                                <span class="flag">🇬🇧</span>
                                <strong>GBP</strong>
                            </div>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="currency-option {{ Auth::user()->currency === 'EUR' ? 'active' : '' }}">
                            <input type="radio" name="currency" value="EUR" {{ Auth::user()->currency === 'EUR' ? 'checked' : '' }} hidden>
                            <div class="currency-box">
                                <span class="flag">🇪🇺</span>
                                <strong>EUR</strong>
                            </div>
                        </label>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="currency-option {{ Auth::user()->currency === 'AUD' ? 'active' : '' }}">
                            <input type="radio" name="currency" value="AUD" {{ Auth::user()->currency === 'AUD' ? 'checked' : '' }} hidden>
                            <div class="currency-box">
                                <span class="flag">🇦🇺</span>
                                <strong>AUD</strong>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
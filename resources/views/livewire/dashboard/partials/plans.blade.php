<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Pricing</h3>
            </div>
            <div class="site-card-body">
                <div class="row">

                    @php
                        $plans = \App\Models\TradingPlan::all()->groupBy('plan_name');
                        $userCurrency = Auth::user()->getCurrencySymbol() ?? '£'; // Fallback if not set
                    @endphp

                    @foreach($plans as $planName => $tiers)
                        @php
                            $minPrice = $tiers->min('min');
                            $firstTier = $tiers->first();
                        @endphp

                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="single-investment-plan">
                                <div class="feature-plan">{{ strtoupper($planName) }}</div>
                                <h3>{{ strtoupper($planName) }}</h3>
                                <p>{{ $userCurrency }}{{ number_format($minPrice) }} minimum</p>
                                
                                <ul>
                                    <li>{{ $firstTier->rating }} <i class="fas fa-star-half-alt"></i>, based on {{ $firstTier->reviews }} reviews</li>
                                    @foreach($tiers as $tier)
                                        <li class="text-muted small">+ {{ $tier->sub_tier_name }} ({{ $userCurrency }}{{ number_format($tier->min) }} - {{ $userCurrency }}{{ number_format($tier->max) }})</li>
                                    @endforeach
                                </ul>

                                <a href="{{ route('deposit') }}" data-price="{{ $minPrice }}" onclick="openCustom(event, this)"
                                    class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                            </div>
                        </div>
                    @endforeach

                    <!-- CUSTOM PLAN (Hardcoded fallback) -->
                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">CUSTOM</div>
                            <h3>CUSTOM</h3>
                            <p>
                                Price: {{ $userCurrency }}<span contenteditable="true" id="customPrice"
                                    class="editable-price editing">10000</span>
                            </p>
                            <ul>
                                <li>Custom plan with flexible investment options</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="10000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
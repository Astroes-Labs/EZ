<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Pricing</h3>
            </div>
            <div class="site-card-body">
                <div class="row">

                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">BASIC</div>
                            <h3>BASIC</h3>
                            <p>£10,000 minimum</p>
                            <ul>
                                <li>5.00 <i class="fas fa-star-half-alt"></i>, based on 29,418 reviews</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="10000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">SILVER</div>
                            <h3>SILVER</h3>
                            <p>£25,000 minimum</p>
                            <ul>
                                <li>4.88 <i class="fas fa-star-half-alt"></i>, based on 11,236 reviews</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="25000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">GOLD</div>
                            <h3>GOLD</h3>
                            <p>£50,000 minimum</p>
                            <ul>
                                <li>4.88 <i class="fas fa-star-half-alt"></i>, based on 996 reviews</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="50000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">DIAMOND</div>
                            <h3>DIAMOND</h3>
                            <p>£200,000 minimum</p>
                            <ul>
                                <li>4.88 <i class="fas fa-star-half-alt"></i>, based on 237 reviews</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="200000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">PLATINUM</div>
                            <h3>PLATINUM</h3>
                            <p>£500,000 minimum</p>
                            <ul>
                                <li>4.88 <i class="fas fa-star-half-alt"></i>, based on 146 reviews</li>
                            </ul>
                            <a href="{{ route('deposit') }}" data-price="500000" onclick="openCustom(event, this)"
                                class="site-btn grad-btn w-100 centered">PURCHASE PLAN</a>
                        </div>
                    </div>


                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="single-investment-plan">
                            <div class="feature-plan">CUSTOM</div>
                            <h3>CUSTOM</h3>
                            <p>
                                Price: <span contenteditable="true" id="customPrice"
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

<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="user-ranking">
            <h4>
                {{ $userClass['class'] }}
            </h4>
            <p>
                <img src="{{ $userClass['icon']  }}" alt=""  style="height: 75px; width: 75px;">
            </p>
            <div class="rank" data-bs-toggle="tooltip" data-bs-placement="top" title="">
                <img src="{{ $userClass['icon']  }}" alt=""  style="height: 48px; width: 48px;">
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
        <div class="site-card">
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
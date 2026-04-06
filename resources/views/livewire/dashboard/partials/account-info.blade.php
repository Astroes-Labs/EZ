<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Account Info</h3>
                <div class="card-header-links">
                    <a href="{{ route('account.info.edit') }}" class="card-header-link"
                        onclick="openCustom(event, this)">Edit Account Info</a>
                </div>
            </div>
            <div class="site-card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="mb-3">
                            <div class="body-title">Avatar:</div>
                            <div class="avatar-container">
                                <img src="{{ Auth::user()->photo_profile ?? '../assets/global/materials/upload.svg' }}"
                                    alt="Avatar" class="avatar-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="details-display">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Full Name:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name ?? '' }}" disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Email Address:</strong></label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email ?? '' }}"
                                    disabled>
                            </div>
                        </div>

                        @if (!empty(Auth::user()->email2))
                            <div class="col-xl-6 col-md-12 mb-3">
                                <div class="form-group">
                                    <label><strong>Second Email Address:</strong></label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email2 }}" disabled>
                                </div>
                            </div>
                        @endif

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Postal Code:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->postcode ?? '' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Street Address:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->address ?? '' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>City:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->city ?? '' }}" disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>State:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->state ?? '' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Country:</strong></label>
                                <input type="text" class="form-control" value="{{ Auth::user()->country ?? '' }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-12 mb-3">
                            <div class="form-group">
                                <label><strong>Joining Date:</strong></label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->created_at->format('D, M j, Y h:i A') ?? '' }}" disabled>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
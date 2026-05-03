<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
       
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Update Account Info</h3>
            </div>
            <div class="site-card-body">
                <form action="{{ route('account.info.update') }}" method="post" id="changeSettingsForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="progress-steps-form">
                        <div class="row">
                            <!-- Street Address -->
                            <div class="col-xl-6 col-md-12">
                                <label for="street_address" class="form-label">Street Address</label>
                                <div class="input-group">
                                    <input type="text" id="street_address" class="form-control" name="address"
                                        value="{{ Auth::user()->address ?? '' }}" placeholder="Street Address">
                                </div>
                            </div>

                            <!-- Postal Code -->
                            <div class="col-xl-6 col-md-12">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <div class="input-group">
                                    <input type="text" id="post_code" class="form-control" name="postcode"
                                        value="{{ Auth::user()->postcode ?? '' }}" placeholder="Postal Code">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-xl-6 col-md-12">
                                <label for="city" class="form-label">City</label>
                                <div class="input-group">
                                    <input type="text" id="city" class="form-control" name="city"
                                        value="{{ Auth::user()->city ?? '' }}" placeholder="City">
                                </div>
                            </div>

                            <!-- State/Province -->
                            <div class="col-xl-6 col-md-12">
                                <label for="state" class="form-label">State/Province</label>
                                <div class="input-group">
                                    <input type="text" id="state" class="form-control" name="state"
                                        value="{{ Auth::user()->state ?? '' }}" placeholder="State/Province">
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="col-xl-6 col-md-12">
                                <label for="country" class="form-label">Country</label>
                                <div class="input-group">
                                    <input type="text" id="country" class="form-control" name="country"
                                        value="{{ Auth::user()->country ?? '' }}" placeholder="Country">
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-xl-6 col-md-12">
                                <label for="mobile_number" class="form-label">Mobile Number</label>
                                <div class="input-group">
                                    <input type="text" id="mobile_number" class="form-control" name="mobile_number"
                                        value="{{ Auth::user()->mobile_number ?? '' }}" placeholder="Mobile Number">
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="col-xl-6 col-md-12">
                                <button type="submit" class="site-btn blue-btn">Save Changes</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
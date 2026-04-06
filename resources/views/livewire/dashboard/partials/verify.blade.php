<div class="site-card-body vh-100">
    @if (Auth::user()->account_verified == 0)
        <form action="{{ route('user.verify.store') }}" method="post" id="verifyIdentityForm" enctype="multipart/form-data">
            @csrf
            <!-- Front View Upload -->
            <div class="mb-3">
                <div class="body-title">Upload Front of Government Issued Identity Document:</div>
                <div class="wrap-custom-file">
                    <input type="file" name="photo_front_view" id="photo_front_view" accept=".gif, .jpg, .png, .jpeg"
                        onchange="imagePreview(this, 'photo-front-preview')">
                    <label for="photo_front_view">
                        <img id="photo-front-preview" class="upload-icon" src="../assets/global/materials/upload.svg"
                            alt="Upload Front">
                        <span>Upload Front</span>
                    </label>
                </div>
            </div>

            <!-- Back View Upload -->
            <div class="mb-3">
                <div class="body-title">Upload Back of Government Issued Identity Document:</div>
                <div class="wrap-custom-file">
                    <input type="file" name="photo_back_view" id="photo_back_view" accept=".gif, .jpg, .png, .jpeg"
                        onchange="imagePreview(this, 'photo-back-preview')">
                    <label for="photo_back_view">
                        <img id="photo-back-preview" class="upload-icon" src="../assets/global/materials/upload.svg"
                            alt="Upload Back">
                        <span>Upload Back</span>
                    </label>
                </div>
            </div>

            <div class="progress-steps-form">
                <button type="submit" class="site-btn blue-btn">Submit for Verification</button>
            </div>
        </form>
    @elseif (Auth::user()->account_verified == 2)
        <div class="transaction-status text-center">
            <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h2 class="text-warning font-weight-bold mt-3">Account Verification Pending</h2>
            <p class="text-warning">Your identity verification is still being processed. Please be patient while we review
                your documents.</p>
          {{--   <a href="{{ route('index') }}" onclick="openCustom(event, this)" class="btn btn-warning mt-3">
                <i class="anticon anticon-home"></i> Go to Dashboard
            </a> --}}
        </div>
    @else
        <div class="transaction-status text-center">
            <div class="icon success mb-3">
                <i class="anticon anticon-check" style="color: green; font-size: 48px;"></i>
            </div>
            <h2 class="text-success font-weight-bold">Account Verified!</h2>
            <p>Congratulations! Your identity has been successfully verified. You now have full access to all features on
                our platform.</p>
            <a href="{{ route('index') }}" onclick="openCustom(event, this)" class="btn btn-primary mt-3">
                <i class="anticon anticon-home"></i> Go to Dashboard
            </a>
        </div>
    @endif
</div>
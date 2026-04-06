<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Update Avatar</h3>
            </div>
            <div class="site-card-body">
                <form action="{{ route('avatar.update') }}" method="post" id="changeAvatarForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="mb-3">
                                <div class="body-title">Avatar:</div>
                                
                                <div class="wrap-custom-file">
                                    <input type="file" name="avatar" id="avatar" accept=".gif, .jpg, .png" onchange="imagePreview(this, 'avatar-preview')" >


                                    <label for="avatar">
                                        <img id="avatar-preview" class="upload-icon" src="{{ Auth::user()->photo_profile ?? '../assets/global/materials/upload.svg' }}" alt="">
                                        <span>Update Avatar</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress-steps-form">
                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <button type="submit" class="site-btn blue-btn">Update Avatar</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Update Account Password</h3>
            </div>
            <div class="site-card-body">
                <div class="progress-steps-form">

                    <div class="text-center mt-5">
                        <span><i class="anticon anticon-lock" style="font-size: 48px;"></i></span>
                    </div>
                    <form action="{{ route('password.store') }}" method="post" id="updatePasswordForm">
                        @csrf
                        <div class="row">
                            <!-- Old Password -->
                            <div class="col-12 mb-3">
                                <label for="old_password" class="form-label">Old Password:</label>
                                <div class="input-group">
                                    <input type="password" name="old_password" class="form-control" id="old_password" required="">
                                </div>
                            </div>
                    
                            <!-- Token Generation -->
                            <div class="col-12 mb-3" id="generateTokenWrapper" style="display: none;">
                                <button type="button" id="generateTokenBtn2" class="site-btn blue-btn w-100">
                                    Generate Token
                                </button>
                            </div>
                    
                            <!-- Enter Token -->
                            <div class="col-12 mb-3">
                                <label for="token" class="form-label">Token:</label>
                                <div class="input-group">
                                    <input type="text" name="token" class="form-control" id="token" required="">
                                </div>
                            </div>
                    
                            <!-- New Password -->
                            <div class="col-12 mb-3">
                                <label for="new_password" class="form-label">New Password:</label>
                                <div class="input-group">
                                    <input type="password" name="new_password" class="form-control" id="new_password" required="">
                                </div>
                            </div>
                    
                            <!-- Confirm New Password -->
                            <div class="col-12 mb-3">
                                <label for="confirm_password" class="form-label">Confirm New Password:</label>
                                <div class="input-group">
                                    <input type="password" name="new_password_confirmation" class="form-control" id="confirm_password" required="">
                                </div>
                            </div>
                        </div>
                    
                        <div class="buttons">
                            <button type="submit" class="site-btn blue-btn w-100">
                                Update Password<i class="anticon anticon-double-right"></i>
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
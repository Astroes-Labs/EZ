<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Update Account Email</h3>
            </div>
            <div class="site-card-body">
                <div class="progress-steps-form">

                    <div class="text-center mt-5">
                        <span><i class="anticon anticon-mail" style="font-size: 48px;"></i></span>
                    </div>
                    <form action="{{ route('email.store') }}" method="post" enctype="multipart/form-data"
                        id="updateEmailForm">
                        @csrf
                        <div class="row">
                            <!-- Old Email -->
                            <div class="col-12 mb-3">
                                <label for="old_email" class="form-label">Old Email:</label>
                                <div class="input-group">
                                    <input type="email" name="old_email" class="form-control" id="old_email"
                                        required="">
                                </div>
                            </div>

                            <!-- Token Generation -->
                            <div class="col-12 mb-3" id="generateTokenWrapper" style="display: none;">
                                <button type="button" id="generateTokenBtn" class="site-btn blue-btn w-100">
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

                            <!-- New Email -->
                            <div class="col-12 mb-3">
                                <label for="new_email" class="form-label">New Email:</label>
                                <div class="input-group">
                                    <input type="email" name="new_email" class="form-control" id="new_email"
                                        required="">
                                </div>
                            </div>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="site-btn blue-btn w-100">
                                Update Email<i class="anticon anticon-double-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3>{{ $notification->title }}</h3>
                <a href="{{ route('notifications.index') }}"  onclick="openCustom(event, this);" class="site-btn-sm red-btn">Back to Notifications</a>
            </div>
            <div class="site-card-body">
                <p>{{ $notification->message }}</p>
                <div class="time">
                    Sent {{ $notification->created_at->format('F j, Y, g:i a') }}
                </div>
            </div>
        </div>
    </div>
</div>
@forelse ($notifications as $notification)
<div class="single-noti">
    <a href="{{ route('notifications.show', $notification->id) }}"
        onclick="openCustom(event, this); loadNotifications();updateUnreadCount();"  class="{{ ($notification->read == 1) ? "read" : "" }}">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="22" y2="22"></line>
                <line x1="6" x2="6" y1="18" y2="11"></line>
                <line x1="10" x2="10" y1="18" y2="11"></line>
                <line x1="14" x2="14" y1="18" y2="11"></line>
                <line x1="18" x2="18" y1="18" y2="11"></line>
                <polygon points="12 2 20 7 4 7"></polygon>
            </svg>
        </div>
        <div class="content">
            <div class="main-cont">
                <span>{{ $notification->title ?? 'Notification' }}</span>
                {{ \Illuminate\Support\Str::limit($notification->message, 20, '...')?? 'You have a new notification.' }}
            </div>
            <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
        </div>
    </a>
</div>
@empty
<p class="text-center my-3">No notifications found</p>
@endforelse
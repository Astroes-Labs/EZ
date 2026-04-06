<div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3>All Notifications</h3>
                <button onclick="markAllAsRead()" class="site-btn-sm red-btn">Mark All as Read</button>
            </div>
            <div class="site-card-body {{ count($notifications) <= 0 ? "vh-100" : ""   }}">
                <div class="notification-list">
                    @forelse ($notifications as $notification)
                        <div class="single-list {{ $notification->read ? 'read' : '' }}">
                            <div class="cont">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" data-lucide="landmark" icon-name="landmark"
                                        class="lucide lucide-landmark">
                                        <line x1="3" x2="21" y1="22" y2="22"></line>
                                        <line x1="6" x2="6" y1="18" y2="11"></line>
                                        <line x1="10" x2="10" y1="18" y2="11"></line>
                                        <line x1="14" x2="14" y1="18" y2="11"></line>
                                        <line x1="18" x2="18" y1="18" y2="11"></line>
                                        <polygon points="12 2 20 7 4 7"></polygon>
                                    </svg>
                                </div>
                                <div class="contents">
                                    <a href="{{ route('notifications.show', $notification->id) }}"
                                        onclick="openCustom(event, this); loadNotifications();updateUnreadCount();">
                                        {{ $notification->title }}
                                    </a>
                                    <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center my-3">No Notifications found</p>
                    @endforelse

                </div>
                <div class="site-pagination">
                    {{ $notifications->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $notifications = $notifications ?? collect();
@endphp

<div class="single-nav-right user-notifications">
  <button type="button" class="item notification-dot" data-bs-toggle="dropdown" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
          <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
          <path d="M4 2C2.8 3.7 2 5.7 2 8"></path>
          <path d="M22 8c0-2.3-.8-4.3-2-6"></path>
      </svg>
      <div class="number" id="outer-unread-count">{{ Auth::user()->unreadNotifications->count() }}</div>
  </button>
  <div class="dropdown-menu dropdown-menu-end notification-pop" data-bs-auto-close="outside">
      <div class="noti-head">Notifications <span id="outer-unread-count">{{ Auth::user()->unreadNotifications->count() }}</span></div>
      <div class="all-noti">
         @include('livewire.dashboard.partials.notice-drop-down-list')
      </div>
      <div class="noti-footer mt-3">
          <a class="noti-btn-1 me-1 w-100" href="javascript:void(0);" onclick="markAllAsRead()">Mark All as Read</a>
          <a class="noti-btn-2 ms-1 w-100" href="{{ route('notifications.index') }}" onclick="openCustom(event, this)">See all Notifications</a>
      </div>
  </div>
</div>

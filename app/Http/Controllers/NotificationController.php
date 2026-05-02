<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Dropdown notifications
    public function getDropdownNotifications()
    {
        $notifications = Notification::forUser()
            ->orderBy('read', 'asc')
            ->latest()
            ->limit(10)
            ->get();

        return view(
            'livewire.dashboard.partials.notice-drop-down-list',
            ['notifications' => $notifications]
        )->render();
    }

    // Mark all as read
    public function markAllAsRead()
    {
        Notification::forUser()->update([
            'read' => true,
            'read_at' => now(),
        ]);

        return response()->json(['message' => 'All notifications marked as read']);
    }

    // Mark one as read
    public function markAsRead($id)
    {
        $notification = Notification::forUser()->findOrFail($id);

        if (!$notification->read) {
            $notification->update([
                'read' => true,
                'read_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Notification marked as read']);
    }

    // All notifications page
    public function index()
    {
        $notifications = Notification::forUser()
            ->orderBy('read', 'asc')
            ->latest()
            ->paginate(7);

        return $this->renderDashboard(
            'livewire.dashboard.partials.notifications-index',
            compact('notifications')
        );
    }

    // Single notification
    public function show($id)
    {
        $notification = Notification::forUser()->findOrFail($id);

        if (!$notification->read) {
            $notification->update([
                'read' => true,
                'read_at' => now(),
            ]);
        }

       return $this->renderDashboard(
            'livewire.dashboard.partials.notifications-show',
            compact('notification')
        );
    }

    // Create notification
    public static function addNotification($userId, $title, $message)
    {
        Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'read' => false,
        ]);
    }

    // ✅ FIXED unread count
    public function getUnreadCount()
    {
        $count = Notification::forUser()->unread()->count();

        return response()->json(['unreadCount' => $count]);
    }
}
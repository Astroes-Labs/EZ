<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Get notifications for dropdown

    public function getDropdownNotifications()
    {

        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('read', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        if ($notifications->isEmpty()) {
            //return view('layout.dashboard.notice-drop-down', ['notifications' => collect()]);
            return view('livewire.dashboard.partials.notice-drop-down-list', ['notifications' => collect()]);
        }

        //return view('layout.dashboard.notice-drop-down', compact('notifications'))->render();
        return view('livewire.dashboard.partials.notice-drop-down-list', compact('notifications'))->render();
    }





    // Mark all as read
    public function markAllAsRead()
    {
        Notification::where('user_id', auth()->id())->update([
            'read' => true,
            'read_at' => now(),
        ]);

        return response()->json(['message' => 'All notifications marked as read']);
    }

    // Mark single notification as read
    public function markAsRead($id)
    {
        $notification = Notification::where('user_id', auth()->id())->findOrFail($id);
        $notification->update(['read' => true, 'read_at' => now()]);

        return response()->json(['message' => 'Notification marked as read']);
    }

    // Show all notifications
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('read', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(7); // Adjust items per page as needed

        return view('livewire.dashboard.partials.notifications-index', compact('notifications'));
    }

    // Show single notification
    public function show($id)
    {
        $notification = Notification::where('user_id', auth()->id())->findOrFail($id);

        if (!$notification->read) {
            $notification->update(['read' => true, 'read_at' => now()]);
        }

        return view('livewire.dashboard.partials.notifications-show', compact('notification'));
    }



    // Add a new notification (used outside this controller)
    public static function addNotification($userId, $title, $message)
    {
        Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
        ]);
    }

    public function getUnreadCount()
    {
        $unreadCount = auth()->user()->unreadNotifications()->count();

        return response()->json(['unreadCount' => $unreadCount]);
    }
}

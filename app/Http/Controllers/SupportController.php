<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function index()
    {
        $tickets = SupportTicket::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return $this->renderDashboard('livewire.dashboard.partials.support-tickets', [
            'tickets' => $tickets
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket = SupportTicket::create([
            'user_id' => Auth::id(),
            'subject' => $validated['subject'],
            'priority' => $validated['priority'],
            'status' => 'open',
        ]);

        // First message
        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $validated['message'],
            'is_admin' => false,
        ]);

        return response()->json([
            'message' => 'Ticket created successfully!',
            'ticket_id' => $ticket->id
        ]);
    }

    public function show(SupportTicket $ticket)
    {
        // Security check
        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        $messages = $ticket->messages()->latest()->get();

        return response()->json([
            'ticket' => $ticket,
            'messages' => $messages
        ]);
    }

    public function sendMessage(Request $request, SupportTicket $ticket)
    {
        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'message' => 'required|string|min:1'
        ]);

        $message = TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $validated['message'],
            'is_admin' => false,
        ]);

        return response()->json($message);
    }
}
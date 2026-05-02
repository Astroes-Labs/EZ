<div class="row g-0" style="height: calc(100vh - 130px);">

    <!-- LEFT SIDEBAR - Tickets List -->
    <div class="col-lg-4 col-12 px-0 border-end" style="background: var(--bg-layer1);">
        <div class="site-card h-100 border-0 rounded-0 d-flex flex-column">
            
            <div class="site-card-header border-bottom d-flex align-items-center px-4 py-3">
                <h4 class="mb-0">Support Tickets</h4>
                <button onclick="newTicket()" 
                        class="ms-auto btn btn-sm"
                        style="background: var(--accent); color: var(--bg-deep); font-weight: 700;">
                    <i class="anticon anticon-plus"></i> New Ticket
                </button>
            </div>

            <div class="site-card-body p-0 flex-grow-1 overflow-auto" id="tickets-list">
                <div class="uc-list" style="border:none;">
                    @forelse ($tickets as $ticket)
                        <div class="uc-list-item ticket-item" onclick="openTicket({{ $ticket->id }})" 
                             style="cursor:pointer;" id="ticket-row-{{ $ticket->id }}">
                            <div class="uc-item-icon">
                                <i class="anticon anticon-question-circle"></i>
                            </div>
                            <div class="uc-item-body">
                                <div class="uc-item-title">{{ $ticket->subject }}</div>
                                <div class="uc-item-sub">
                                    {{ $ticket->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <span class="badge 
                                @if($ticket->status == 'open') bg-warning text-dark
                                @elseif($ticket->status == 'in_progress') bg-info
                                @elseif($ticket->status == 'resolved') bg-success
                                @else bg-secondary @endif">
                                {{ ucfirst($ticket->status) }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center text-muted py-5">
                            No tickets yet.<br>
                            Click "New Ticket" to create one.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT: Chat Window -->
    <div class="col-lg-8 col-12 px-0 h-100" id="chat-area">
        <div class="site-card h-100 border-0 rounded-0 d-flex flex-column">
            
            <!-- Chat Header -->
            <div class="site-card-header border-bottom px-4 py-3 d-flex align-items-center" id="chat-header">
                <h5 class="mb-0 flex-grow-1" id="current-ticket-subject">Select a ticket to begin chatting</h5>
                <span class="badge" id="current-ticket-status" style="display:none;"></span>
            </div>

            <!-- Messages -->
            <div class="site-card-body flex-grow-1 overflow-auto p-4" style="background: var(--bg-deep);" id="messages-container">
                <div id="chat-placeholder" class="text-center text-muted py-5">
                    <i class="anticon anticon-message" style="font-size: 70px; opacity: 0.15;"></i>
                    <h5 class="mt-4">No conversation selected</h5>
                    <p>Create a new ticket or select one from the list</p>
                </div>

                <div id="chat-messages" style="display: none; flex-direction: column; gap: 14px;"></div>
            </div>

            <!-- Message Input -->
            <div class="p-3 border-top bg-layer2" id="message-input-area" style="display: none;">
                <div class="input-group">
                    <input type="text" id="message-input" class="form-control" 
                           placeholder="Type your message here..." autocomplete="off">
                    <button onclick="sendMessage()" class="btn" style="background:var(--accent); color:var(--bg-deep);">
                        <i class="anticon anticon-send"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
.message {
    max-width: 80%;
    padding: 12px 16px;
    border-radius: var(--radius-md);
    margin-bottom: 8px;
}

.message.user {
    align-self: flex-end;
    background: var(--accent);
    color: var(--bg-deep);
}

.message.support {
    align-self: flex-start;
    background: var(--bg-layer3);
}

.ticket-item {
    transition: all 0.2s;
}

.ticket-item:hover {
    background: var(--accent-dim) !important;
}
</style>
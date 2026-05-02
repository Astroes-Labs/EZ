<div class="row g-0" style="height: calc(100vh - 130px);">

    <!-- LEFT: Tickets List -->
    <div class="col-lg-4 col-12 px-0 border-end border-1" style="background: var(--bg-layer1);">
        <div class="site-card h-100 border-0 rounded-0 d-flex flex-column">
            
            <div class="site-card-header border-bottom">
                <h3 class="title px-4 py-3 mb-0">Support Tickets</h3>
                <button onclick="showNewTicketForm()" 
                        class="btn btn-sm mx-3 mb-2" 
                        style="background: var(--accent); color: var(--bg-deep); font-weight: 700;">
                    <i class="anticon anticon-plus"></i> New Ticket
                </button>
            </div>

            <div class="site-card-body p-0 flex-grow-1 overflow-auto" id="tickets-list">
                <!-- Tickets will be loaded here via JS or Livewire -->
                <div class="uc-list" style="border: none;">
                    <!-- Example Ticket -->
                    <div class="uc-list-item" onclick="openTicket(1)">
                        <div class="uc-item-icon">
                            <i class="anticon anticon-question-circle" style="font-size: 20px;"></i>
                        </div>
                        <div class="uc-item-body">
                            <div class="uc-item-title">Withdrawal not credited</div>
                            <div class="uc-item-sub text-muted">3 hours ago • Open</div>
                        </div>
                        <span class="badge bg-warning text-dark">Open</span>
                    </div>

                    <!-- More tickets will go here -->
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT: Chat Area -->
    <div class="col-lg-8 col-12 px-0 h-100" id="chat-area">
        <div class="site-card h-100 border-0 rounded-0 d-flex flex-column">

            <!-- Chat Header -->
            <div class="site-card-header border-bottom d-flex align-items-center px-4 py-3" id="chat-header">
                <h4 class="mb-0" id="ticket-subject">Select a ticket to start chatting</h4>
                <span class="ms-auto badge bg-success" id="ticket-status" style="display:none;">Open</span>
            </div>

            <!-- Messages Area -->
            <div class="site-card-body flex-grow-1 overflow-auto p-4" id="messages-container" style="background: var(--bg-deep);">
                <div id="chat-placeholder" class="text-center text-muted py-5">
                    <i class="anticon anticon-message" style="font-size: 60px; opacity: 0.2;"></i>
                    <h5 class="mt-4">No conversation selected</h5>
                    <p class="mb-0">Create a new ticket or select an existing one</p>
                </div>

                <!-- Real chat messages will appear here -->
                <div id="chat-messages" style="display: none;"></div>
            </div>

            <!-- Message Input -->
            <div class="p-3 border-top" id="message-input-area" style="display: none;">
                <div class="input-group">
                    <input type="text" id="message-input" class="form-control" 
                           placeholder="Type your message..." autocomplete="off">
                    <button onclick="sendMessage()" class="btn" style="background: var(--accent); color: var(--bg-deep);">
                        <i class="anticon anticon-send"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
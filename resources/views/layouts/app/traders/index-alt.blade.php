<div class="row">
    <div class="col-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Copy Traders</h3>
            </div>
            <div class="site-card-body">
                <div class="trader-list">
                    <h4 class="mb-3">Copied Traders</h4>
                    @forelse ($traders->whereIn('id', $copiedTraders) as $trader)
                        <div class="trader-pill d-flex align-items-center justify-content-between border rounded-pill p-3 mb-2">
                            <div class="trader-info d-flex align-items-center">
                                <img src="uploads/traders/{{ $trader->photo }}" alt="{{ $trader->name }}" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                <div>
                                    <h5 class="mb-0">{{ $trader->name }}</h5>
                                    <small>Win Rate: {{ $trader->win_rate }} | Profit: {{ $trader->profit }}</small>
                                </div>
                            </div>
                            <button class="btn btn-danger cancel-copy" data-id="{{ $trader->id }}">Cancel Copy</button>
                        </div>
                    @empty
                        <p class="text-muted">No traders copied yet.</p>
                    @endforelse

                    <h4 class="mt-4 mb-3">Available Traders</h4>
                    @forelse ($traders->whereNotIn('id', $copiedTraders) as $trader)
                        <div class="trader-pill d-flex align-items-center justify-content-between border rounded-pill p-3 mb-2">
                            <div class="trader-info d-flex align-items-center">
                                <img src="uploads/traders/{{ $trader->photo }}" alt="{{ $trader->name }}" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                                <div>
                                    <h5 class="mb-0">{{ $trader->name }}</h5>
                                    <small>Win Rate: {{ $trader->win_rate }} | Profit: {{ $trader->profit }}</small>
                                </div>
                            </div>
                            <button class="btn btn-success add-copy" data-id="{{ $trader->id }}">Copy</button>
                        </div>
                    @empty
                        <p class="text-muted">No traders available to copy.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.add-copy').forEach(button => {
        button.addEventListener('click', function () {
            const traderId = this.getAttribute('data-id');
            fetch(`/traders/${traderId}/copy`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => location.reload());
        });
    });

    document.querySelectorAll('.cancel-copy').forEach(button => {
        button.addEventListener('click', function () {
            const traderId = this.getAttribute('data-id');
            fetch(`/traders/${traderId}/cancel`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
              .then(data => location.reload());
        });
    });
</script>

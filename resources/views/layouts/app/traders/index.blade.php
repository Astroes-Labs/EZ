{{-- <div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Copy Traders</h3>
            </div>
            <div class="site-card-body">
                <div class="row">
                    @foreach ($traders as $trader)
                    <div class="col-xl-4 col-md-6 mb-3">
                        <div class="trader-card">
                            <img src="{{ $trader->photo }}" alt="{{ $trader->name }}" class="trader-photo">
                            <h4>{{ $trader->name }}</h4>
                            <p>Win Rate: {{ $trader->win_rate }}</p>
                            <p>Profit: {{ $trader->profit }}</p>
                            <p>Description: {{ $trader->description }}</p>
                            <div class="trader-actions">
                                @if (in_array($trader->id, $copiedTraders))
                                <button class="btn btn-danger cancel-copy" data-id="{{ $trader->id }}">×</button>
                                @else
                                <button class="btn btn-success add-copy" data-id="{{ $trader->id }}">+</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
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

<style>
    .trader-card {
        text-align: center;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #f9f9f9;
    }

    .trader-card .trader-photo {
        max-width: 100px;
        margin-bottom: 10px;
    }

    .trader-actions button {
        margin: 5px;
    }
</style> --}}

<div class="row">
    <div class="col-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">Copy Traders</h3>
            </div>
            <div class="site-card-body">
                <h4 class="mb-3">Copying...</h4>
                <div class="row">
                    @foreach ($traders as $trader)
                        @if (in_array($trader->id, $copiedTraders))
                            <div class="col-12 mb-3">
                                <div
                                    class="p-3 border rounded-pill d-flex align-items-center justify-content-between bg-success text-white">
                                    <div>
                                        <img src="uploads/traders/{{ $trader->photo }}" alt="{{ $trader->name }}"
                                            class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                        <span class="fw-bold">{{ $trader->name }}</span>
                                        <span class="ms-2">({{ $trader->win_rate }}% Win Rate)</span>
                                    </div>
                                    <button class="btn btn-danger btn-sm cancel-copy border-rounded" data-id="{{ $trader->id }}">
                                        <i class="anticon anticon-close"></i>
                                    </button>

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <h4 class="my-4">Available Traders</h4>
                <div class="row">
                    @foreach ($traders as $trader)
                  
                        @if (!in_array($trader->id, $copiedTraders))
                            <div class="col-12 mb-3">
                                <div class="p-3 border rounded-pill d-flex align-items-center justify-content-between">
                                    <div>
                                        <img src="uploads/traders/{{ $trader->photo }}" alt="{{ $trader->name }}"
                                            class="rounded-circle me-3" style="width: 40px; height: 40px;">
                                        <span class="fw-bold">{{ $trader->name }}</span>
                                        <span class="ms-2">({{ $trader->win_rate }}% Win Rate)</span>
                                    </div>
                                    <button class="btn btn-success btn-sm add-copy" data-id="{{ $trader->id }}"><i
                                            class="anticon anticon-plus"></i></button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

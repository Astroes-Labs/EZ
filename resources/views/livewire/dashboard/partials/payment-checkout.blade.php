

<div class="transaction-status centered">
    <div class="icon success">
        <i class="anticon anticon-check"></i>
    </div>
    <h2>{{ $header }}</h2>
    <p>{{ $message }}</p>
    <a href="{{ $url }}" class="site-btn"  onclick="openCustom(event, this)">
        <i class="anticon anticon-plus"></i>{{ $buttonText }}
    </a>
</div>

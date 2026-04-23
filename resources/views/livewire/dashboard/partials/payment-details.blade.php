<!-- resources/views/partials/payment-details.blade.php -->
<div class="col-xl-12 col-md-12">
    <div class="frontend-editor-data">

        @php
            $label = $gatewayCode === 'USDT'
                ? $gatewayCode . ' (BEP-20 )'
                : $gatewayCode;
        @endphp

        <p>Kindly send only {{ $label }} to this deposit address. Sending any other coin or token to this address may
            result in loss of your crypto.</p>
        <p>ADDRESS: <span style="font-weight:bolder;">{{ $addr }}</span></p>
        <p>Please scan Barcode for wallet payment confirmation below:</p>
        @if($warning !== "")

            <small><b>{{$warning}}</b></small>
        @endif
        <p><img src="{{ $imgUrl }}" alt="QR CODE" style="width:370px;"></p>
    </div>
</div>

{{-- <div class="col-xl-12 col-md-12">
    <div class="body-title">Proof of Payment</div>
    <div class="wrap-custom-file">
        <input type="file" name="paymentProof" id="1" accept=".gif, .jpg, .png" required="">
        <label for="1">
            <img class="upload-icon" src="../assets/global/materials/upload.svg" alt="">
            <span>Select Proof of Payment</span>
        </label>
    </div>
</div> --}}
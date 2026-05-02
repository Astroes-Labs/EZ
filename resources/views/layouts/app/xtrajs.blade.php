<script>

    // Hide/Show Back Button based on current URL
    function updateBackButtonVisibility() {
        const backContainer = document.getElementById('back-button-container');
        if (!backContainer) return;

        const currentPath = window.location.pathname;

        // Hide on main dashboard pages
        if (currentPath === '/' ||
            currentPath === '/dashboard' ||
            currentPath.endsWith('/index') ||
            currentPath === '/dashboard/showIndex') {

            backContainer.style.display = 'none';
        } else {
            backContainer.style.display = 'block';
        }
    }

    // Run after every AJAX navigation
    $(document).on('ajaxComplete', function () {
        updateBackButtonVisibility();
    });

    // Also run on initial load and browser back/forward
    $(document).ready(function () {
        updateBackButtonVisibility();
    });

    // Optional: Listen to popstate (browser back button)
    window.addEventListener('popstate', function () {
        setTimeout(updateBackButtonVisibility, 100);
    });

    (function ($) {
        'use strict';
        let pusherAppKey = "";
        let pusherAppCluster = "mt1";
        let soundUrl = "../notification-tune";
        var notification = new Pusher(pusherAppKey, { encrypted: true, cluster: pusherAppCluster });
        var channel = notification.subscribe('user-notification109');
        channel.bind('notification-event', function (result) {
            playSound(); latestNotification(); notifyToast(result);
        });
        function latestNotification() {
            $.get('../user/latest-notification', function (data) { $('.user-notifications109').html(data); })
        }
        function notifyToast(data) {
            new Notify({
                status: 'info', title: data.data.title, text: data.data.notice,
                effect: 'slide', speed: 300, customClass: '',
                customIcon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-megaphone"><path d="m3 11 18-5v12L3 14v-3z"></path><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path></svg>',
                showIcon: true, showCloseButton: true, autoclose: true, autotimeout: 9000,
                gap: 20, distance: 20, type: 1, position: 'right bottom',
                customWrapper: '<div><a href="' + data.data.action_url + '" class="learn-more-link">Explore<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="external-link" class="lucide lucide-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" x2="21" y1="14" y2="3"></line></svg></a></div>',
            })
        }
        function playSound() {
            $.get(soundUrl, function (data) { var audio = new Audio(data); audio.play(); audio.muted = false; });
        }
    })(jQuery);
</script>
<script>
    (function ($) {
        'use strict';
        $.scrollUp({ scrollText: '<i class="fas fa-caret-up"></i>', easingType: 'linear', scrollSpeed: 500, animation: 'fade' });
    })(jQuery);
</script>

<script type="text/javascript" src="../assets/vendor/mckenziearts/laravel-notify/js/notify.js"></script>
<script>
    function copyRef() {
        var textToCopy = $('#refLink').val();
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(textToCopy).select();
        document.execCommand('copy');
        tempInput.remove();
        $('#copy').text('Copied');
        var copyApi = document.getElementById("refLink");
        copyApi.select();
        copyApi.setSelectionRange(0, 999999999);
        document.execCommand('copy');
        $('#copy').text('Copied')
    }

    $(document).on('click', '.moreless-button', function () {
        $('.moretext').slideToggle();
        if ($(this).text() == "Load more") { $(this).text("Load less"); } else { $(this).text("Load more"); }
    });

    $(document).on('click', '.moreless-button-2', function () {
        $('.moretext-2').slideToggle();
        if ($(this).text() == "Load more") { $(this).text("Load less"); } else { $(this).text("Load more"); }
    });
</script>
<script>
    $(document).on('click', '#theme-toggle', function () {
        $.ajax({ url: "{{ route('theme.toggle') }}", type: "GET", success: function (response) { if (response.success) { $('body').toggleClass('dark-theme'); } } });
    });
    function validateDouble(value) {
        const regex = /^\d*\.?\d*$/;
        if (regex.test(value)) { return value; }
        return value.replace(/[^0-9.]/g, '').replace(/(\..*?)\./g, '$1');
    }
</script>
<script>
    $(document).ready(function () {
        let $target = $("#target");
        let text = $target.text();
        let index = 0;
        $target.text('');
        $target.show();
        function typeWord() {
            if (index < text.length) { $target.append(text[index]); index++; setTimeout(typeWord, 100); }
        }
        typeWord();
    });
</script>

<script>
    function showSpinner() { $('#spinner-overlay').fadeIn(); console.log("show spinner"); }
    function hideSpinner() { $('#spinner-overlay').fadeOut(); }
    $(document).ready(function () { hideSpinner(); });
</script>
{{-- CustomRouter --}}
{{--
<script>
    function openCustom(event, element) {
        event.preventDefault();
        const url = element.getAttribute('href');
        const price = element.getAttribute('data-price') || null;
        console.log('Fetching content from:', url);
        $.ajax({
            url: url, method: 'GET',
            beforeSend: function () { showSpinner(); },
            success: function (response) { $('#dynamic-content').html(response).promise().done(function () { hideSpinner(); }); },
            error: function (xhr, status, error) { console.error('Error fetching content from URL:', error); hideSpinner(); }
        });
    }

    $(document).ready(function () {
        $(document).on('keyup', '#customPrice', function () {
            const newPrice = $(this).text().trim();
            $(this).closest('.single-investment-plan').find('a').attr('data-price', newPrice);
            console.log('Updated price:', newPrice);
        });
    });
</script> --}}

<script>
    var globalData;
    var currency = "{{ Auth::user()->currency }}";
    $(document).ready(function () {
        $(document).on('keyup', '#amount', function (e) {
            "use strict";
            var amount = $(this).val();
            var coin = $("#gatewaySelect").val();
            if (coin !== '') { fetchAndDisplayCoinValue(coin, amount); }
            var formattedAmount = Number(amount).toLocaleString();
            $('.amount').text(formattedAmount);
            $('.currency').text(currency);
            var charge = 0;
            $('.charge2').text(charge.toLocaleString() + ' ' + currency);
            var total = Number(amount) + Number(charge);
            $('.total').text(total.toLocaleString() + ' ' + currency);
        });
    });

    $('body').on('change', '#gatewaySelect', function (e) {
        e.preventDefault(); "use strict";
        var coin = $("#gatewaySelect").val();
        $('.paymentCurrency').text(" " + coin);
        var amount = $('#amount').val();
        fetchAndDisplayCoinValue(coin, amount);
        fetchPaymentDetails(coin);
    });

    function fetchPaymentDetails1(gatewaySelect) {
        $.ajax({
            url: '/payment-details', type: 'POST', data: { gatewayCode: gatewaySelect },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (data) {
                if (data.credentials !== undefined) {
                    $('.manual-row').html(data.credentials);
                    $('#logo img.payment-method').attr('src', data.icon);
                    imagePreview();
                }
            },
            error: function (xhr, status, error) { console.error('Error:', error); }
        });
    }


    function fetchPaymentDetails(gatewayCode) {
        $.ajax({
            url: '{{ route('deposit.fetchPaymentDetails') }}', type: 'GET', data: { gatewayCode: gatewayCode },
            success: function (data) {
                if (data.credentials !== undefined) {
                    $('.manual-row').html(data.credentials);
                    var imageUrl = data.icon;
                    $('#logo img.payment-method').attr('src', imageUrl);
                    imagePreview();
                }
            },
            error: function (xhr, status, error) { console.log('Error: ' + error); hideSpinner(); }
        });
    }

    function fetchAndDisplayCoinValue(coin, amount) {
        if (coin && amount > 0) {
            showSpinner();
            $.ajax({
                url: '/coinvalue/' + coin + '/1', type: 'GET', dataType: 'json',
                success: function (coinData) {
                    var coinValue = amount / coinData;
                    var formattedValue = coinValue.toFixed(4);
                    if (Number(formattedValue) <= 0) { formattedValue = coinValue.toFixed(6); }
                    $('.paymentAmount').text(formattedValue);
                    $('#coin_price').val(formattedValue);
                    hideSpinner();
                },
                error: function (xhr, status, error) { console.error('Error fetching coin value:', error); hideSpinner(); }
            });
        }
    }

    function imagePreview(input, previewId) {
        "use strict";
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var $imgElement = $('#' + previewId);
                $imgElement.attr('src', e.target.result);
                var containerHeight = $imgElement.parent().height();
                $imgElement.css({ width: containerHeight + "px", height: containerHeight + "px", objectFit: 'cover' });
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function imagePreviewAdd(title) {
        "use strict";
        var base_url = window.location.origin;
        var previewImage = $("#image-old");
        previewImage.css({ 'background-image': 'url(' + base_url + '/assets/' + title + ')' });
        previewImage.addClass("file-ok");
    }

    $(document).on('submit', '#depositForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var selectedValue = $('#gatewaySelect').val();
        if (selectedValue !== '' && selectedValue !== null) {
            var amount = $('#amount').val();
            if (amount > 0 || amount > 10) {
                var coinPrice = $('#coin_price').val();
                var dataToSend = { crypto_currency: selectedValue, user_id: {{ Auth::id() }}, price: amount, price_in_crypto: coinPrice, status: 'Pending', timestamp: new Date().toISOString() };
                $.ajax({
                    url: $('#depositForm').attr('action'), type: 'POST', data: dataToSend,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    beforeSend: function () { showSpinner(); },
                    success: function (result) {
                        if (result.message === 'success') {
                            $('#depositForm')[0].reset();
                            $(".progress-steps-form").html(result.checkout);
                            var currentElement = $('.single-step.current');
                            var nextElement = currentElement.next('.single-step');
                            if (currentElement.length === 1 && nextElement.length === 1) {
                                currentElement.removeClass('current'); nextElement.addClass('current');
                                loadNotifications(); updateUnreadCount(); hideSpinner();
                            }
                        }
                        if (result.message === 'error') { toastr.error(result.error, '', { onHidden: function () { hideSpinner(); } }); }
                    },
                    error: function (xhr, status, error) { console.log('Error: ' + error); }
                });
            } else { toastr.error('Please Input a Valid Amount'); }
        } else { toastr.error('Please Select a Payment Method.'); }
    });

    $(document).on('submit', '#withdrawForm', function (e) {
        showSpinner(); e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            url: '{{ route("withdraw.store") }}', method: 'POST', data: formData, processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (response) {
                toastr.success(response.message, 'Success');
                $('#withdrawForm')[0].reset(); $(".progress-steps-form").html(response.checkout);
                var currentElement = $('.single-step.current');
                var nextElement = currentElement.next('.single-step');
                if (currentElement.length === 1 && nextElement.length === 1) { currentElement.removeClass('current'); nextElement.addClass('current'); }
            },
            error: function (xhr) {
                if (xhr.responseJSON && xhr.responseJSON.message) { toastr.error(xhr.responseJSON.message, 'Error'); }
                else { toastr.error('An unexpected error occurred.', 'Error'); }
            }
        });
        hideSpinner();
    });

    $(document).ready(function () {
        $('#depositForm1').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var selectedValue = $('#gatewaySelect').val();
            if (selectedValue !== '' & selectedValue !== null) {
                var amount = $('#amount').val()
                if (amount >= globalData.minimum_deposit) { submitForm(formData, '#depositForm1'); }
                else { toastr.error('The Minimum Amount is ' + globalData.minimum_deposit + " " + currency); }
            } else { toastr.error('Please Select a Payment Method.'); }
        });
    });

    function submitForm(formData, formId) {
        $.ajax({
            url: endpoint, type: "POST", data: formData, processData: false, contentType: false,
            success: function (result) {
                if (result.message === 'success') {
                    $(formId)[0].reset();
                    $(".progress-steps-form").html(result.checkout);
                    var currentElement = $('.single-step.current');
                    var nextElement = currentElement.next('.single-step');
                    if (currentElement.length === 1 && nextElement.length === 1) { currentElement.removeClass('current'); nextElement.addClass('current'); }
                }
                if (result.message === 'error') { toastr.error(result.error); }
            },
            error: function (xhr, status, error) { console.log('Error: ' + error); }
        });
    }

    $(document).on('submit', '#changeSettingsForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'), type: 'POST', data: formData, processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                if (result.message === 'success') { toastr.success('Account Info updated successfully!'); triggerHiddenAnchor('{{ route("account.info") }}', '100'); }
                else if (result.message === 'error') { toastr.error(result.error); }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
                if (xhr.responseJSON && xhr.responseJSON.errors) { var errors = xhr.responseJSON.errors; for (var key in errors) { toastr.error(errors[key][0]); } }
            }
        });
    });

    function triggerHiddenAnchor(url, price = null, removeAfterClick = true) {
        const $hiddenAnchor = $('<a>', { href: url, style: 'display: none;' });
        if (price) { $hiddenAnchor.attr('data-price', price); }
        $('body').append($hiddenAnchor);
        openCustom($.Event('click'), $hiddenAnchor[0]);
        if (removeAfterClick) { $hiddenAnchor.remove(); }
    }

    $(document).on('submit', '#changeAvatarForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'), type: 'POST', data: formData, processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                if (result.message === 'success') { toastr.success('Avatar updated successfully!'); if (result.photo_profile_url) { $('#avatar-preview').attr('src', result.photo_profile_url); } }
                else if (result.message === 'error') { toastr.error(result.error); }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
                if (xhr.responseJSON && xhr.responseJSON.errors) { var errors = xhr.responseJSON.errors; for (var key in errors) { toastr.error(errors[key][0]); } }
            }
        });
    });
</script>

<script>
    $(document).on('click', '.add-copy', function (e) {
        e.preventDefault(); showSpinner();
        const traderId = $(this).data('id');
        $.ajax({
            url: `/traders/${traderId}/copy`, method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (data) { triggerHiddenAnchor('{{ route("traders.index") }}', '100'); },
            error: function (xhr, status, error) { console.error('Error:', error); }
        });
        hideSpinner();
    });

    $(document).on('click', '.cancel-copy', function (e) {
        e.preventDefault(); showSpinner();
        const traderId = $(this).data('id');
        $.ajax({
            url: `/traders/${traderId}/cancel`, method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function (data) { triggerHiddenAnchor('{{ route("traders.index") }}', '100'); },
            error: function (xhr, status, error) { console.error('Error:', error); }
        });
        hideSpinner();
    });
</script>
<script>
    $('#generateTokenWrapper').fadeOut();
    $(document).on('input', '#old_email', function () {
        const email = $(this).val();
        if (email) { $('#generateTokenWrapper').fadeIn(); } else { $('#generateTokenWrapper').fadeOut(); }
    });

    $(document).on('submit', '#verifyIdentityForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr('action'), type: 'POST', data: formData, processData: false, contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (result) {
                if (result.message === 'success') { toastr.success('Verification documents uploaded successfully!'); $('.site-card-body').load(window.location.href + ' .site-card-body'); }
                else if (result.message === 'error') { toastr.error(result.error); }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
                if (xhr.responseJSON && xhr.responseJSON.errors) { var errors = xhr.responseJSON.errors; for (var key in errors) { toastr.error(errors[key][0]); } }
            }
        });
    });

    $(document).on('click', '#generateTokenBtn', function () {
        const $form = $('#updateEmailForm');
        const url = "{{  route('email.token.generate')}}";
        const email = $('#old_email').val();
        $.ajax({
            url: url, method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { email: email, action: 'generate_token' },
            beforeSend: function () { showSpinner(); },
            success: function (response) { toastr.success(response.message, '', { onHidden: function () { hideSpinner(); } }); },
            error: function (xhr) { toastr.error(xhr.responseJSON.message, '', { onHidden: function () { hideSpinner(); } }); },
        });
    });

    $(document).on('submit', '#updateEmailForm', function (e) {
        e.preventDefault();
        const $form = $(this);
        const url = $form.attr('action');
        const formData = $form.serialize();
        $.ajax({
            url: url, method: 'POST', data: formData,
            success: function (response) { toastr.success(response.message); $form[0].reset(); $('#generateTokenWrapper').fadeOut(); },
            error: function (xhr) { toastr.error(xhr.responseJSON.message); },
        });
    });

    setTimeout(function () {
        const $form = $('#updateEmailForm');
        const url = $form.attr('action');
        $.ajax({ url: url, method: 'POST', data: { _token: $form.find('input[name="_token"]').val(), action: 'expire_token' }, success: function () { toastr.info("Token expired. Please generate a new one."); } });
    }, 10 * 60 * 1000);

    $(document).on('input', '#old_password', function () {
        const oldPassword = $(this).val();
        if (oldPassword) { $('#generateTokenWrapper').fadeIn(); } else { $('#generateTokenWrapper').fadeOut(); }
    });

    $(document).on('click', '#generateTokenBtn2', function (e) {
        e.preventDefault();
        const email = "{{ Auth::user()->email }}";
        const url = "{{ route('password.token.generate') }}";
        $.ajax({
            url: url, method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, data: { email: email },
            beforeSend: function () { showSpinner(); },
            success: function (response) { toastr.success(response.message, '', { onHidden: function () { hideSpinner(); } }); },
            error: function (xhr) { toastr.error(xhr.responseJSON.message || 'An error occurred.', '', { onHidden: function () { hideSpinner(); } }); },
        });
    });

    $(document).on('submit', '#updatePasswordForm', function (e) {
        e.preventDefault();
        const $form = $(this);
        const url = $form.attr('action');
        const formData = $form.serialize();
        $.ajax({
            url: url, method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, data: formData,
            beforeSend: function () { showSpinner(); },
            success: function (response) { toastr.success(response.message, '', { onHidden: function () { hideSpinner(); } }); $form[0].reset(); $('#generateTokenWrapper').fadeOut(); },
            error: function (xhr) { toastr.error(xhr.responseJSON.message, '', { onHidden: function () { hideSpinner(); } }); },
        });
    });
</script>

<script>
    const interestRates = { 4: '10%', 5: '13%', 6: '15%', 7: '18%', 8: '20%', 9: '23%', 10: '25%', 11: '28%', 12: '30%' };
    $(document).on('change', '#locked_duration', function () { const duration = $(this).val(); $('#interest_rate').text(interestRates[duration]); });
    $(document).on('submit', '#lockFundsForm', function (e) {
        e.preventDefault();
        const $form = $(this); const url = $form.attr('action'); const formData = $form.serialize();
        const amount = parseFloat($('#locked_funds').val());
        const tradingBalance = parseFloat('{{ Auth::user()->trading_balance ?? 0 }}');
        if (amount > tradingBalance) { toastr.error('Amount exceeds your trading balance.'); return; }
        $.ajax({
            url: url, method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, data: formData,
            beforeSend: function () { showSpinner(); },
            success: function (response) {
                toastr.success(response.message, '', { onHidden: function () { hideSpinner(); $('#mainBalance').html(response.trading_balance); $('#lockedfundsBalance').html(response.locked_funds); triggerHiddenAnchor('{{ route("locked.funds") }}', '100'); } });
            },
            error: function (xhr) { toastr.error(xhr.responseJSON.message, '', { onHidden: function () { hideSpinner(); } }); }
        });
    });
</script>

<script>
    function updateUnreadCount() {
        $.ajax({
            url: "{{ route('notifications.unreadCount') }}", method: 'GET',
            success: function (response) { $('#outer-unread-count').text(response.unreadCount); $('.noti-head #outer-unread-count').text(response.unreadCount); },
            error: function (xhr) { console.error('Error fetching unread count:', xhr.responseText); }
        });
    }
    setInterval(updateUnreadCount, 30000);
    loadNotifications();
    setInterval(loadNotifications, 30000);

    function loadNotifications() {
        $.ajax({
            url: '{{ route('notifications.dropdown') }}', method: 'GET',
            success: function (response) { $('.all-noti').html(response); },
            error: function (xhr) {
                if (xhr.status === 404) { $('.all-noti').html('<p class="text-center my-3">No notifications found</p>'); }
                else { console.error('Error fetching notifications:', xhr.responseText); }
            }
        });
    }

    $(document).on('click', '.color-switcher', function () {
        "use strict";
        $("body").toggleClass("dark-theme");
        const isDarkTheme = $("body").hasClass("dark-theme");
        localStorage.setItem('theme', isDarkTheme ? 'dark' : 'light');
        var url = '{{ route("theme.toggle") }}'; $.get(url);
    });

    $(document).ready(function () {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') { $("body").addClass("dark-theme"); } else { $("body").removeClass("dark-theme"); }
    });

    $(document).on('click', '.notification-dot', function () { loadNotifications(); });

    function markAllAsRead() {
        $.ajax({
            url: '/notifications/mark-all-read', method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            beforeSend: function () { showSpinner(); },
            success: function () { loadNotifications(); updateUnreadCount(); hideSpinner(); }
        });
    }

    $(document).on('click', '#proceed-button', function () {
        $('#verify-content').html(`
                            <div class="site-card">
                                <div class="site-card-header">
                                    <h3 class="title">Verify Identity</h3>
                                </div>
                                <div class="site-card-body vh-100">
                                @if (Auth::user()->account_verified == 0)
                                    <form action="{{ route('user.verify.store') }}" method="post" id="verifyIdentityForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="body-title">Upload Front of Government Issued Identity Document:</div>
                                            <div class="wrap-custom-file">
                                                <input type="file" name="photo_front_view" id="photo_front_view" accept=".gif, .jpg, .png, .jpeg" onchange="imagePreview(this, 'photo-front-preview')">
                                                <label for="photo_front_view">
                                                    <img id="photo-front-preview" class="upload-icon" src="../assets/global/materials/upload.svg" alt="Upload Front">
                                                    <span>Upload Front</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="body-title">Upload Back of Government Issued Identity Document:</div>
                                            <div class="wrap-custom-file">
                                                <input type="file" name="photo_back_view" id="photo_back_view" accept=".gif, .jpg, .png, .jpeg" onchange="imagePreview(this, 'photo-back-preview')">
                                                <label for="photo_back_view">
                                                    <img id="photo-back-preview" class="upload-icon" src="../assets/global/materials/upload.svg" alt="Upload Back">
                                                    <span>Upload Back</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="progress-steps-form">
                                            <button type="submit" class="site-btn blue-btn">Submit for Verification</button>
                                        </div>
                                    </form>
                                @elseif (Auth::user()->account_verified == 2)
                                    <div class="transaction-status text-center">
                                        <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>
                                        <h2 class="text-warning font-weight-bold mt-3">Account Verification Pending</h2>
                                        <p class="text-warning">Your identity verification is still being processed. Please be patient while we review your documents.</p>
                                    </div>
                                @else
                                    <div class="transaction-status text-center">
                                        <div class="icon success mb-3"><i class="anticon anticon-check" style="color: green; font-size: 48px;"></i></div>
                                        <h2 class="text-success font-weight-bold">Account Verified!</h2>
                                        <p>Congratulations! Your identity has been successfully verified. You now have full access to all features on our platform.</p>
                                        <a href="{{ route('index') }}" onclick="openCustom(event, this)" class="btn btn-primary mt-3"><i class="anticon anticon-home"></i> Go to Dashboard</a>
                                    </div>
                                @endif
                                </div>
                            </div>
                            `);
    });
</script>

<script>
    function adjustChartBodyHeight() {
        const headerHeight = $('.panel-header').outerHeight();
        const viewportHeight = $(window).height();
        let chartBodyHeight = viewportHeight - headerHeight;
        if (window.innerWidth < 768) {
            chartBodyHeight = "600px"; $('#chart-container').css('height', '600px'); $('#chart-body').css('height', '600px');
        } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
            chartBodyHeight = "600px"; $('#chart-container').css('height', '600px'); $('#chart-body').css('height', '600px');
        }
        $('#chart').css('height', chartBodyHeight + 'px');
        $('#chart-side').css('height', chartBodyHeight + 'px');
    }
    $(window).on('load resize', () => { adjustChartBodyHeight(); });
    const observer = new MutationObserver(() => { adjustChartBodyHeight(); });
    adjustChartBodyHeight();
    observer.observe(document.getElementById('dynamic-content'), { childList: true, subtree: true });

    $(document).on('change', '#marketPairs', function (e) {
        e.preventDefault();
        const chartKey = JSON.parse($(this).val());
        const chartId = chartKey[1];
        $.ajax({
            url: "{{ route('get-chart') }}", method: "POST",
            data: { chart_key: chartId, arryKey: "dddd", _token: "{{ csrf_token() }}" },
            success: function (response) { if (response.widget) { $('#chart-container').html(response.widget); } },
            error: function (xhr) { console.error(xhr.responseJSON.error || 'An error occurred'); }
        });
    });
</script>

<script>
    $(document).ready(function () {
        const charts = @json($charts);
        const categorizedCharts = {
            Crypto: Object.entries(charts).slice(0, 16),
            Forex: Object.entries(charts).slice(16, 63),
            Stock: Object.entries(charts).slice(63, 90),
        };
        function populateMarketPairs(category) {
            const $marketPairs = $("#marketPairs");
            if ($marketPairs.length === 0) { return; }
            $marketPairs.empty();
            if (categorizedCharts[category]) {
                categorizedCharts[category].forEach(([key, chart]) => {
                    const option = `<option value='${JSON.stringify([chart.pair, key])}'>${chart.name}</option>`;
                    $marketPairs.append(option);
                });
            }
            if ($marketPairs.children().length > 0) { $marketPairs.prop("selectedIndex", 0); }
        }
        $(document).on("change", "#markets", function () { populateMarketPairs($(this).val()); });
    });

    $(document).ready(function () {
        $('i[data-id]').on('click', function () {
            var tradeId = $(this).data('id');
            $('#confirmCloseTrade').data('id', tradeId);
            $('#closeTradeModal').modal('show');
        });
        $('#confirmCloseTrade').on('click', function () {
            var tradeId = $(this).data('id');
            $.ajax({
                url: '/close-trade', method: 'POST',
                data: { trade_id: tradeId, _token: $('meta[name="csrf-token"]').attr('content') },
                success: function (response) { $('#closeTradeModal').modal('hide'); toastr.success('Trade closed successfully!'); },
                error: function (xhr, status, error) { toastr.error('Error closing the trade.'); }
            });
        });
        $('#closeTradeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var tradeId = button.data('id');
            $('#confirmCloseTrade').data('id', tradeId);
        });
    });


    // Hide/Show Review Section based on payment method selection
    $(document).on('change', '#gatewaySelect', function () {
        const selected = $(this).val();
        if (selected && selected !== '') {
            $('#reviewSection').fadeIn(300);
        } else {
            $('#reviewSection').fadeOut(200);
        }
    });

    $(document).on('keyup', '#amount', function () {
        if ($('#gatewaySelect').val() !== '') {
            $('#reviewSection').fadeIn(300);
        }
    });
</script>
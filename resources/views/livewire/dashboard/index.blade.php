@extends('layouts.app')
@section('title', 'Dashboard | ' . config('app.name'))

@section('content')
<!-- Placeholder for dynamically loaded content -->
<div id="dynamic-content">
    @include('livewire.dashboard.partials.desktop-content')

    @include('livewire.dashboard.partials.mobile-content')
</div>

@endsection

@section('xtraJs')

 


<script>
    (function ($) {
        'use strict';

        let pusherAppKey = "";
        let pusherAppCluster = "mt1";
        let soundUrl = "../notification-tune";

        var notification = new Pusher(pusherAppKey, {
            encrypted: true,
            cluster: pusherAppCluster,
        });
        var channel = notification.subscribe('user-notification109');
        channel.bind('notification-event', function (result) {
            playSound();
            latestNotification();
            notifyToast(result);
        });

        function latestNotification() {
            $.get('../user/latest-notification', function (data) {
                $('.user-notifications109').html(data);
            })
        }

        function notifyToast(data) {
            new Notify({
                status: 'info',
                title: data.data.title,
                text: data.data.notice,
                effect: 'slide',
                speed: 300,
                customClass: '',
                customIcon: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-megaphone"><path d="m3 11 18-5v12L3 14v-3z"></path><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path></svg>',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 9000,
                gap: 20,
                distance: 20,
                type: 1,
                position: 'right bottom',
                customWrapper: '<div><a href="' + data.data.action_url +
                    '" class="learn-more-link">Explore<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="external-link" class="lucide lucide-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" x2="21" y1="14" y2="3"></line></svg></a></div>',
            })

        }

        function playSound() {
            $.get(soundUrl, function (data) {
                var audio = new Audio(data);
                audio.play();
                audio.muted = false;
            });
        }



    })(jQuery);
</script>
<script>
    (function ($) {
        'use strict';
        // To top
        $.scrollUp({
            scrollText: '<i class="fas fa-caret-up"></i>',
            easingType: 'linear',
            scrollSpeed: 500,
            animation: 'fade'
        });
    })(jQuery);
</script>

<script type="text/javascript" src="../assets/vendor/mckenziearts/laravel-notify/js/notify.js"></script>
<script>
    function copyRef() {
        /* Get the text field */
        var textToCopy = $('#refLink').val();
        // Create a temporary input element
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(textToCopy).select();
        // Copy the text from the temporary input
        document.execCommand('copy');
        // Remove the temporary input element
        tempInput.remove();
        $('#copy').text('Copied');
        var copyApi = document.getElementById("refLink");
        /* Select the text field */
        copyApi.select();
        copyApi.setSelectionRange(0, 999999999); /* For mobile devices */
        /* Copy the text inside the text field */
        document.execCommand('copy');
        $('#copy').text('Copied')

    }

    // Use delegated events for dynamically added elements
    $(document).on('click', '.moreless-button', function () {
        $('.moretext').slideToggle();
        if ($(this).text() == "Load more") {
            $(this).text("Load less");
        } else {
            $(this).text("Load more");
        }
    });

    $(document).on('click', '.moreless-button-2', function () {
        $('.moretext-2').slideToggle();
        if ($(this).text() == "Load more") {
            $(this).text("Load less");
        } else {
            $(this).text("Load more");
        }
    });

</script>
<script>
    // Color Switcher
    $(document).on('click', '#theme-toggle', function () {
        $.ajax({
            url: "{{ route('theme.toggle') }}",
            type: "GET",
            success: function (response) {
                if (response.success) {
                    $('body').toggleClass('dark-theme');
                }
            }
        });
    });

    function validateDouble(value) {
        // Use a regular expression to allow only digits and a single decimal point
        const regex = /^\d*\.?\d*$/;

        // Test the current value against the regex
        if (regex.test(value)) {
            return value; // Valid input, return as is
        }

        // If invalid, strip out non-numeric characters except the first decimal point
        return value.replace(/[^0-9.]/g, '').replace(/(\..*?)\./g, '$1');
    }
</script>
@include('layouts.app.xtrajs')
@endsection
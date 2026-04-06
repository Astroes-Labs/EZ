<script>

    /*  setInterval(() => {
         console.log('Checking Session Status...');
         $.ajax({
             url: '/check-session',
             type: 'GET',
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is sent
             },
             success: function (response) {
                 if (response.status === 'active') {
                     console.log('Session is active.');
                 }
             },
             error: function (xhr) {
                 if (xhr.status === 401) { // Unauthenticated
                     alert('Your session has expired due to inactivity.');
                     window.location.href = '/login'; // Redirect to login page
                 } else {
                     console.error('Error checking session:', xhr);
                 }
             }
         });
     }, 30000); // Check every 30 seconds */




    $(document).ready(function () {
        let $target = $("#target");
        let text = $target.text(); // Get the text inside the element
        let index = 0;

        $target.text(''); // Clear the text initially
        $target.show(); // Make the div visible

        function typeWord() {
            if (index < text.length) {
                $target.append(text[index]);
                index++;
                setTimeout(typeWord, 100); // Adjust the speed here
            }
        }

        typeWord();
    });
</script>


<script>
    function showSpinner() {
        // Show the spinner
        $('#spinner-overlay').fadeIn();
        console.log("show spinner");

    }

    // Function to hide and remove the spinner
    function hideSpinner() {
        $('#spinner-overlay').fadeOut();
    }
    $(document).ready(function () {
        hideSpinner();
    });
</script>

<script>
    function openCustom(event, element) {
        event.preventDefault(); // Prevent default anchor functionality

        // Get the URL from the anchor's href attribute
        const url = element.getAttribute('href');

        const price = element.getAttribute('data-price') || null;

        console.log('Fetching content from:', url);


        // Perform the Ajax request
        $.ajax({
            url: url, // Use the URL from the href attribute
            method: 'GET', // HTTP method (use 'POST' if needed)
            beforeSend: function () {
                showSpinner();
            },
            success: function (response) {
                // Inject the fetched content into a specific container
                $('#dynamic-content').html(response).promise().done(function () {
                    hideSpinner();
                });
            },
            error: function (xhr, status, error) {
                // Handle any errors
                console.error('Error fetching content from URL:', error);
                hideSpinner();
            }
        });
    }

    $(document).ready(function () {
        // Event delegation for dynamically loaded content
        $(document).on('keyup', '#customPrice', function () {
            // Get the edited price value from the contenteditable element
            const newPrice = $(this).text().trim();

            // Find the closest anchor tag with the `data-price` attribute and update it
            $(this).closest('.single-investment-plan').find('a').attr('data-price', newPrice);

            console.log('Updated price:', newPrice);
        });
    });


</script>




<script>
    //SCRIPTS FOR DEPOSITS

    var globalData;
    var currency = "{{ Auth::user()->currency }}";
    $(document).ready(function () {
        // Use event delegation to attach the keyup event to dynamically loaded elements
        $(document).on('keyup', '#amount', function (e) {
            console.log("Keyup event triggered");

            "use strict";
            var amount = $(this).val();
            console.log(amount);

            var coin = $("#gatewaySelect").val();
            if (coin !== '') {
                fetchAndDisplayCoinValue(coin, amount);
            }

            // Format the amount with commas
            var formattedAmount = Number(amount).toLocaleString();

            // Display formatted amount
            $('.amount').text(formattedAmount);
            $('.currency').text(currency);

            var charge = 0;

            // Format the charge (if needed) with commas
            $('.charge2').text(charge.toLocaleString() + ' ' + currency);

            // Format the total (amount + charge) with commas
            var total = Number(amount) + Number(charge);
            $('.total').text(total.toLocaleString() + ' ' + currency);


        });
    });



    // Event handler for gateway select change
    $('body').on('change', '#gatewaySelect', function (e) {
        e.preventDefault();
        "use strict";

        var coin = $(this).val(); // Selected coin
        $('.paymentCurrency').text(" " + coin);

        var amount = $('#amount').val(); // Amount from the input field
        fetchAndDisplayCoinValue(coin, amount);
        fetchPaymentDetails(coin);
    });

    function fetchPaymentDetails1(gatewaySelect) {
        $.ajax({
            url: '/payment-details', // Ensure this matches your Laravel route URL
            type: 'POST',
            data: {
                gatewayCode: gatewaySelect
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function (data) {
                if (data.credentials !== undefined) {
                    console.log(data.credentials);

                    // Append the received content to the empty div
                    $('.manual-row').html(data.credentials);

                    // Update the payment method icon
                    $('#logo img.payment-method').attr('src', data.icon);

                    // Call your image preview function (if needed)
                    imagePreview();
                } else {
                    console.log('No credentials received');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function fetchPaymentDetails(gatewayCode) {
        $.ajax({
            url: '{{ route('deposit.fetchPaymentDetails') }}', // The route to your controller method
            type: 'GET', // or 'POST' if you prefer
            data: {
                gatewayCode: gatewayCode
            },
            success: function (data) {
                if (data.credentials !== undefined) {
                    console.log(data.credentials);

                    // Append the returned credentials to the manual-row div
                    $('.manual-row').html(data.credentials);

                    // Set the icon image dynamically
                    var imageUrl = data.icon;
                    $('#logo img.payment-method').attr('src', imageUrl);

                    // Call imagePreview if required
                    imagePreview();
                }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);
                hideSpinner();
            }
        });
    }


    // Function to fetch coin value and calculate the equivalent crypto amount
    function fetchAndDisplayCoinValue(coin, amount) {
        if (coin && amount > 0) {
            showSpinner();
            $.ajax({
                url: '/coinvalue/' + coin + '/1', // Assuming the quantity is always 1
                type: 'GET',
                dataType: 'json',
                success: function (coinData) {
                    console.log('Coin Value:', coinData.cash_balance);

                    var coinValue = amount / coinData.cash_balance;

                    // Format to 4 decimals initially
                    var formattedValue = coinValue.toFixed(4);

                    // Check if the 4-decimal formatted value is greater than 0
                    if (Number(formattedValue) <= 0) {
                        // If the value is 0, format to 6 decimals instead
                        formattedValue = coinValue.toFixed(6);
                    }

                    // Update the UI with the calculated value
                    $('.paymentAmount').text(formattedValue);
                    $('#coin_price').val(formattedValue);
                    hideSpinner();
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching coin value:', error);
                    hideSpinner();
                }
            });
        } else {
            //toastr.error('Please select a valid payment method and enter a valid amount');
        }
    }

    function imagePreview(input, previewId) {
        "use strict";

        // Ensure the input has a file selected
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            // On load, update the image src and set size
            reader.onload = function (e) {
                var $imgElement = $('#' + previewId);
                $imgElement.attr('src', e.target.result);

                // Get the container height and set the image size (squared)
                var containerHeight = $imgElement.parent().height();
                $imgElement.css({
                    width: containerHeight + "px", // Set the width to the height of the container
                    height: containerHeight + "px", // Set the height to the height of the container
                    objectFit: 'cover' // Ensure the image covers the container area while maintaining aspect ratio
                });
            };

            // Read the file as a DataURL
            reader.readAsDataURL(input.files[0]);
        }
    }



    function imagePreviewAdd(title) {
        "use strict";
        var base_url = window.location.origin;

        var previewImage = $("#image-old");
        previewImage.css({
            'background-image': 'url(' + base_url + '/assets/' + title + ')'
        });
        previewImage.addClass("file-ok");
    }


    $(document).on('submit', '#depositForm', function (e) {
        //$('#depositForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var selectedValue = $('#gatewaySelect').val();


        if (selectedValue !== '' && selectedValue !== null) {
            var amount = $('#amount').val();


            if (amount > 0 || amount > 10) {
                var coinPrice = $('#coin_price').val(); // get the coin price field

                // Prepare data to send to backend
                var dataToSend = {
                    crypto_currency: selectedValue,
                    user_id: {{ Auth::id() }},
                    price: amount,
                    price_in_crypto: coinPrice,
                    status: 'Pending', // Default status
                    timestamp: new Date().toISOString(), // current timestamp
                };

                // Send AJAX request with data to Laravel backend
                $.ajax({
                    url: $('#depositForm').attr('action'), // Get the form action URL
                    type: 'POST',
                    data: dataToSend,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Add CSRF token
                    }, beforeSend: function () {
                        showSpinner(); // Show the spinner before starting the AJAX request
                    },
                    success: function (result) {
                        if (result.message === 'success') {
                            $('#depositForm')[0].reset();
                            $(".progress-steps-form").html(result.checkout);

                            // Handle step transition
                            var currentElement = $('.single-step.current');
                            var nextElement = currentElement.next('.single-step');
                            if (currentElement.length === 1 && nextElement.length ===
                                1) {
                                currentElement.removeClass('current');
                                nextElement.addClass('current');
                                loadNotifications();
                                updateUnreadCount();
                                hideSpinner();
                            } else {
                                console.log(
                                    'Error: Expected exactly two elements with class "single-step" and "current" on the first one.'
                                );
                            }
                        }
                        if (result.message === 'error') {
                            toastr.error(result.error, '', {
                                onHidden: function () {
                                    hideSpinner(); // Hide the spinner after the toastr message is hidden
                                }
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('Error: ' + error);

                    }
                });

            } else {
                toastr.error('Please Input a Valid Amount');
            }
        } else {
            toastr.error('Please Select a Payment Method.');
        }
    });


    //withdrawal
    $(document).on('submit', '#withdrawForm', function (e) {
        showSpinner();
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route("withdraw.store") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                // Toastr for success notification
                toastr.success(response.message, 'Success');
                // Optional: Reload the page or reset the form
                $('#withdrawForm')[0].reset(); $(".progress-steps-form").html(response.checkout);

                // Handle step transition
                var currentElement = $('.single-step.current');
                var nextElement = currentElement.next('.single-step');
                if (currentElement.length === 1 && nextElement.length ===
                    1) {
                    currentElement.removeClass('current');
                    nextElement.addClass('current');
                } else {
                    console.log(
                        'Error: Expected exactly two elements with class "single-step" and "current" on the first one.'
                    );
                }
            },
            error: function (xhr) {
                // Toastr for error notification
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    toastr.error(xhr.responseJSON.message, 'Error');
                } else {
                    toastr.error('An unexpected error occurred.', 'Error');
                }
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
                if (amount >= globalData.minimum_deposit) {
                    submitForm(formData, '#depositForm1');

                } else {
                    toastr.error('The Minimum Amount is ' + globalData.minimum_deposit + " " +
                        currency);
                }
            } else {
                toastr.error('Please Select a Payment Method.');
            }
        });



    });

    $(document).ready(function () {

        $('#depositForm1').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var selectedValue = $('#gatewaySelect').val();
            if (selectedValue !== '' & selectedValue !== null) {

                var amount = $('#amount').val()
                if (amount >= globalData.minimum_deposit) {
                    submitForm(formData, '#depositForm1');

                } else {
                    toastr.error('The Minimum Amount is ' + globalData.minimum_deposit + " " +
                        currency);
                }
            } else {
                toastr.error('Please Select a Payment Method.');
            }
        });



    });


    function submitForm(formData, formId) {
        $.ajax({
            url: endpoint, //$(this).attr('action'),
            type: "POST", //$(this).attr('method'),
            data: formData,
            processData: false,
            contentType: false,
            success: function (result) {
                if (result.message === 'success') {
                    $(formId)[0].reset();
                    $(".progress-steps-form").html(result.checkout);
                    var currentElement = $('.single-step.current'); // Select the element with both classes

                    var currentElement = $('.single-step.current');
                    var nextElement = currentElement.next('.single-step');

                    if (currentElement.length === 1 && nextElement.length === 1) {
                        // Remove 'current' class from the first element
                        currentElement.removeClass('current');

                        // Add 'current' class to the next element
                        nextElement.addClass('current');
                    } else {
                        console.log(
                            'Error: Expected exactly two elements with class "single-step" and "current" on the first one.'
                        );
                    }
                    //xyz
                }
                if (result.message === 'error') {
                    toastr.error(result.error);
                }
                console.log("Success");

            },
            error: function (xhr, status, error) {
                // Handle errors, e.g., show error message
                console.log('Error: ' + error);
            }
        });
    }


    ///account/info/update
    $(document).on('submit', '#changeSettingsForm', function (e) {
        e.preventDefault(); // Prevent form from submitting normally

        // Gather form data
        var formData = new FormData(this);

        // Send AJAX request with data to Laravel backend
        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (result) {
                if (result.message === 'success') {
                    toastr.success('Account Info updated successfully!');



                    triggerHiddenAnchor('{{ route("account.info") }}', '100');


                } else if (result.message === 'error') {
                    toastr.error(result.error);
                }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);

                // Optional: Display error details
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        toastr.error(errors[key][0]);
                    }
                }
            }
        });
    });


    function triggerHiddenAnchor(url, price = null, removeAfterClick = true) {
        // Create a hidden anchor tag dynamically
        const $hiddenAnchor = $('<a>', {
            href: url,                    // Set the URL dynamically
            style: 'display: none;'       // Ensure the element is not visible
        });

        // Add the data-price attribute if provided
        if (price) {
            $hiddenAnchor.attr('data-price', price);
        }

        // Append it to the body (temporarily)
        $('body').append($hiddenAnchor);

        // Trigger the click programmatically using the custom function
        openCustom($.Event('click'), $hiddenAnchor[0]);

        // Optionally, remove the element from the DOM after triggering
        if (removeAfterClick) {
            $hiddenAnchor.remove();
        }
    }


    //update avatar
    $(document).on('submit', '#changeAvatarForm', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Gather form data
        var formData = new FormData(this);

        // Send AJAX request with data to Laravel backend
        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (result) {
                if (result.message === 'success') {
                    toastr.success('Avatar updated successfully!');

                    // Update the avatar image preview dynamically
                    if (result.photo_profile_url) {
                        $('#avatar-preview').attr('src', result.photo_profile_url); // Update the image src
                    }
                } else if (result.message === 'error') {
                    toastr.error(result.error);
                }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);

                // Optional: Display validation error details
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        toastr.error(errors[key][0]);
                    }
                }
            }
        });
    });


</script>


<script>


    $(document).on('click', '.add-copy', function (e) {
        e.preventDefault();
        showSpinner();
        const traderId = $(this).data('id'); // Get trader ID from the data attribute
        $.ajax({
            url: `/traders/${traderId}/copy`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
            },
            success: function (data) {
                //location.reload(); // Reload the page on success
                triggerHiddenAnchor('{{ route("traders.index") }}', '100');
            },
            error: function (xhr, status, error) {
                console.error('Error:', error); // Handle errors
            }
        });
        hideSpinner();
    });

    $(document).on('click', '.cancel-copy', function (e) {
        e.preventDefault();
        showSpinner();
        const traderId = $(this).data('id'); // Get trader ID from the data attribute
        $.ajax({
            url: `/traders/${traderId}/cancel`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
            },
            success: function (data) {
                //location.reload(); // Reload the page on success
                triggerHiddenAnchor('{{ route("traders.index") }}', '100');
            },
            error: function (xhr, status, error) {
                console.error('Error:', error); // Handle errors
            }
        });
        hideSpinner();
    });

</script>
<script>


    //Update email
    $('#generateTokenWrapper').fadeOut();
    $(document).on('input', '#old_email', function () {
        const email = $(this).val();
        if (email) {
            $('#generateTokenWrapper').fadeIn();

        } else {
            $('#generateTokenWrapper').fadeOut();
        }

    });
    //upload/update KYC
    $(document).on('submit', '#verifyIdentityForm', function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Gather form data
        var formData = new FormData(this);

        // Send AJAX request to Laravel backend
        $.ajax({
            url: $(this).attr('action'), // Get the form action URL
            type: 'POST',
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (result) {
                if (result.message === 'success') {
                    toastr.success('Verification documents uploaded successfully!');

                    // Reload the verification section dynamically
                    $('.site-card-body').load(window.location.href + ' .site-card-body');
                } else if (result.message === 'error') {
                    toastr.error(result.error);
                }
            },
            error: function (xhr, status, error) {
                console.log('Error: ' + error);

                // Optional: Display validation error details
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        toastr.error(errors[key][0]);
                    }
                }
            }
        });
    });

    $(document).on('click', '#generateTokenBtn', function () {
        const $form = $('#updateEmailForm');
        const url = "{{  route('email.token.generate')}}"; // Use the URL from the form's action attribute
        const email = $('#old_email').val();

        $.ajax({
            url: url, // Use the form's action URL directly
            method: 'POST',
            data: {
                email: email,
                action: 'generate_token', // Add a custom field to distinguish actions

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
                },
            },
            beforeSend: function () {
                showSpinner(); // Show the spinner before starting the AJAX request
            },
            success: function (response) {
                toastr.success(response.message, '', {
                    onHidden: function () {
                        hideSpinner(); // Hide the spinner after the toastr message is hidden
                    }
                });
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message, '', {
                    onHidden: function () {
                        hideSpinner(); // Hide the spinner after the toastr message is hidden
                    }
                });
            },
        });

    });

    $(document).on('submit', '#updateEmailForm', function (e) {
        e.preventDefault();
        const $form = $(this);
        const url = $form.attr('action'); // Use the URL from the form's action attribute
        const formData = $form.serialize(); // Serialize form data

        $.ajax({
            url: url, // Use the form's action URL directly
            method: 'POST',
            data: formData,
            success: function (response) {
                toastr.success(response.message);
                $form[0].reset();
                $('#generateTokenWrapper').fadeOut();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message);
            },
        });
    });

    // Automatically expire the token after 10 minutes
    setTimeout(function () {
        const $form = $('#updateEmailForm');
        const url = $form.attr('action'); // Use the form's action URL directly

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: $form.find('input[name="_token"]').val(),
                action: 'expire_token', // Add a custom field to distinguish actions
            },
            success: function () {
                toastr.info("Token expired. Please generate a new one.");
            },
        });
    }, 10 * 60 * 1000); // 10 minutes in milliseconds



    //update password
    $(document).on('input', '#old_password', function () {
        const oldPassword = $(this).val();
        if (oldPassword) {
            $('#generateTokenWrapper').fadeIn();
        } else {
            $('#generateTokenWrapper').fadeOut();
        }
    });



    $(document).on('click', '#generateTokenBtn2', function (e) {
        e.preventDefault();

        const email = "{{ Auth::user()->email }}"; // Use logged-in user's email
        const url = "{{ route('password.token.generate') }}";

        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
            },
            data: {
                email: email,
            },
            beforeSend: function () {
                showSpinner(); // Show the spinner before starting the AJAX request
            },
            success: function (response) {
                toastr.success(response.message, '', {
                    onHidden: function () {
                        hideSpinner(); // Hide the spinner after the toastr message is hidden
                    }
                });
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message || 'An error occurred.', '', {
                    onHidden: function () {
                        hideSpinner();
                    }
                });
            },
        });
    });

    $(document).on('submit', '#updatePasswordForm', function (e) {
        e.preventDefault();
        const $form = $(this);
        const url = $form.attr('action'); // Use the form's action URL directly
        const formData = $form.serialize(); // Serialize form data

        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
            },
            data: formData,
            beforeSend: function () {
                showSpinner(); // Show the spinner before starting the AJAX request
            },
            success: function (response) {
                toastr.success(response.message, '', {
                    onHidden: function () {
                        hideSpinner(); // Hide the spinner after the toastr message is hidden
                    }
                });
                $form[0].reset();
                $('#generateTokenWrapper').fadeOut();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message, '', {
                    onHidden: function () {
                        hideSpinner(); // Hide the spinner after the toastr message is hidden
                    }
                });
            },
        });
    });

</script>


<script>

    //LOCKED FUNDS FEATURES AND FUNCTIONALITY
    // Interest rates mapping
    const interestRates = {
        4: '10%',
        5: '13%',
        6: '15%',
        7: '18%',
        8: '20%',
        9: '23%',
        10: '25%',
        11: '28%',
        12: '30%'
    };

    // Update interest rate on duration change
    $(document).on('change', '#locked_duration', function () {
        const duration = $(this).val();
        $('#interest_rate').text(interestRates[duration]);
    });


    // AJAX submission
    $(document).on('submit', '#lockFundsForm', function (e) {
        e.preventDefault();
        const $form = $(this);
        const url = $form.attr('action'); // Use the form's action URL directly
        const formData = $form.serialize(); // Serialize form data

        // Check if amount is less than or equal to trading balance
        const amount = parseFloat($('#locked_funds').val());
        const tradingBalance = parseFloat('{{ Auth::user()->trading_balance ?? 0 }}');

        if (amount > tradingBalance) {
            toastr.error('Amount exceeds your trading balance.');
            return;
        }

        // AJAX request to lock funds
        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: formData,
            beforeSend: function () {
                showSpinner(); // Show the spinner before starting the AJAX request
            },
            success: function (response) {
                toastr.success(response.message, '', {
                    onHidden: function () {
                        hideSpinner();
                        $('#mainBalance').html(response.trading_balance);
                        $('#lockedfundsBalance').html(response.locked_funds);
                        triggerHiddenAnchor('{{ route("locked.funds") }}', '100');
                        
                    }
                });
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message, '', {
                    onHidden: function () {
                        hideSpinner();
                    }
                });
            }
        });
    });
</script>

<script>

    //NOTIFICATIONS FUNCTIONALITY
    /*   function loadNotifications() {
          $.ajax({
              url: '/notifications/dropdown',
              method: 'GET',
              success: function (data) {
                  let dropdown = $('.notification-pop .all-noti');
                  let count = $('.notification-dot .number');
  
                  dropdown.empty();
                  data.forEach(function (notification) {
                      dropdown.append(`
                      <div class="single-noti ${notification.read ? 'read' : ''}">
                          <a href="/notifications/${notification.id}">
                              <div class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 20 7 4 7"></polygon></svg>
                              </div>
                              <div class="content">
                                  <div class="main-cont">${notification.title}</div>
                                  <div class="time">${new Date(notification.created_at).toLocaleString()}</div>
                              </div>
                          </a>
                      </div>
                  `);
                  });
  
                  count.text(data.filter(n => !n.read).length);
              }
          });
      } */





    function updateUnreadCount() {
        $.ajax({
            url: "{{ route('notifications.unreadCount') }}",
            method: 'GET',
            success: function (response) {
                console.log('fetch unread');
                // Update the outer and inner unread count
                $('#outer-unread-count').text(response.unreadCount);
                $('.noti-head #outer-unread-count').text(response.unreadCount);
            },
            error: function (xhr) {
                console.error('Error fetching unread count:', xhr.responseText);
            }
        });
    }



    // Run the function every 30 seconds
    setInterval(updateUnreadCount, 30000);




    // Trigger load initially
    loadNotifications();

    // Auto-refresh notifications
    setInterval(loadNotifications, 30000);

    function loadNotifications() {
        $.ajax({
            url: '{{ route('notifications.dropdown') }}', // Replace with the route to fetch notifications
            method: 'GET',
            success: function (response) {
                // Replace the dropdown content with the fetched HTML
                //$('.user-notifications').html(response);
                $('.all-noti').html(response);
            },
            error: function (xhr) {
                if (xhr.status === 404) {
                    $('.all-noti').html('<p class="text-center my-3">No notifications found</p>');
                } else {
                    console.error('Error fetching notifications:', xhr.responseText);
                    //window.location.reload();

                }
            }
        });
    }
    $(document).on('click', '.color-switcher', function () {
        "use strict";

        // Toggle the dark theme class on the body
        $("body").toggleClass("dark-theme");

        // Check if dark theme is enabled
        const isDarkTheme = $("body").hasClass("dark-theme");

        // Save the theme preference in localStorage
        localStorage.setItem('theme', isDarkTheme ? 'dark' : 'light');

        // Optional: You could also send the change to the server if needed
        var url = '{{ route("theme.toggle") }}';
        $.get(url);
    });

    // On page load, check localStorage for the theme
    $(document).ready(function () {
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme === 'dark') {
            $("body").addClass("dark-theme");
        } else {
            $("body").removeClass("dark-theme");
        }
    });



    // Example: Load notifications when the dropdown button is clicked
    $(document).on('click', '.notification-dot', function () {
        loadNotifications();
    });





    function markAllAsRead() {
        $.ajax({
            url: '/notifications/mark-all-read',
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            beforeSend: function () {
                showSpinner();
            },
            success: function () {
                loadNotifications();
                updateUnreadCount();
                hideSpinner();
            }
        });
    }


    //END OF NOTIFICATIONS FUNCTIONALITY


    $(document).on('click', '#proceed-button', function () {
        $('#verify-content').html(`@include('livewire.dashboard.partials.verify-wrapper')`);
    });


    //function ensures loading of page with url too


</script>



<script>
    function adjustChartBodyHeight() {
        const headerHeight = $('.panel-header').outerHeight(); // Get the header height
        const viewportHeight = $(window).height(); // Get the viewport height
        let chartBodyHeight = viewportHeight - headerHeight; // Calculate remaining height


        if (window.innerWidth < 768) {
            chartBodyHeight = "600px";
            $('#chart-container').css('height', '600px');
            $('#chart-body').css('height', '600px');
        } else if (window.innerWidth >= 768 && window.innerWidth < 1024) {
            chartBodyHeight = "600px";
            $('#chart-container').css('height', '600px');
            $('#chart-body').css('height', '600px');
        } else {
            // You can add other conditions for larger screens if needed
        }
        // Apply height dynamically
        $('#chart').css('height', chartBodyHeight + 'px');
        $('#chart-side').css('height', chartBodyHeight + 'px');

        // Log details to verify adjustments
        // console.log('Header Height:', headerHeight);
        // console.log('Viewport Height:', viewportHeight);
        // console.log('Calculated Chart Body Height:', chartBodyHeight);
        // console.log('#chart-body height adjusted.');
    }
    // Adjust height on window load and resize
    $(window).on('load resize', () => {
        //console.log('Window load or resize triggered.');
        adjustChartBodyHeight();
    });

    // Adjust height whenever dynamic content is loaded into #dynamic-content
    const observer = new MutationObserver(() => {
        //console.log('Mutation observed in #dynamic-content.');
        adjustChartBodyHeight();
    });

    adjustChartBodyHeight();

    // Start observing the #dynamic-content for changes
    observer.observe(document.getElementById('dynamic-content'), { childList: true, subtree: true });




    //FETCH CHART DATA

    $(document).on('change', '#marketPairs', function (e) {
        e.preventDefault();

        const chartKey = JSON.parse($(this).val());
        const chartId = chartKey[1]; // Extract the second value (e.g., "chart_4")

        $.ajax({
            url: "{{ route('get-chart') }}",
            method: "POST",
            data: {
                chart_key: chartId,
                arryKey: "dddd", // Use the first value (e.g., "XRPUSDT") for the symbol
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.widget) {
                    $('#chart-container').html(response.widget);
                    console.log(response.widget);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseJSON.error || 'An error occurred');
            }
        });
    });

</script>


{{--
<script>
    // Define the chart data for categories
    const charts = @json($charts);
    console.log("Charts data:", charts);

    const categorizedCharts = {
        Crypto: Object.entries(charts).slice(0, 16),
        Forex: Object.entries(charts).slice(16, 63),
        Stock: Object.entries(charts).slice(63, 90),
    };

    console.log("Categorized charts:", categorizedCharts);

    // Function to populate the #marketPairs select element
    function populateMarketPairs(category) {
        console.log("Populating marketPairs for category:", category);

        const marketPairs = document.querySelector("#marketPairs");
        if (!marketPairs) {
            console.log("#marketPairs element not found in the DOM.");
            return;
        }

        marketPairs.innerHTML = ""; // Clear existing options
        console.log("Cleared existing options in #marketPairs.");

        if (categorizedCharts[category]) {
            categorizedCharts[category].forEach(([key, chart]) => {
                const option = document.createElement("option");
                option.value = `["${chart.pair}", "${key}"]`;
                option.textContent = chart.name;
                marketPairs.appendChild(option);
            });
            console.log(`Added ${categorizedCharts[category].length} options for category ${category}.`);
        } else {
            console.log(`No data available for category: ${category}`);
        }

        // Select the first option automatically
        if (marketPairs.options.length > 0) {
            marketPairs.selectedIndex = 0;
            console.log("First option selected in #marketPairs.");
        } else {
            console.log("No options to select in #marketPairs.");
        }
    }

    // Use a uniquely named MutationObserver to detect when #markets is added to the DOM
    const marketsObserver = new MutationObserver(() => {
        const markets = document.querySelector("#markets");

        if (markets) {
            console.log("#markets element detected. Attaching change event listener.");

            // Attach the change event listener
            markets.addEventListener("change", function () {
                const selectedCategory = this.value;
                console.log("#markets value changed:", selectedCategory);
                populateMarketPairs(selectedCategory);
            });

            // Default selection and trigger
            markets.value = "Crypto"; // Set default selection to Crypto
            console.log("Default category set to Crypto.");
            populateMarketPairs("Crypto");

            // Stop observing since #markets is now handled
            marketsObserver.disconnect();
            console.log("marketsObserver disconnected.");
        }
    });

    // Observe changes in the DOM for dynamically added elements
    marketsObserver.observe(document.body, { childList: true, subtree: true });
    console.log("marketsObserver is now observing changes in the DOM.");
</script> --}}

<script>
    $(document).ready(function () {
        // Define the chart data for categories
        const charts = @json($charts);
        console.log("Charts data:", charts);

        const categorizedCharts = {
            Crypto: Object.entries(charts).slice(0, 16),
            Forex: Object.entries(charts).slice(16, 63),
            Stock: Object.entries(charts).slice(63, 90),
        };

        console.log("Categorized charts:", categorizedCharts);

        // Function to populate the #marketPairs select element
        function populateMarketPairs(category) {
            console.log("Populating marketPairs for category:", category);

            const $marketPairs = $("#marketPairs");
            if ($marketPairs.length === 0) {
                console.log("#marketPairs element not found in the DOM.");
                return;
            }

            $marketPairs.empty(); // Clear existing options
            console.log("Cleared existing options in #marketPairs.");

            if (categorizedCharts[category]) {
                categorizedCharts[category].forEach(([key, chart]) => {
                    const option = `<option value='${JSON.stringify([chart.pair, key])}'>${chart.name}</option>`;

                    $marketPairs.append(option);
                });
                console.log(`Added ${categorizedCharts[category].length} options for category ${category}.`);
            } else {
                console.log(`No data available for category: ${category}`);
            }

            // Select the first option automatically
            if ($marketPairs.children().length > 0) {
                $marketPairs.prop("selectedIndex", 0);
                console.log("First option selected in #marketPairs.");
            } else {
                console.log("No options to select in #marketPairs.");
            }
        }

        // Event delegation to handle dynamically loaded #markets dropdown
        $(document).on("change", "#markets", function () {
            const selectedCategory = $(this).val();
            console.log("#markets value changed:", selectedCategory);
            populateMarketPairs(selectedCategory);
        });

        //$("#markets").val("Crypto").trigger("change");

        /*   // Monitor the DOM for the dynamic addition of #markets dropdown
          const observer = new MutationObserver(() => {
              if ($("#markets").length > 0) {
                  console.log("#markets element detected. Setting default value and triggering change.");
  
                  // Set default selection to Crypto and trigger change
                  $("#markets").val("Crypto").trigger("change");
                  const defaultChart = JSON.stringify(["BTCUSDT", "chart_1"]);
                  $("#marketPairs").val(defaultChart).trigger("change");
  
                  // Stop observing since #markets is now handled
                  observer.disconnect();
                  console.log("Observer disconnected.");
              }
          });
  
          // Start observing the DOM for changes
          observer.observe(document.body, { childList: true, subtree: true });
          console.log("Observer is now monitoring the DOM."); */
    });

    $(document).ready(function () {
        // When the icon is clicked, trigger the modal and set the trade ID
        $('i[data-id]').on('click', function () {
            var tradeId = $(this).data('id');  // Get the trade ID from the clicked icon

            // Set the trade ID to the "Yes" button in the modal
            $('#confirmCloseTrade').data('id', tradeId);

            // Trigger the modal to open
            $('#closeTradeModal').modal('show');
        });


        // When the "Yes" button in the modal is clicked
        $('#confirmCloseTrade').on('click', function () {
            var tradeId = $(this).data('id');  // Get trade ID passed to the button

            // Send AJAX request to close the trade
            $.ajax({
                url: '/close-trade',  // The URL endpoint for your backend to handle the trade closing
                method: 'POST',
                data: {
                    trade_id: tradeId,
                    _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token for Laravel
                },
                success: function (response) {
                    // Close the modal
                    $('#closeTradeModal').modal('hide');

                    // Display a success toastr message
                    toastr.success('Trade closed successfully!');
                },
                error: function (xhr, status, error) {
                    // Handle error if needed
                    toastr.error('Error closing the trade.');
                }
            });
        });

        // When the modal is shown, set the trade ID for the confirmation button
        $('#closeTradeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var tradeId = button.data('id'); // Extract trade id from the data-id attribute
            $('#confirmCloseTrade').data('id', tradeId);  // Set the data-id on the "Yes" button
        });
    });

</script>
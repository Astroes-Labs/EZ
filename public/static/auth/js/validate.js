
    
    $('#reg_form')[0].reset();

    //signup form setup
    $('input[name=l_name]').attr("required", true);
    $('input[name=f_name]').attr("required", true);
    $('input[name=pass]').attr("required", true);
    $('#email').hide();
    $('#email1').hide();
    $('#email2').hide();
    $('#address').hide();
    $('#city').hide();
    $('#state').hide();
    $('#postcode').hide();
    $('#vgin').hide();
    $('#dl1').hide();
    $('#dl2').hide();
    $('#dob').hide();
    $('#swiftcode').hide();



    function logChange(selectElement) {
        // Get the selected value
        var selectedValue = selectElement.value;

        // Log the selected value to the console
        console.log('Selected account type:', selectedValue);
        var acctype = selectElement.value;


        // Define the data you want to populate (this could come from anywhere, e.g., a server-side variable or user input)
        var accountData = {
            first_name: "New",
            last_name: "Tester",
            email: "user@example.com",
            email1: "alternative@example.com",
            email2: "secondary@example.com",
            address: "123 Main St",
            city: "Example City",
            state: "Example State",
            postcode: "12345",
            vgin: "VG123456",
            dob: "1990-01-01",
            swiftcode: "SWIFT1234",
            password: "SWIFT1234",
            password_confirmation: "SWIFT1234"
        };


        // Check the account type and populate the corresponding fields
        if (acctype == 1 || acctype == 4) {
            // Populate fields when acctype is 1 or 4
            $('#email').show();

            $('#email1').hide();
            $('input[name=email1]').removeAttr("required");

            $('#email2').hide();
            $('input[name=email2]').removeAttr("required");

            $('#address').hide();
            $('input[name=address]').removeAttr("required");

            $('#city').hide();
            $('input[name=city]').removeAttr("required");

            $('#state').hide();
            $('input[name=state]').removeAttr("required");

            $('#postal').hide();
            $('input[name=postcode]').removeAttr("required");

            $('#vgin').hide();
            $('input[name=vgin]').removeAttr("required");

            $('#dob').show();
            $('input[name=dob]').attr("required", true);

            $('#swiftcode').hide();
            $('input[name=swiftcode]').removeAttr("required");
        }

        if (acctype == 2) {
            // Populate fields when acctype is 2
            $('#email').show();
            $('input[name=email]').attr("required", true);

            $('#email2').show();
            $('input[name=email2]').attr("required", true);

            $('#address').hide();
            $('input[name=address]').removeAttr("required");

            $('#city').hide();
            $('input[name=city]').removeAttr("required");

            $('#state').hide();
            $('input[name=state]').removeAttr("required");

            $('#postcode').hide();
            $('input[name=postcode]').removeAttr("required");

            $('#vgin').hide();
            $('input[name=vgin]').removeAttr("required");

            $('#dob').show();
            $('input[name=dob]').removeAttr("required");

            $('#swiftcode').hide();
            $('input[name=swiftcode]').removeAttr("required");
        }

        if (acctype == 3) {
            // Populate fields when acctype is 3
            $('#email').show();
            $('input[name=email]').attr("required", true);

            $('#email1').hide();
            $('input[name=email1]').removeAttr("required");

            $('#email2').hide();
            $('input[name=email2]').removeAttr("required");

            $('#address').show();
            $('input[name=address]').attr("required", true);

            $('#city').show();
            $('input[name=city]').attr("required", true);

            $('#state').show();
            $('input[name=state]').attr("required", true);

            $('#postcode').show();
            $('input[name=postcode]').attr("required", true);

            $('#vgin').show();
            $('input[name=vgin]').attr("required", true);

            $('#dob').show();
            $('input[name=dob]').attr("required", true);

            $('#swiftcode').show();
            $('input[name=swiftcode]').val(accountData.swiftcode).attr("required", true);
        }

        if (acctype == 5) {
            // Populate fields when acctype is 5
            $('#email').show();
            $('input[name=email]').attr("required", true);

            $('#email1').hide();
            $('input[name=email1]').removeAttr("required");

            $('#email2').hide();
            $('input[name=email2]').removeAttr("required");

            $('#address').show();
            $('input[name=address]').attr("required", true);

            $('#city').show();
            $('input[name=city]').attr("required", true);

            $('#state').show();
            $('input[name=state]').attr("required", true);

            $('#postcode').show();
            $('input[name=postcode]').attr("required", true);

            $('#vgin').show();
            $('input[name=vgin]').attr("required", true);

            $('#dob').show();
            $('input[name=dob]').attr("required", true);

            $('#swiftcode').hide();
            $('input[name=swiftcode]').removeAttr("required");
        }



    }




    $.urlParam = function (name, url) {
        if (!url) {
            url = window.location.href; // Default to the current URL
        }
        var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url); // Regex to find the query parameter
        if (!results) {
            return undefined; // Return undefined if no match is found
        }
        return results[1] || undefined; // Return the value or undefined if empty
    };

    // Find the refid from the URL
    var refid = $.urlParam('refid');

    // Check if refid exists and log it
    if (refid) {
        console.log('Referral ID found:', refid); // Log the refid if it exists
    } else {
        refid = 0;
        console.log('Referral ID not found, defaulting to:', refid); // Log the default value of refid
    }

    // Set the value of the hidden input field with the name 'ref' to the refid
    $('input[name=referrer]').val(refid);




    $('#reg_btn').on('click', function (e) {
        //check if three agree boxes are checked
        if ($('#agree1').prop("checked") == true && $('#agree2').prop("checked") == true && $('#agree3').prop(
            "checked") == true) {

            // alert("Checkbox is checked.");
        } else {
            event.preventDefault();
            toastr.error('*Tick all three Boxes');
        }

        // Check if the select option is not the default
        if ($('#acctype').val() === "Select Account Type") {
            event.preventDefault();  // Prevent form submission
            toastr.error('*Please select an Account Type');
        }

        // Check if the country select option is still the default disabled option
        if ($('#country').val() === "Choose Country" || $('#country').val() === "") {
            event.preventDefault();  // Prevent form submission
            toastr.error('*Please choose a country');
        }
    });

    //update photo
    $("#reg_spinner").hide();
    $("#reg_form_").on('submit', function () {
        //alert("go");
        event.preventDefault();
        $("#reg_spinner").show();

        $('#reg_btn').attr('disabled', 'disabled');
        var data = new FormData(document.getElementById("reg_form"));
        var ret = $('#acc_type').val();
        //alert(data);
        //your form ID
        $.ajax({
            type: 'POST',
            url: '/register',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            dataType: 'json',
            success: function (sata) {
                //alert(sata);
                if (sata.alert_returned == "RS") {
                    toastr.success('Account Created Successfully');
                    setTimeout(function () {
                        window.location.href = "/verify-email";
                    }, 2500);
                }

                if (sata.alert_returned == "AAE") {
                    toastr.error('*Account Already Exists');
                    $("#reg_spinner").hide();
                    $('#reg_btn').removeAttr('disabled', 'disabled');
                }

            },
            error: function (xhr, status, errorThrown) {
                // Parse the response to extract the validation errors
                var response = JSON.parse(xhr.responseText);

                $("#reg_spinner").hide();
                $('#reg_btn').removeAttr('disabled', 'disabled');
                // Check if validation errors exist
                if (response.error) {
                    var errors = response.error;

                    // Loop through the errors and display them using toastr
                    for (var field in errors) {
                        // Display each error message for a specific field
                        toastr.error(errors[field].join(', '));  // Combine multiple error messages if needed
                    }
                } else {
                    // If no validation errors are found, display a generic error message
                    toastr.error(errorThrown || 'An unexpected error occurred.');
                }
            }
        });
    });
    
    
    $("#reg_form").on('submit', function (event) {
        event.preventDefault();
        $("#reg_spinner").show();
        $('#reg_btn').attr('disabled', 'disabled');
    
        var data = new FormData(document.getElementById("reg_form"));
    
        $.ajax({
            type: 'POST',
            url: '/register',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (sata) {
                if (sata.alert_returned == "RS") {
                    toastr.success('Account Created Successfully');
                    setTimeout(function () {
                        window.location.href = "/verify-email";
                    }, 2500);
                }
    
                if (sata.alert_returned == "AAE") {
                    toastr.error('*Account Already Exists');
                    $("#reg_spinner").hide();
                    $('#reg_btn').removeAttr('disabled', 'disabled');
                }
            },
            error: function (xhr, status, errorThrown) {
                var response = JSON.parse(xhr.responseText);
                $("#reg_spinner").hide();
                $('#reg_btn').removeAttr('disabled', 'disabled');
    
                if (response.error) {
                    var errors = response.error;
                    for (var field in errors) {
                        toastr.error(errors[field].join(', '));
                    }
                } else {
                    toastr.error(errorThrown || 'An unexpected error occurred.');
                }
            }
        });
    });
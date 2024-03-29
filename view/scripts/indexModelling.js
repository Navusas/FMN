$(document).ready(function () {
    $('#pick_branch').click(function () {
        $('#houseNumber').val("Sparck Jones Building");
        $('#postcode').val("HD1 3BZ");
        $('#street').val("Firth Street");
        $('#city').val("Huddersfield");

        $('#houseNumber').prop('readonly', true);
        $('#postcode').prop('readonly', true);
        $('#street').prop('readonly', true);
        $('#city').prop('readonly', true);
        $('#confirm').prop('readonly', true);
        // $('#').val();
    });
    $('#desired_place_button').click(function () {
        $('#houseNumber').val("");
        $('#postcode').val("");
        $('#street').val("");
        $('#city').val("");

        $('#houseNumber').prop('readonly', false);
        $('#postcode').prop('readonly', false);
        $('#street').prop('readonly', false);
        $('#city').prop('readonly', false);
        $('#confirm').prop('readonly', false);
        // $('#').val();
    });

    // animate the Form address at index.php
    $('#pick_branch').click(function () {
        $('#addressFrom').animate({
            height: 'toggle'
        });
    });

    $('#desired_place_button').click(function () {
        $('#addressFrom').animate({
            height: 'show'
        });
    });
    $('#paymentCash').click(function () {
        $('#cardPayment').animate({
            height: 'toggle'
        });
    });

    $('#paymentCard').click(function () {
        $('#cardPayment').animate({
            height: 'show'
        });
    });

    function clearAddCustomerFields() {
        //name
        $('#name').val("");

        // time value form booking time
        $('#time').text("");

        // buttons
        $('input[name=payment][id=paymentCash]').prop('checked', true);
        $('input[name=time][id=time_now]').prop('checked', true);
        $('input[name=pickup][id=desired_place_button]').prop('checked', true);
        $('#priority').prop('checked', false);

        //payment details
        $('#cardNumber').val("");
        $('#cardExpiry').val("");
        $('#cardType').val("");

        //from
        $('#houseNumber').val("");
        $('#postcode').val("");
        $('#street').val("");
        $('#city').val("");

        //to
        $('#destinationHouseNo').val("");
        $('#destinationPostcode').val("");
        $('#destinationStreet').val("");
        $('#destinationCity').val("");

        // show the FROM address again
        $('#addressFrom').animate({
            height: 'show'
        });
        $('#cardPayment').animate({
           height:'hide'
        });
    }
    function clearAddDriverField() {
        //name
        $('#name').val("");

        // time value form booking time
        $('#surname').text("");
        //from
        $('#houseNumber').val("");
        $('#postcode').val("");
        $('#street').val("");
        $('#city').val("");

        //to
        $('#registration').val("");
        $('#make').val("");
        $('#model').val("");
        $('#capacity').val("");
    }
    $("#addDriverForm").validate({
        rules: {
            name: "required",
            surname: "required",
            houseNumber: "required",
            postcode: "required",
            street: "required",
            city: "required",
            registration: "required",
            make: "required",
            model: "required",
            capacity: "required"
        }
    });
    $("#addCustomerForm").validate({
        rules: {
            name: "required",
            houseNumber: "required",
            postcode: "required",
            street: "required",
            city: "required",
            toHouseNumber: "required",
            toStreet: "required",
            toCity: "required",
            toPostcode: "required"
        }
    });

    $('input[name=payment][id=paymentCash]').change(function() {
        $("#addCustomerForm").validate({
           rules: {
               cardNumber: {
                   required : false
               },
               cardExpiry: {
                   required : false
               },
               cardType: {
                   required : false
               }
           }
        });
    });
    $("#addCustomerForm").validate({
        rules: {
            name: "required",
            time: "required",
            pickup: "required",
            payment: "required",
            cardNumber: "required",
            cardType: "required",
            catdExpiry: "required",
            houseNumber: "required",
            postcode: "required",
            street: "required",
            city: "required",
            toHouseNumber: "required",
            toPostcode: "required",
            toStreet: "required",
            toCity: "required"

            // },
            // messages: {
            //     // houseNumber: ""
        }
    });
    $('#time_booking').click(function () {
        $('#time_booking').timepicker({
            'timeFormat': 'H:i',
            'scrollDefault': 'now'
        });
        // $('#time').timepicker({'timeFormat' : 'H:i'});
        // $('#time').timepicker({ 'scrollDefault': 'now'});
        $('#time_booking').timepicker('show');
        $('#time_booking').on('changeTime', function () {
            $('#time').text($(this).val());
            // $('input[value="15"][name="pickup"]')
        });
    });
    $('#time_now').click(function () {
        $('#time').text("");
    });
//    http://jonthornton.github.io/jquery-timepicker/

//    Disable checkbox before sending it to PHP file to avoid error
    // as if checkbox is not checked before submitting the form
    // it will produce an error on next page
    //
    // if (document.getElementById("priority").checked) {
    //     document.getElementById('priorityHidden').disabled = true;
    // }


//    Form modelling. Making sure Database is updated without refreshing the page


    $('#addCustomerSubmitButton').click(function () {
        if ($('#addCustomerForm').valid()) {
            var data = $("#addCustomerForm").serialize();
            $.ajax({
                data: data,
                type: "post",
                url: "../controller/AddJourney.php",
                success: function (data) {
                    if($('#hiddenAddQueue').css('display') === 'block') {
                        $('#hiddenAddQueue').css('display', 'none');
                    }
                    // display the successful div messsage container
                    $('.success-outer-div').show();

                    // set the container <p> element to the data echoed by Journey.php (from AddJourney.php)
                    $('#success-message-displayed').text(data);

                    // set timeout for displayed success message
                    setTimeout(function () {
                        $('.success-outer-div').fadeOut('fast');
                        location.reload(true);
                    }, 3000); // <-- time in milliseconds
                    clearAddCustomerFields();

                }
            });
        }
    });


    // When the user clicks anywhere  outside the 'success message' model
    // close the window
    // Get the modal
    $(document).mouseup(function (e) {
        var container = $(".success-outer-div");

        // If the target of the click isn't the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
        }
    });

    $('#addDriverButton').click(function () {
        if ($('#addDriverForm').valid()) {
            var data = $("#addDriverForm").serialize();
            $.ajax({
                data: data,
                type: "post",
                url: "../controller/AddDriver.php",
                success: function (data) {
                    if($('#hiddenAddQueue').css('display') === 'block') {
                        $('#hiddenAddQueue').css('display', 'none');
                    }
                    // display the successful div messsage container
                    $('.success-outer-div').show();

                    // set the container <p> element to the data echoed by Journey.php (from AddJourney.php)
                    $('#success-message-displayed').text(data);

                    // set timeout for displayed success message
                    setTimeout(function () {
                        $('.success-outer-div').fadeOut('fast');
                        location.reload(true);
                    }, 3000); // <-- time in milliseconds
                    clearAddDriverField();
                }
            });
        }
    });
});
$(document).ready(function() {
    $('#pick_branch').click(function() {
       $('#destinationHouseNo').val("Spärck Jones Building");
       $('#destinationPostcode').val("HD1 3BZ");
        $('#destinationStreet').val("Firth Street");
        $('#destinationCity').val("Huddersfield");

        $('#destinationHouseNo').prop('disabled',true);
        $('#destinationPostcode').prop('disabled',true);
        $('#destinationStreet').prop('disabled',true);
        $('#destinationCity').prop('disabled',true);
        $('#destinationConfirm').prop('disabled',true);
        // $('#').val();
    });
    $('#desired_place_button').click(function() {
        $('#destinationHouseNo').val("");
        $('#destinationPostcode').val("");
        $('#destinationStreet').val("");
        $('#destinationCity').val("");

        $('#destinationHouseNo').prop('disabled',false);
        $('#destinationPostcode').prop('disabled',false);
        $('#destinationStreet').prop('disabled',false);
        $('#destinationCity').prop('disabled',false);
        $('#destinationConfirm').prop('disabled',false);
        // $('#').val();
    });
    $('#pick_branch').click(function() {
       $('#addressDestination').animate({
           height: 'toggle'
       });
    });

    $('#desired_place_button').click(function() {
        $('#addressDestination').animate({
            height: 'show'
        });
    });

});
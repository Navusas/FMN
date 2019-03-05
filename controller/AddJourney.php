<?php
require_once('../model/Journey.php');

// Calculate the miles between 2 zip codes

function getDistance($start, $end) {
    // Google Map API which returns the distance between 2 postcodes
    $postcode1 = preg_replace('/\s+/', '', $start);
    $postcode2 = preg_replace('/\s+/', '', $end);
    $result    = array();

    $url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$postcode1&destinations=$postcode2&mode=driving&language=en-EN&sensor=false";

    $data   = @file_get_contents($url);
    $result = json_decode($data, true);
    print_r($result);  //outputs the array

//        return array( // converts the units
//            "meters" => $result["rows"][0]["elements"][0]["distance"]["value"],
//            "kilometers" => $result["rows"][0]["elements"][0]["distance"]["value"] / 1000,
//            "yards" => $result["rows"][0]["elements"][0]["distance"]["value"] * 1.0936133,
//            "miles" => $result["rows"][0]["elements"][0]["distance"]["value"] * 0.000621371
//        );
    return $result["rows"][0]["elements"][0]["distance"]["value"] * 0.000621371;
}


if (isset($_REQUEST)) {
    /**
     * Created by PhpStorm.
     * User: Navus
     * Date: 2019-03-04
     * Time: 14:54
     */
    $name = $_POST['name'];
    $time = $_POST['time'];
    $date = date('Y-m-d');
    if ($time == "") {
        $time = date('H:i');
    }

//core info
    $pickup = $_POST['pickup'];
    $priority = $_POST['priority'];
    $payment = $_POST['payment'];

//    card payment details
    $cardNumber =$_POST['cardNumber'];
    $cardType = $_POST['cardType'];
    $cardExpiry = $_POST['cardExpiry'];
//from address variables
    $from_houseNo = $_POST['houseNumber'];
    $from_street = $_POST['street'];
    $from_city = $_POST['city'];
    $from_postcode = $_POST['postcode'];

// destination variables
    $dest_houseNo = $_POST['toHouseNumber'];
    $dest_street = $_POST['toStreet'];
    $dest_city = $_POST['toCity'];
    $dest_postcode = $_POST['toPostcode'];

//    echo getDistance($from_postcode,$dest_postcode);


    $journey = new Journey();
    $journey->addNewJourney($time, $date, $name, $pickup, $priority, $payment, $from_houseNo, $from_street, $from_city, $from_postcode,
        $dest_houseNo, $dest_street, $dest_city, $dest_postcode);
}
?>
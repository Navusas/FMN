<?php
require_once('../model/Journey.php');

// Calculate the miles between 2 zip codes

function getDistance() {
    return rand(0,30);
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



    $journey = new Journey();
    $journey->addToQueue($time, $date, $name,50, $pickup, $priority, $payment,
        $from_houseNo, $from_street, $from_city, $from_postcode,
        $dest_houseNo, $dest_street, $dest_city, $dest_postcode);
}
?>
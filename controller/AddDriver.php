<?php
require_once('../model/Driver.php');


if (isset($_REQUEST)) {
    /**
     * Created by PhpStorm.
     * User: Navus
     * Date: 2019-03-04
     * Time: 14:54
     */
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = date('Y-m-d');
    $dob = $_POST['DOB'];
    $nin = $_POST['nin'];

    //address
    $houseNo = $_POST['houseNumber'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];

    $registration = $_POST['registration'];
    $capacity = $_POST['capacity'];
    $make = $_POST['make'];
    $model = $_POST['model'];


    $driver = new Driver();
    $driver->addDriver($name, $surname, $dob, $nin, $date,
                    $houseNo,$street,$city,$postcode,
                    $registration,$capacity,$make,$model);
}
?>
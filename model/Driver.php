<?php

include('../dao/DAO.php');

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-12
 * Time: 15:00
 */
class Driver extends DAO
{
    private $table = "driver";
    private $idField = "ID";

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function addDriver($name, $surname, $dob, $nin, $date,
                              $houseNo, $street, $city, $postcode,
                                $registration, $capacity,$make,$model)
    {
        $address = $this->addAddress($houseNo,$street,$city,$postcode);

        $vehicle = $this->addVehicle($make,$model,$registration,$capacity);

        $employee = $this->addEmployeeInfo($address,$name,$surname,$dob,$date,$nin);

        $driver = $this->addDriverItself($employee,$vehicle);

        echo "Driver added successfully!";
    }

    public function addDriverItself($employeeID,$vehicleID)
    {
        $table = 'driver';
        $lastID = $this->getLastID($table, $this->idField) + 1;
        $sqlQuery = 'INSERT INTO ' . $table .
                ' VALUES(' . $lastID . ',' .$employeeID .',' . $vehicleID . ',1)';
        $result = parent::query($sqlQuery);
        return $result;
    }

    public function addEmployeeInfo($addressID,$name,$surname,$dob,$date,$nin)
    {
        $table = 'employee';
        $lastID = $this->getLastID($table, $this->idField) + 1;
        $sqlQuery = 'INSERT INTO ' . $table .
            ' VALUES(' . $lastID . ',"' . $addressID . '","' . $name . '","' . $surname . '","' .
            $dob . '","' . $date . '","' . $nin . '","", "Driver")';
        $result = parent::query($sqlQuery);
        if($result == true) return $lastID;
        else return -1;
    }

    public function addVehicle($make, $model, $reg, $capcaity)
    {
        $table = 'vehicle';
        $lastID = $this->getLastID($table, $this->idField) + 1;
        $sqlQuery = 'INSERT INTO ' . $table .
            ' VALUES(' . $lastID . ',"' . $reg . '","' . $make . '","' . $model . '","' .
            $capcaity . '")';
        $result = parent::query($sqlQuery);
        if($result == true) return $lastID;
        else return -1;
    }
    public function addAddress($houseNumber,$street,$city,$postcode) {
        $table = 'address';
        $county = "Yorkshire";
        $lastID = $this->getLastID($table, $this->idField) + 1;
        $sqlQuery = 'INSERT INTO ' . $table .
            ' VALUES(' . $lastID . ',"' . $houseNumber . '","' . $street . '","' . $city . '","' .
            $county . '","' . $postcode .'")';
        $result = parent::query($sqlQuery);
        if($result == true) return $lastID;
        else return -1;
    }

    public function getLastID($table, $idField)
    {
//        $query = 'SELECT ID FROM journey ORDER BY ID DESC LIMIT 1';

        $result = parent::query('SELECT ' . $idField .
            ' FROM ' . $table .
            ' ORDER BY ' . $idField .
            ' DESC LIMIT 1')->fetch_assoc();

        if ($result >= 0) {
            return $result['ID'];
        } else return 0;
    }
}
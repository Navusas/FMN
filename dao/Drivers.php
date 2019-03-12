<?php
require 'DAO.php';

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-01-28
 * Time: 15:31
 */
class Drivers extends DAO
{
    private $table = "driver";
    private $idFieldName = 'ID';

    public function __construct()
    {
        // establish connection
        parent::__construct($this->table);
        $message = "Connection between PHP and MySQL is succesfull!." .
                    "You can start retrieving data";
//        echo "<script type='text/javascript'>alert('$message');</script>";

    }

    public function getByID($id)
    {
        return parent::query('SELECT * FROM ' . $this->table . ' WHERE ' . $this->idFieldName . ' = ' . $id)->fetch_object();

    }

    public function getAll()
    {
        return parent::getAll();
    }
    public function getVehicle($vehicleID) {
        $table = 'vehicle';
        $result = parent::query('SELECT *
                                      FROM ' . $table .  '
                                      WHERE ' . $this->idFieldName. ' = ' . $vehicleID)->fetch_object()  or die(parent::getConnection()->getConnection()->error);
        return $result;
    }
    public function getEmployeeInfo($employee_id)
    {
        $table = 'employee';
        $result = parent::query('SELECT *
                                      FROM ' . $table . '
                                      WHERE ' . $this->idFieldName. ' = ' . $employee_id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        return $result;
    }

    public function isAvailable($driverID) {
        $result = parent::query('SELECT Available
                                      FROM ' . $this->table . '
                                      WHERE ' . $this->idFieldName. ' = ' . $driverID)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        if($result->Available == 1) {
            return "Yes";
        }
        else return "No";
    }

}

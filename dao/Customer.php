<?php
include('DAO.php');
/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-11
 * Time: 14:40
 */

class Customer extends DAO
{
    private $table = "registeredcustomer";
    private $idFieldName = 'ID';

    public function __construct()
    {
        // establish connection
        parent::__construct($this->table);
        $message = "Connection between PHP and MySQL is succesfull!." .
            "You can start retrieving data";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
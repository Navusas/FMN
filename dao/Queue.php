<?php
require 'DAO.php';

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-01-28
 * Time: 15:31
 */
class Queue extends DAO
{
    private $table = "queue";
    private $journeyID = "JourneyID";
    private $customerID = "CustomerID";
    private $idFieldName = 'ID';

    public function __construct()
    {
        // establish connection
        parent::__construct($this->table);
//        $message = "Connection between PHP and MySQL is succesfull!." .
//            "You can start retrieving data";
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
    public function getJourney($journeyID) {
        $table = "journey";
        $result = parent::query('SELECT ' . $table . '.*' .
                                    ' FROM ' . $table . '
                                    INNER JOIN queue
                                    ON '. $table.'.ID = queue.'. $this->journeyID .
                                    ' AND ' . $table. '.ID = ' .$journeyID)->fetch_array();
        return $result;
    }
    public function getCustomer($customerID) {
        $table = "customer";
        $result = parent::query('SELECT ' . $table . '.*' .
                                    ' FROM ' . $table . '
                                    INNER JOIN queue
                                    ON '. $table.'.ID = queue.'. $this->customerID .
                                    ' AND ' . $table. '.ID = ' .$customerID)->fetch_array();
        return $result;
    }
    public function isCompleted($queueID) {
        return parent::query('SELECT completed
                                   FROM ' . $this->table .
                                    ' WHERE ID=' . $queueID )->fetch_row();
    }
    public function isDriverAssigned($queueID) {
        $result = parent::query('SELECT isDriverAssigned
                                   FROM ' . $this->table .
                                 ' WHERE ID=' . $queueID )->fetch_array();
        // if driver is assigned
        if($result['isDriverAssigned'] == 1) {
            return "Yes";
        }
        else {
            return "No";
        }
    }
}
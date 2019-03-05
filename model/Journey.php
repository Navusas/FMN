<?php
require_once '../dao/DAO.php';
/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-04
 * Time: 15:41
 */
class Journey extends DAO {
    private $table = "journey";
    private $idField = "ID";
    public function __construct()
    {
        parent::__construct($this->table);
    }
    public function addNewJourney($time,$date, $pickup, $priority, $payment, $from_houseNo,$from_street,$from_city,$from_postcode,
                                  $dest_houseNo,$dest_street,$dest_city,$dest_postcode) {
        $from = $from_houseNo . ", " . $from_street . ", ". $from_city . ", " . $from_postcode;
        $to = $dest_houseNo . ", " . $dest_street . ", ". $dest_city . ", " . $dest_postcode;
        $newID = $this->getLastID()+1;
//        echo "_____________________    " . $newID ."_____________________    ";
        $query = 'INSERT INTO ' . $this->table . ' VALUES(' . $newID . ',"' . $from . '","' . $to . '",' .
            50 . ',"' . $date . '",TIME("' . $time .'"))';

        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
        if ($result >= 0) {
            echo ("New Journey Added Successfully!");

//            echo "The Booking has been made for: " . $time . " " . $date .
//                "From: " . $from .
//                "To: " . $to;
        }
        else echo "Unexpected Error Occurred. Booking have not been made!";
    }
    public function getLastID() {
//        $query = 'SELECT ID FROM journey ORDER BY ID DESC LIMIT 1';
         parent::query('SELECT ' . $this->idField .
                                ' FROM ' . $this->table .
                                ' ORDER BY ' . $this->idField .
                                ' DESC LIMIT 1')->fetch_object()
                                or die(parent::getConnection()->getConnection()->error);
        $result = parent::query('SELECT ' . $this->idField .
            ' FROM ' . $this->table .
            ' ORDER BY ' . $this->idField .
            ' DESC LIMIT 1')->fetch_assoc()
        or die(parent::getConnection()->getConnection()->error);
        return $result['ID'];
    }
}

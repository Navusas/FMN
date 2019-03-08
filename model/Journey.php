<?php
require_once '../dao/DAO.php';
/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-04
 * Time: 15:41
 */
class Journey extends DAO {
    private $table = "queue";
    private $idField = "ID";
    private $pricePerMile = 0.5;
    public function __construct()
    {
        parent::__construct($this->table);
    }
    public function addToQueue($time,$date, $name, $miles, $pickup, $priority, $payment,
                                  $from_houseNo,$from_street,$from_city,$from_postcode,
                                  $dest_houseNo,$dest_street,$dest_city,$dest_postcode) {

        $from = $from_houseNo . ", " . $from_street . ", ". $from_city . ", " . $from_postcode;
        $to = $dest_houseNo . ", " . $dest_street . ", ". $dest_city . ", " . $dest_postcode;

        $lastID = $this->getLastID($this->table, $this->idField)+1;

        // add a Journey FIrst
        $journeyID = $this->addJourney($miles,$date,$time,$from,$to,$priority);
        // Make a relationship between payment and Journey
//        $paymentQuery = $this->addPayment($journeyID, $miles, $date, $payment);

        if (1) {
            echo "New Journey Added Successfully!";

//            echo "The Booking has been made for: " . $time . " " . $date .
//                "From: " . $from .
//                "To: " . $to;
        }
        else echo "Unexpected Error Occurred. Booking have not been made!";
    }
    private function addJourney($miles, $date, $time, $from, $to, $priority) {
        $table = "journey";
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
                ' VALUES(' . $lastID . ',' . $miles . ',"' . $date . '",TIME("' . $time .'")), "' .
                        $from . '","' . $to  . '",' . $priority . ')';
        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
        if($result >= 0) {
            return $lastID;
        }
        else return -1;
    }
    private function addPayment($journeyID,$miles, $date,$paymentType) {
        $table = "payment";
        $amountToPay = $miles * $this->pricePerMile;
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
                ' VALUES(' . $lastID . ',' . $journeyID . ',' . $amountToPay . ',"' . $date . '",(' .
                'SELECT ' . $this->idField .
                'FROM paymenttype' .
                'WHERE Description = ' . $paymentType . '));';
        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
        if($result >= 0) {
            return true;
        }
        else return false;
    }
    public function getLastID($table, $idField) {
//        $query = 'SELECT ID FROM journey ORDER BY ID DESC LIMIT 1';
         parent::query('SELECT ' . $idField .
                                ' FROM ' . $table .
                                ' ORDER BY ' . $idField .
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

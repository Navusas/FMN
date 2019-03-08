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
    public function addToQueue($time,$date, $name, $miles, $priority, $payment,
                                  $from_houseNo,$from_street,$from_city,$from_postcode,
                                  $dest_houseNo,$dest_street,$dest_city,$dest_postcode,
                                  $cardNumber, $cardType, $cardExpiry) {

        // Concatenate addresses into 1 string name
        $from = $from_houseNo . ", " . $from_street . ", ". $from_city . ", " . $from_postcode;
        $to = $dest_houseNo . ", " . $dest_street . ", ". $dest_city . ", " . $dest_postcode;

        // add a Journey FIrst
        $journeyID = $this->addJourney($miles,$date,$time,$from,$to,$priority);
        // Make a relationship between payment and Journey
        $paymentQuery = $this->addPayment($journeyID, $miles, $date, $payment);

        // add a Customer
        $newCustomer = $this->addCustomer($name);

        if($payment == "Card") {
            $this->addCardPayment($paymentQuery, $cardNumber,$cardType,$cardExpiry);
        }
        else {
            $this->addCashPayment($paymentQuery);
        }
        if ($paymentQuery == true && $newCustomer == true) {
            echo "New Journey Added Successfully!";

//            echo "The Booking has been made for: " . $time . " " . $date .
//                "From: " . $from .
//                "To: " . $to;
        }
        else echo "Unexpected Error Occurred. Booking have not been made!";
    }
    private function addCardPayment($paymentID,$cardNumber,$cardType,$cardExpiry) {
        $table = "cardpayment";
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
                 ' VALUES(' . $lastID .',' . $paymentID . ',"' . $cardNumber .
                    '","' . $cardType . '","' . $cardExpiry . '");';
        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
    }
    private function addCashPayment($paymentID) {
        $table = "cashpayment";
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
            ' VALUES(' . $lastID .',' . $paymentID . ');';
        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);

    }
    private function addJourney($miles, $date, $time, $from, $to, $priority) {
        $table = "journey";
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
                ' VALUES(' . $lastID . ',' . $miles . ',"' . $date . '",TIME("' . $time .'"), "' .
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
                ' SELECT ID ' .
                ' FROM typeofpayment'  .
                ' WHERE Description = "' . $paymentType . '"));';
        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
        if($result >= 0) {
            return $lastID;
        }
        else return -1;
    }
    public function addCustomer($name) {
        $table = "customer";
        $lastID = $this->getLastID($table, $this->idField)+1;
        $query = 'INSERT INTO ' . $table .
            ' VALUES(' . $lastID . ',"' . $name . '", (' .
            'SELECT ' . $this->idField .
            ' FROM customertype' .
            ' WHERE Description = "Branch"));';

        $result = parent::query($query) or die(parent::getConnection()->getConnection()->error);
        if($result >= 0) {
            return true;
        }
        else return false;
    }
    public function getLastID($table, $idField) {
//        $query = 'SELECT ID FROM journey ORDER BY ID DESC LIMIT 1';

        $result = parent::query('SELECT ' . $idField .
            ' FROM ' . $table .
            ' ORDER BY ' . $idField .
            ' DESC LIMIT 1')->fetch_assoc();

        if($result >=0) {
            return $result['ID'];
        }
        else return 0;
    }
}

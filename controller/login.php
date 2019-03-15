<?php
include('../dao/DAO.php');
class Login extends DAO {

	private $table = "registeredcustomer";
    private $idField = "ID";

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function confirmUser($username,$password) {
    	$sqlQuery = 'SELECT * FROM ' . $this->table . ' WHERE Email = "' . $username . '"';
    	$result = parent::query($sqlQuery)->fetch_object();
    	$email = $result->Email;
    	$pass = $result->Password;
    	if($result==true) {
            if($email == $username && $password == $password) {
                echo true;
            }
            else echo false;
        }
    }
}

?>
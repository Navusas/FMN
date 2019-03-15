<?php
include('login.php');

$username = $_POST['username'];
$password = $_POST['password'];


$conn = new Login();
$conn->confirmUser($username,$password);
?>
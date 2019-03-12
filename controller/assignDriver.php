<?php
include_once ('../model/QueueModel.php');

$driverID = $_POST['driverID'];
$queueID = $_POST['queueID'];

$queueModel = new QueueModel();
$queueModel->assignDriver($driverID,$queueID);
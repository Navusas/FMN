<?php
include_once ('../model/QueueModel.php');

$queueID = $_POST['queueID'];

//echo $queueID;
$queueModel = new QueueModel();
$queueModel->unassignDriver($queueID);

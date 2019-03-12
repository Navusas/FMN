<?php
include_once ('../model/QueueModel.php');

$var = $_POST['ID'];

$queue = new QueueModel();
$queue->deleteQueueRow($var);


echo "YES";
/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-11
 * Time: 21:01
 */
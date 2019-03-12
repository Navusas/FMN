<?php
include_once('../dao/DAO.php');

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-03-11
 * Time: 21:21
 */
class QueueModel extends DAO
{
    private $table = "queue";
    private $journeyID = "JourneyID";
    private $customerID = "CustomerID";
    private $idFieldName = 'ID';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function deleteQueueRow($id)
    {
        $sqlQuery = 'DELETE FROM ' . $this->table .
            ' WHERE ' . $this->idFieldName . ' = ' . $id . ';';
        $result = parent::query($sqlQuery) or die($this->getConnection()->getConnection()->error);
        $driverUnassigned = $this->clearAssignedDriver($id);
        return $result && $driverUnassigned;
    }

    public function clearAssignedDriver($id)
    {
        $table = 'assigndriver';
        $queueFieldID = 'queueID';

        $sqlQuery = 'DELETE FROM ' . $table .
            ' WHERE ' . $queueFieldID . ' = ' . $id . ';';
        $result = parent::query($sqlQuery) or die($this->getConnection()->getConnection()->error);
        $this->setDriverAvailable($id);
        return $result;
    }

    public function assignDriver($driverID, $queueID)
    {
        $table = 'assigndriver';
        $sqlQuery = 'INSERT INTO ' . $table .
            ' VALUES(' . $driverID . ',' . $queueID . ')';
        echo $sqlQuery;
        $result = parent::query($sqlQuery);
        if($result==true) {
            $this->setDriverUnavailable($driverID);
            return true;
        }
        else {
            return false;
        }
    }

    public function setDriverUnavailable($driverID)
    {
        $table = 'driver';
        $sqlQuery = 'UPDATE ' . $table . ' SET Available = 0 WHERE ID = ' . $driverID;
        $result = parent::query($sqlQuery) or die($this->getConnection()->getConnection()->error);
        return $result;
    }

    public function unassignDriver($queueID)
    {
        $table = 'assigndriver';
        $sqlQuery = 'SELECT driverID FROM ' . $table . ' WHERE queueID = ' . $queueID;
        $driverID = parent::query($sqlQuery)->fetch_object();
        $sqlQuery = 'DELETE FROM ' . $table .
            ' WHERE queueID = ' . $queueID;
        $result = parent::query($sqlQuery);
        if($result==true) {
            $this->setDriverAvailable($driverID->driverID);
            return true;
        }
        else {
            return false;
        }
    }

    public function setDriverAvailable($driverID)
    {
        $table = 'driver';
        $sqlQuery = 'UPDATE ' . $table . ' SET Available = 1 WHERE ID = ' . $driverID;
        $result = parent::query($sqlQuery) or die($this->getConnection()->getConnection()->error);
        return $result;
    }
}
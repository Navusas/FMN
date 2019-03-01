<?php
require 'connect_init.php';

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-01-29
 * Time: 13:22
 */
class DAO extends Connection {

    private $table;
    private $connection;

    public function __construct($table)
    {
        $this->connection = parent::__construct();
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = '`' . $table . '`';
    }

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->connection;
    }

    public function getAll()
    {
        $films = array();
        $result = parent::query('SELECT * FROM ' . $this->table);
        while ($record = $result->fetch_object()) {
            array_push($films, $record);
        }
        return $films;
    }
}
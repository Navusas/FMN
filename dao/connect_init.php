<?php

class Connection
{
//    Parameters to connect to database
    private $connection;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "taxifriend";

    public function __construct()
    {
//      Connect to server
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
//      Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql) or die($this->connection->error);
        if ($result === FALSE) {
            echo "Query went wrong ! " . $this->connection->error;
        } else {
            return $result;
        }
    }

}

?>
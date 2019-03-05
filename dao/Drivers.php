<?php
require 'DAO.php';

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-01-28
 * Time: 15:31
 */
class Drivers extends DAO
{
    private $table = "driver";
    private $idFieldName = 'ID';

    public function __construct()
    {
        // establish connection
        parent::__construct($this->table);
        $message = "Connection between PHP and MySQL is succesfull!." .
                    "You can start retrieving data";
//        echo "<script type='text/javascript'>alert('$message');</script>";

    }

    public function getByID($id)
    {
        return parent::query('SELECT * FROM ' . $this->table . ' WHERE ' . $this->idFieldName . ' = ' . $id)->fetch_object();

    }

    public function getAll()
    {
        return parent::getAll();
    }
    public function getVehicle($employee_id) {
        $table = 'vehicle';
        $result = parent::query('SELECT *
                                      FROM ' . $table .  '
                                      WHERE Driver_ID = ' . $employee_id)->fetch_object()  or die(parent::getConnection()->getConnection()->error);
        return $result;
    }
    public function getEmployeeInfo($employee_id)
    {
        $table = 'employee';
        $result = parent::query('SELECT *
                                      FROM ' . $table . '
                                      WHERE ID = ' . $employee_id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        return $result;
    }

    public function isAvailable($employee_id) {
        $result = parent::query('SELECT available
                                      FROM ' . $this->table . '
                                      WHERE ID = ' . $employee_id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        if($result === 0) {
            return "YES";
        }
        else return "NO";
    }

}
//    public function outputAll()
//    {
//        $result = $this->getAll();
//        if ($result->num_rows > 0) {
//            echo "<table><tr> <th>ID</th><th>Film Title</th><th>Film Description</th></tr>";
//            while ($row = $result->fetch_assoc()) {
//                echo "<tr><td>" . $row["filmid"] . "</td><td>" . $row["filmtitle"] . "</td><td>" . $row["filmdescription"] . "</td></tr>";
//            }
//            echo "</table>";
//        } else {
//            echo "0 results";
//        }
//    }
//
//    public function getTitleById($id)
//    {
//        $result = parent::query('SELECT filmtitle
//                                      FROM ' . $this->table .  '
//                                      WHERE ' . $this->idFieldName  . ' = ' . $id)->fetch_object()  or die(parent::getConnection()->getConnection()->error);
//        return $result->filmtitle;
//    }
//
//    public function getDescriptionById($id)
//    {
//        $result =  parent::query('SELECT filmdescription
//                                       FROM ' . $this->table  . '
//                                       WHERE ' . $this->idFieldName  . ' = ' . $id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
//        return $result->filmdescription;
//    }
//
//    public function getRatingById($id)
//    {
//        $result = parent::query('SELECT filmrating
//                        FROM fss_rating R, fss_film F
//                        WHERE R.ratid = F.ratid
//                        AND F.filmid = ' . $id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
//        return $result->filmrating;
//    }
//    public function getNum_Row() {
//        $films = parent::getAll();
//        return sizeof($films);
//    }
//}

<?php
require 'DAO.php';

/**
 * Created by PhpStorm.
 * User: Navus
 * Date: 2019-01-28
 * Time: 15:31
 */
class Films extends DAO
{
    private $table = "fss_film";
    private $idFieldName = 'filmid';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getByID($id)
    {
        return parent::query('SELECT * FROM ' . $this->table . ' WHERE ' . $this->idFieldName  . ' = ' . $id)->fetch_object();

    }

    public function getAll()
    {
        return parent::getAll();
    }

    public function outputAll()
    {
        $result = $this->getAll();
        if ($result->num_rows > 0) {
            echo "<table><tr> <th>ID</th><th>Film Title</th><th>Film Description</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["filmid"] . "</td><td>" . $row["filmtitle"] . "</td><td>" . $row["filmdescription"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    public function getTitleById($id)
    {
        $result = parent::query('SELECT filmtitle
                                      FROM ' . $this->table .  '
                                      WHERE ' . $this->idFieldName  . ' = ' . $id)->fetch_object()  or die(parent::getConnection()->getConnection()->error);
        return $result->filmtitle;
    }

    public function getDescriptionById($id)
    {
        $result =  parent::query('SELECT filmdescription
                                       FROM ' . $this->table  . '
                                       WHERE ' . $this->idFieldName  . ' = ' . $id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        return $result->filmdescription;
    }

    public function getRatingById($id)
    {
        $result = parent::query('SELECT filmrating
                        FROM fss_rating R, fss_film F
                        WHERE R.ratid = F.ratid
                        AND F.filmid = ' . $id)->fetch_object() or die(parent::getConnection()->getConnection()->error);
        return $result->filmrating;
    }
    public function getNum_Row() {
        $films = parent::getAll();
        return sizeof($films);
    }
}

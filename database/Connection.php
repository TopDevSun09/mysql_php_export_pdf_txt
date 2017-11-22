<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/7/2017
 * Time: 11:35 AM
 */

include '../../config/constants.php';

class Connection
{

    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;

    public function openConnection()
    {
        try
        {
            $this->conn = new PDO(DB_DSN, DB_USER,DB_PASS,$this->options);
            return $this->conn;
        }
        catch (PDOException $e)
        {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }


}
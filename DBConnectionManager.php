<?php

class DBConnectionManager
{

    private $host = "localhost:3307";
    private $db_name = "bdtuzos";
    private $db_user = "root";
    private $db_pass = "uri2808X";
    private $connection;

    public function openConnect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db_name;charset = UTF-8", $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $th) {
            die($th->getMessage());
        }
        return null;
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}

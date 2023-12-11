<?php

class DB
{
    public $conn;

    private static $hostname = "localhost";
    private static $username = "homestead";
    private static $database = "g5";
    private static $password = "secret";

    private $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->conn = new mysqli(self::$hostname, self::$username, self::$password, self::$database);
    }


    public function selectAll()
    {
        $query = "SELECT * FROM $this->table";
        $db = $this->conn->query($query);
        $results = [];
        while ($row = $db->fetch_object()) {
            $results[] = $row;
        }

        return $results;
    }

    public function selectOne($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=$id";
        return mysqli_fetch_object($this->conn->query($query));
    }

    public function deleteRow($id)
    {
        $query = "DELETE FROM $this->table WHERE id=$id";
        return  $this->conn->query($query);
    }

    public function insertRow($data)
    {
        $keys = '';
        $values = '';
        foreach ($data as $key => $value) {
            $keys .= $key . ', ';
            $values .= "'$value', ";
        }

        $keys = substr($keys, 0, -2);
        $values = substr($values, 0, -2);


        $query = "INSERT INTO $this->table ($keys) VALUES ($values)";
        return $this->conn->query($query);

    }


    public function updateRow($data, $id)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key='$value', ";
        }

        $set = substr($set, 0, -2);
        $query = "UPDATE $this->table SET $set WHERE id=$id";
        return $this->conn->query($query);
    }


}
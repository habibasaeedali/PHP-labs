<?php

$dbhost   = "localhost";
$dbType   = "mysql";
$dbName   = "iti_sm_php_g2_2026";
$userName = "root";
$password = "";

session_start();


class DB
{
    protected $dbhost;
    protected $dbType;
    protected $dbName;
    protected $userName;
    protected $password;
    protected $connection;

    function __construct($host, $type, $dbname, $password, $uName)
    {
        $this->dbhost   = $host;
        $this->dbType   = $type;
        $this->dbName   = $dbname;
        $this->userName = $uName;
        $this->password = $password;

        $this->connection = new PDO(
            "$this->dbType:host=$this->dbhost;dbname=$this->dbName",
            $this->userName,
            $this->password
        );
       

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function index($table)
    {
        try {
            $query    = "SELECT * FROM `$table`";
            $sqlQuery = $this->connection->prepare($query);
            $sqlQuery->execute();
            return $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

    function show($table, $idColumn, $id)
    {
        try {
            $query    = "SELECT * FROM `$table` WHERE `$idColumn` = :id";
            $sqlQuery = $this->connection->prepare($query);
            $sqlQuery->execute([":id" => $id]);
            return $sqlQuery->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function create($table, $data)
    {
        try {
            $columns      = array_keys($data);
            $placeholders = array_map(fn($c) => ":$c", $columns);

            $query = "INSERT INTO `$table` (`" . implode('`,`', $columns) . "`)
                      VALUES (" . implode(',', $placeholders) . ")";

            $sqlQuery = $this->connection->prepare($query);

            $params = [];
            foreach ($data as $key => $value) {
                $params[":$key"] = $value;
            }

            return $sqlQuery->execute($params);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function update($table, $idColumn, $id, $data)
    {
        try {
            $setParts = [];
            foreach (array_keys($data) as $column) {
                $setParts[] = "`$column` = :$column";
            }

            $query = "UPDATE `$table` SET " . implode(',', $setParts) . " WHERE `$idColumn` = :id";
            $sqlQuery = $this->connection->prepare($query);

            $params = [];
            foreach ($data as $key => $value) {
                $params[":$key"] = $value;
            }
            $params[":id"] = $id;

            return $sqlQuery->execute($params);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function delete($table, $idColumn, $id)
    {
        try {
            $query    = "DELETE FROM `$table` WHERE `$idColumn` = :id";
            $sqlQuery = $this->connection->prepare($query);
            return $sqlQuery->execute([":id" => $id]);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function findOne($table, $column, $value)
    {
        try {
            $query    = "SELECT * FROM `$table` WHERE `$column` = :value";
            $sqlQuery = $this->connection->prepare($query);
            $sqlQuery->execute([":value" => $value]);
            return $sqlQuery->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

$db = new DB($dbhost, $dbType, $dbName, $password, $userName);

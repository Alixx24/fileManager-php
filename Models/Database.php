<?php

namespace Models;


class Database
{
    private $host = 'localhost';
    private $username = 'admint';
    private $password = '12345678';
    private $database = 'ooplogin_dbs';
    private $connection;
    public function __construct()
    {
        $this->connection = new \mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die('Connection Failed: ' . $this->connection->connect_error);
        }
        

    }

    public function __destruct()
    {
        $this->connection->close();
    }

    protected function executeStatement($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            die("Error in preparing Statement: " . $this->connection->error);
        }
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt;
    }
}


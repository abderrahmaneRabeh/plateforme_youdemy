<?php

namespace Classes;

use PDO;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=youdemy_db';
        $username = 'root';
        $password = '';
        $this->connection = new PDO($dsn, $username, $password);
        echo "Connected successfully";
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = (new Database())->getConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}

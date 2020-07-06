<?php

namespace Core;

class Database
{
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'workproject';

    public function __construct()
    {
        $this->conn = new \PDO(
            "mysql:host={$this->host};
            dbname={$this->dbname}",
            $this->user,
            $this->pass,
            array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

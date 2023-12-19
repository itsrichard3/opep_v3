<?php

define('DB_HOST', 'localhost');

define('DB_NAME', 'opep_v2');

define('DB_USER', 'root');

define('DB_PASS', '');


class Database {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=opepv2', DB_USER, DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "gooood";
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}


?>
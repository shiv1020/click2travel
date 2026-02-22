<?php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = getenv("DB_HOST") ?: "localhost";
        $db   = getenv("DB_NAME") ?: "click2travel";
        $user = getenv("DB_USER") ?: "root";
        $pass = getenv("DB_PASS") ?: "";

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
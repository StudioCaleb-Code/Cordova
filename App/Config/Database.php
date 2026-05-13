<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host;
    private $port;
    private $db_name;
    private $user;
    private $pass;

    public function __construct() {
        // Jalamos del .env de Railway
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->db_name = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->pass = getenv('DB_PASSWORD');
    }

    public function getConnection() {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8";
            $conn = new PDO($dsn, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Error conectando a Railway: " . $e->getMessage());
        }
    }
}
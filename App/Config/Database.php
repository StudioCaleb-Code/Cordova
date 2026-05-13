<?php
namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $port;
    private $db_name;
    private $user;
    private $pass;

    public function __construct()
    {
        // Intentamos leer el nombre de Railway (MYSQLHOST) o el tuyo (DB_HOST)
        $this->host = getenv('MYSQLHOST') ?: getenv('DB_HOST');
        $this->port = getenv('MYSQLPORT') ?: getenv('DB_PORT');
        $this->db_name = getenv('MYSQLDATABASE') ?: getenv('DB_NAME');
        $this->user = getenv('MYSQLUSER') ?: getenv('DB_USER');
        $this->pass = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD');
    }

    public function getConnection()
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8";
            $conn = new PDO($dsn, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error conectando a Railway: " . $e->getMessage());
        }
    }
}
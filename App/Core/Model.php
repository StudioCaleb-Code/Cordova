<?php
namespace App\Core;
use App\Config\Database;

class Model {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
}
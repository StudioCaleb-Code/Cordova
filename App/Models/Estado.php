<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Estado extends Model
{
    /**
     * Obtiene todos los estados disponibles para los diseños
     */
    public function getAll()
    {
        $sql = "SELECT * FROM estado ORDER BY id_estado ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
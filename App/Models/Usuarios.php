<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Usuarios extends Model
{
    public function getUserByEmail($correo)
    {
        // Usamos id_usuario, correo y password según tu SQL
        $sql = "SELECT u.*, r.tipo_rol 
                FROM usuario u 
                INNER JOIN rol r ON u.id_rol = r.id_rol 
                WHERE u.correo = :correo AND u.estado = 1 
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':correo' => $correo]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
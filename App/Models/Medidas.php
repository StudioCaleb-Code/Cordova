<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Medidas extends Model
{
    public function getAll()
    {
        // Corregido a "medidas" según tu SQL
        $sql = "SELECT * FROM medidas ORDER BY tipo_medida ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM medidas WHERE id_medida = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO medidas (tipo_medida, precio) VALUES (:tipo, :precio)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':tipo' => $data['tipo_medida'],
            ':precio' => $data['precio']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE medidas SET tipo_medida = :tipo, precio = :precio WHERE id_medida = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':tipo' => $data['tipo_medida'],
            ':precio' => $data['precio'],
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM medidas WHERE id_medida = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Materiales extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM material ORDER BY id_material DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM material WHERE id_material = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO material (tipo_material) VALUES (:nom)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nom' => $data['tipo_material']]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE material SET tipo_material = :nom WHERE id_material = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nom' => $data['tipo_material'], ':id' => $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM material WHERE id_material = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Categorias extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM categoria ORDER BY id_categoria DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categoria WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO categoria (tipo_categoria) VALUES (:nom)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nom' => $data['tipo_categoria']]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE categoria SET tipo_categoria = :nom WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':nom' => $data['tipo_categoria'], ':id' => $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categoria WHERE id_categoria = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
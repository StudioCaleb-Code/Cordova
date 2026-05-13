<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Clientes extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM cliente WHERE id_cliente = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO cliente (dni, nombres, apellidoP, apellidoM, telefono, direccion) 
                VALUES (:dni, :nom, :apP, :apM, :tel, :dir)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':dni' => $data['dni'],
            ':nom' => $data['nombres'],
            ':apP' => $data['apellidoP'],
            ':apM' => $data['apellidoM'],
            ':tel' => $data['telefono'],
            ':dir' => $data['direccion']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE cliente SET dni = :dni, nombres = :nom, apellidoP = :apP, 
                apellidoM = :apM, telefono = :tel, direccion = :dir 
                WHERE id_cliente = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute([
            ':dni' => $data['dni'],
            ':nom' => $data['nombres'],
            ':apP' => $data['apellidoP'],
            ':apM' => $data['apellidoM'],
            ':tel' => $data['telefono'],
            ':dir' => $data['direccion'],
            ':id'  => $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM cliente WHERE id_cliente = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
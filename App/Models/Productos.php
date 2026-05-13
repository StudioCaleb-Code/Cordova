<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Productos extends Model
{
    public function getAll()
    {
        // Traemos 'foto' y el 'precio' desde la tabla medidas
        $sql = "SELECT p.*, c.tipo_categoria, m.precio, m.tipo_medida
                FROM producto p
                LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
                LEFT JOIN medidas m ON p.id_medida = m.id_medida
                ORDER BY p.id_producto DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, c.tipo_categoria, m.precio 
                FROM producto p
                LEFT JOIN categoria c ON p.id_categoria = c.id_categoria 
                LEFT JOIN medidas m ON p.id_medida = m.id_medida
                WHERE p.id_producto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        // Agregamos el campo 'imagen' en el SQL
        $sql = "INSERT INTO producto (id_categoria, nombre, descripcion, precio, stock, imagen) 
                VALUES (:id_cat, :nom, :desc, :pre, :stk, :img)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_cat' => $data['id_categoria'],
            ':nom' => $data['nombre'],
            ':desc' => $data['descripcion'],
            ':pre' => $data['precio'],
            ':stk' => $data['stock'],
            ':img' => $data['imagen'] // Agregado
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE producto SET 
                id_categoria = :id_cat, 
                nombre = :nom, 
                descripcion = :desc, 
                precio = :pre, 
                stock = :stk,
                imagen = :img 
                WHERE id_producto = :id";
        $params = array_merge($data, [':id' => $id]);
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
}
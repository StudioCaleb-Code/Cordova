<?php
namespace App\Models;
use App\Core\Model;
use PDO;

class Diseno extends Model
{
    public function getAll()
    {
        $sql = "SELECT d.*, u.nombres as autor, e.tipo_estado 
                FROM diseno d
                JOIN usuario u ON d.id_usuario = u.id_usuario
                JOIN estado e ON d.id_estado = e.id_estado
                ORDER BY d.fecha_creacion DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM diseno WHERE id_diseno = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar($data)
    {
        $sql = "INSERT INTO diseno (id_usuario, id_estado, foto, nombre, descripcion) 
                VALUES (:id_u, :id_e, :foto, :nom, :des)";
        return $this->db->prepare($sql)->execute([
            ':id_u' => $data['id_usuario'],
            ':id_e' => $data['id_estado'],
            ':foto' => $data['foto'],
            ':nom' => $data['nombre'],
            ':des' => $data['descripcion']
        ]);
    }

    public function actualizar($id, $data)
    {
        $sql = "UPDATE diseno SET id_estado = :id_e, foto = :foto, nombre = :nom, descripcion = :des 
                WHERE id_diseno = :id";
        $data['id'] = $id;
        // Mapeo manual para asegurar consistencia con los nombres del array
        return $this->db->prepare($sql)->execute([
            ':id_e' => $data['id_estado'],
            ':foto' => $data['foto'],
            ':nom' => $data['nombre'],
            ':des' => $data['descripcion'],
            ':id' => $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM diseno WHERE id_diseno = :id";
        return $this->db->prepare($sql)->execute(['id' => $id]);
    }
}
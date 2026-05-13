<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Venta extends Model
{
    public function crearVenta($id_cliente)
    {
        $sql = "INSERT INTO venta (id_cliente) VALUES (:id_cliente)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_cliente' => $id_cliente]);
        return $this->db->lastInsertId();
    }

    public function guardarDetalle($data)
    {
        // INSERT incluyendo id_medida
        $sql = "INSERT INTO detalle_ventas (id_venta, id_producto, id_material, id_medida, cantidad, precio_unitario, subtotal) 
            VALUES (:id_v, :id_p, :id_m, :id_med, :cant, :pre, :sub)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_v' => $data['id_venta'],
            ':id_p' => $data['id_producto'],
            ':id_m' => $data['id_material'],
            ':id_med' => $data['id_medida'], // <--- El campo que agregaste
            ':cant' => $data['cantidad'],
            ':pre' => $data['precio_unitario'],
            ':sub' => $data['subtotal']
        ]);
    }
    public function getAllVentas()
    {
        $sql = "SELECT v.*, c.nombres, c.apellidoP 
                FROM venta v 
                JOIN cliente c ON v.id_cliente = c.id_cliente 
                ORDER BY v.fecha_venta DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
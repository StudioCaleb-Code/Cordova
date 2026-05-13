<?php
namespace App\Controllers;

use App\Models\Venta;
use App\Models\Clientes;
use App\Models\Productos;
use App\Models\Materiales;
use App\Models\Medidas; // <--- Importamos el modelo de Medidas

class VentasController extends BasePanelController
{
    private $ventaModel;

    public function __construct()
    {
        parent::__construct();
        $this->ventaModel = new Venta();
    }

    public function index()
    {
        $data['ventas'] = $this->ventaModel->getAllVentas();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Ventas/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $clienteModel = new Clientes();
        $materialModel = new Materiales();
        $productoModel = new Productos();
        $medidaModel = new Medidas(); // <--- Instanciamos Medidas

        $data['clientes'] = $clienteModel->getAll();
        $data['materiales'] = $materialModel->getAll();
        $data['productos'] = $productoModel->getAll();
        $data['medidas'] = $medidaModel->getAll(); // <--- Jalamos las medidas

        $this->view('Panel/Panel', [
            'view' => 'Panel/Ventas/form',
            'data' => $data
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_venta = $this->ventaModel->crearVenta($_POST['id_cliente']);

            foreach ($_POST['productos'] as $prod) {
                $prod['id_venta'] = $id_venta;
                // El subtotal ya viene calculado desde el JS
                $this->ventaModel->guardarDetalle($prod);
            }

            echo json_encode(['status' => 'success']);
        }
    }
}
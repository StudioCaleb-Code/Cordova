<?php
namespace App\Controllers;

use App\Models\Productos;
use App\Models\Medidas;
class ProductosController extends BasePanelController
{

    private $model;

    public function __construct()
    {
        parent::__construct(); // Ejecuta la seguridad de BasePanelController
        $this->model = new Productos();
    }

    public function index()
    {
        $productos = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Productos/index',
            'productos' => $productos,
            'titulo' => 'Catálogo de Productos'
        ]);
    }

    public function detalle($id)
    {
        $producto = $this->model->getById($id);
        if (!$producto) {
            header("Location: " . URL_BASE . "/productos");
            exit();
        }
        $this->view('Panel/Panel', [
            'view' => 'Panel/Productos/detalle',
            'producto' => $producto
        ]);
    }

    // crear
    public function crear()
    {
        $this->view('Panel/Panel', ['view' => 'Panel/Productos/form']);
    }

    // editar
    public function editar($id)
    {
        $producto = $this->model->getById($id);
        $this->view('Panel/Panel', [
            'view' => 'Panel/Productos/form',
            'producto' => $producto
        ]);
    }

    // guadar
    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Aquí procesarías los datos de Railway...
            // Luego de guardar:
            header("Location: " . URL_BASE . "/productos");
            exit();
        }
    }
}
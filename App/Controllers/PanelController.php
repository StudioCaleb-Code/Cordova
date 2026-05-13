<?php
namespace App\Controllers;
use App\Models\Productos;

// Heredamos de BasePanelController para tener seguridad automática
class PanelController extends BasePanelController
{
    private $model;
    public function __construct()
    {
        // ¡IMPORTANTE! Llamamos al constructor del padre para que ejecute el AuthMiddleware
        parent::__construct();
        $this->model = new Productos();
    }
    public function index()
    {
        // Solo cargamos la vista del Dashboard
        $this->view('Panel/Panel', [
            'view' => 'Panel/Dashboard/index'
        ]);
    }
}
// // productos
// public function Productos()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Productos/index'
//     ]);
// }

// // categorias
// public function Categorias()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Productos/index'
//     ]);
// }

// // material
// public function Material()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Material/index'
//     ]);
// }

// // medidas
// public function Medidas()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Medidas/index'
//     ]);
// }

// // usuarios
// public function Usuarios()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Usuarios/index'
//     ]);
// }

// // ventas
// public function Ventas()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Ventas/index'
//     ]);
// }

// // clientes
// public function Clientes()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Clientes/index'
//     ]);
// }

// // diseños
// public function Diseños()
// {
//     $this->view('Panel/Panel', [
//         'view' => 'Panel/Diseños/index'
//     ]);
// }
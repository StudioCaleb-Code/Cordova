<?php
namespace App\Controllers;

use App\Models\Categorias;

class CategoriasController extends BasePanelController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Categorias();
    }

    public function index()
    {
        $data['categorias'] = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Categorias/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $this->view('Panel/Panel', [
            'view' => 'Panel/Categorias/form'
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['tipo_categoria' => $_POST['tipo_categoria']];
            $this->model->insert($data);
            // Si esta ruta es la que te sirve, úsala siempre:
            header("Location: " . URL_BASE . "/categorias");
            exit;
        }
    }

    public function editar($id)
    {
        $data['categoria'] = $this->model->getById($id);
        $this->view('Panel/Panel', [
            'view' => 'Panel/Categorias/form',
            'data' => $data
        ]);
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['tipo_categoria' => $_POST['tipo_categoria']];
            $this->model->update($id, $data);
            header("Location: " . URL_BASE . "/categorias");
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->model->delete($id);
        header("Location: " . URL_BASE . "/categorias");
        exit;
    }
}
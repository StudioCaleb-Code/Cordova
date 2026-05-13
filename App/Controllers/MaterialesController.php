<?php
namespace App\Controllers;

use App\Models\Materiales;

class MaterialesController extends BasePanelController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Materiales();
    }

    public function index()
    {
        $data['materiales'] = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Materiales/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $this->view('Panel/Panel', [
            'view' => 'Panel/Materiales/form'
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert(['tipo_material' => $_POST['tipo_material']]);
            header("Location: " . URL_BASE . "/materiales");
            exit;
        }
    }

    public function editar($id)
    {
        $data['material'] = $this->model->getById($id);
        $this->view('Panel/Panel', [
            'view' => 'Panel/Materiales/form',
            'data' => $data
        ]);
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, ['tipo_material' => $_POST['tipo_material']]);
            header("Location: " . URL_BASE . "/materiales");
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->model->delete($id);
        header("Location: " . URL_BASE . "/materiales");
        exit;
    }
}
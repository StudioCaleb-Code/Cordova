<?php
namespace App\Controllers;

use App\Models\Clientes;

class ClientesController extends BasePanelController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Clientes();
    }

    public function index()
    {
        $data['clientes'] = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Clientes/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $this->view('Panel/Panel', [
            'view' => 'Panel/Clientes/form'
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST);
            header("Location: " . URL_BASE . "/clientes");
            exit;
        }
    }

    public function editar($id)
    {
        $data['cliente'] = $this->model->getById($id);
        $this->view('Panel/Panel', [
            'view' => 'Panel/Clientes/form',
            'data' => $data
        ]);
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, $_POST);
            header("Location: " . URL_BASE . "/clientes");
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->model->delete($id);
        header("Location: " . URL_BASE . "/clientes");
        exit;
    }
}
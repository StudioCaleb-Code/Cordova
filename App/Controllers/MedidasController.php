<?php
namespace App\Controllers;

use App\Models\Medidas;

class MedidasController extends BasePanelController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Medidas();
    }

    public function index()
    {
        $data['medidas'] = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Medidas/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $this->view('Panel/Panel', [
            'view' => 'Panel/Medidas/form'
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST);
            header("Location: " . URL_BASE . "/medidas");
            exit;
        }
    }

    public function editar($id)
    {
        $data['medida'] = $this->model->getById($id);
        $this->view('Panel/Panel', [
            'view' => 'Panel/Medidas/form',
            'data' => $data
        ]);
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($id, $_POST);
            header("Location: " . URL_BASE . "/medidas");
            exit;
        }
    }

    public function eliminar($id)
    {
        $this->model->delete($id);
        header("Location: " . URL_BASE . "/medidas");
        exit;
    }
}
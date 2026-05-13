<?php
namespace App\Controllers;

use App\Models\Diseno;
use App\Models\Estado;

class DisenosController extends BasePanelController
{
    private $model;
    private $estadoModel;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Diseno();
        $this->estadoModel = new Estado();
    }

    public function index()
    {
        $data['disenos'] = $this->model->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Disenos/index',
            'data' => $data
        ]);
    }

    public function crear()
    {
        $data['estados'] = $this->estadoModel->getAll();
        $this->view('Panel/Panel', [
            'view' => 'Panel/Disenos/form',
            'data' => $data
        ]);
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validación de seguridad: Si no hay sesión, redirigir al login
            if (!isset($_SESSION['id_usuario'])) {
                // Si no hay sesión, podrías usar un ID por defecto para pruebas (ej: 1)
                // o redirigir: header("Location: " . URL_BASE . "/login"); exit;
                $id_usuario = 1; // Cambia esto por el manejo de error que prefieras
            } else {
                $id_usuario = $_SESSION['id_usuario'];
            }

            $foto = "default.png";

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $dir = "uploads/disenos/";
                if (!file_exists($dir))
                    mkdir($dir, 0777, true);

                $foto = time() . "_" . $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $foto);
            }

            $insertData = [
                'id_usuario' => $id_usuario, // Usamos la variable validada
                'id_estado' => $_POST['id_estado'],
                'foto' => $foto,
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion']
            ];

            $this->model->guardar($insertData);
            header("Location: " . URL_BASE . "/disenos");
            exit;
        }
    }
    public function editar($id)
    {
        $data['diseno'] = $this->model->getById($id);
        $data['estados'] = $this->estadoModel->getAll();

        $this->view('Panel/Panel', [
            'view' => 'Panel/Disenos/form',
            'data' => $data
        ]);
    }

    public function actualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $disenoActual = $this->model->getById($id);
            $foto = $_POST['foto_actual'];

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $dir = "uploads/disenos/";
                $foto = time() . "_" . $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], $dir . $foto);

                // Borrar foto vieja si no es la default
                if ($_POST['foto_actual'] != 'default.png' && file_exists($dir . $_POST['foto_actual'])) {
                    @unlink($dir . $_POST['foto_actual']);
                }
            }

            $updateData = [
                'id_estado' => $_POST['id_estado'],
                'foto' => $foto,
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion']
            ];

            $this->model->actualizar($id, $updateData);
            header("Location: " . URL_BASE . "/disenos");
            exit;
        }
    }

    public function eliminar($id)
    {
        $diseno = $this->model->getById($id);
        if ($diseno && $diseno['foto'] != 'default.png') {
            @unlink("uploads/disenos/" . $diseno['foto']);
        }

        $this->model->eliminar($id);
        header("Location: " . URL_BASE . "/disenos");
        exit;
    }
}
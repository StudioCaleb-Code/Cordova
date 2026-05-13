<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Usuarios;

class AuthController extends Controller
{

    public function index()
    {
        // Carga App/Views/Auth/Login.php
        $this->view('Auth/Login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = new Usuarios();
            $user = $userModel->getUserByEmail($_POST['correo']);

            // Si falla el login, prueba cambiando password_verify por: 
            // if ($user && $_POST['password'] == $user['password'])
            if ($user && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id_usuario'];
                $_SESSION['nombres'] = $user['nombres'];
                header("Location: " . URL_BASE . "/panel/index");
                exit();
            } else {
                $_SESSION['error'] = "Datos incorrectos";
                header("Location: " . URL_BASE . "/auth/index");
                exit();
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: " . URL_BASE . "/login");
        exit();
    }
}
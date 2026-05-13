<?php
namespace App\Core;

class Router
{
    public function run()
    {
        // Captura "auth/authenticate" o "panel/productos" desde el .htaccess
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        // Valores por defecto
        $controllerName = 'AuthController';
        $method = 'index';
        $params = [];

        if (!empty($url)) {
            $urlParts = explode('/', $url);

            // Controlador: Primera parte de la URL
            $controllerName = ucfirst($urlParts[0]) . 'Controller';
            array_shift($urlParts);

            // Método: Segunda parte de la URL
            if (isset($urlParts[0]) && $urlParts[0] !== '') {
                $method = $urlParts[0];
                array_shift($urlParts);
            }

            // Parámetros: Lo que sobra
            $params = $urlParts;
        }

        $controllerClass = "App\\Controllers\\" . $controllerName;

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
            } else {
                die("Error: El método '$method' no existe en $controllerName.");
            }
        } else {
            // Si el controlador no existe, al login.
            header("Location: " . URL_BASE . "/auth");
            exit();
        }
    }
}
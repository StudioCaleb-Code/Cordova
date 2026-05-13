<?php
namespace App\Core;

class Controller
{
    // Método para renderizar vistas dentro de tu jerarquía de carpetas
    protected function view($path, $data = [])
    {
        // Extrae variables para que estén disponibles en el HTML
        extract($data);

        // El path ahora puede ser 'Panel/Productos/index'
        $fullPath = "App/Views/" . $path . ".php";

        if (file_exists($fullPath)) {
            require_once $fullPath;
        } else {
            die("La vista '$fullPath' no existe.");
        }
    }

    // Método para cargar modelos dinámicamente
    protected function model($modelName)
    {
        $modelClass = "App\\Models\\" . $modelName;
        return new $modelClass();
    }
}
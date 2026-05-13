<?php
session_start();

require_once 'App/Config/Config.php';
require_once 'App/Config/Env_loader.php';
loadEnv(__DIR__ . '/.env');

// Autoload inteligente para Namespaces
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$router = new App\Core\Router();
$router->run();
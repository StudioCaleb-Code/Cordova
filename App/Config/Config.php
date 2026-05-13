<?php
// App/Config/Config.php

// 1. Protocolo inteligente (Detecta HTTPS incluso detrás de proxies como Railway)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ||
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'))
    ? "https" : "http";

// 2. Host (ej: midominio.com o localhost:8080)
$host = $_SERVER['HTTP_HOST'];

// 3. Obtener la ruta base dinámicamente
// dirname($_SERVER['SCRIPT_NAME']) nos da la carpeta donde reside el index.php
$scriptPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

// Si el script está en la raíz, evitamos que devuelva una barra extra
$rootPath = ($scriptPath === '/') ? '' : $scriptPath;

// 4. Definir la URL_BASE final sin barras al final
define('URL_BASE', $protocol . "://" . $host . $rootPath);

// 5. Rutas físicas del sistema (Paths absolutos)
define('ROOT_PATH', dirname(__DIR__, 2) . '/'); // Sube 2 niveles desde Config/ hasta la raíz
define('PATH_VIEWS', ROOT_PATH . 'App/Views/');
define('PATH_ASSETS', ROOT_PATH . 'assets/');
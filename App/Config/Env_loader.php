<?php

/**
 * Carga las variables de entorno desde un archivo .env a $_ENV y getenv()
 * 
 * @param string $path Ruta completa al archivo .env
 * @return void
 */
function loadEnv($path)
{
    // Verificar si el archivo existe para evitar errores
    if (!file_exists($path)) {
        return;
    }

    // Leer el archivo línea por línea
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignorar comentarios que empiecen con #
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Buscar el primer símbolo '=' para separar nombre y valor
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);

            // Eliminar comillas si el valor las tiene (ej: "secreto123")
            $value = trim($value, '"\'');

            // Establecer la variable para que sea accesible de 3 formas:
            // 1. getenv('DB_HOST')
            // 2. $_ENV['DB_HOST']
            // 3. $_SERVER['DB_HOST']
            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
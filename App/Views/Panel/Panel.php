<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | Sistema</title>
    <!-- Usamos rutas absolutas con URL_BASE para evitar errores de carga -->
    <link rel="stylesheet" href="<?= URL_BASE ?>/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= URL_BASE ?>/assets/css/panel/panel.css">
</head>

<body>
    <div class="overlay" id="overlay"></div>

    <aside class="sidebar" id="sidebar">
        <?php include 'App/Views/Layout/sidebar.php'; ?>
    </aside>

    <header class="header" id="header">
        <?php include 'App/Views/Layout/header.php'; ?>
    </header>

    <main class="main">
        <?php
        if (isset($view)) {
            if (isset($data) && is_array($data)) {
                extract($data);
            }

            $file = 'App/Views/' . $view . '.php';

            if (file_exists($file)) {
                include $file;
            } else {
                echo "<p>Error: La vista <b>{$view}</b> no existe en {$file}</p>";
            }
        }
        ?>
    </main>

    <!-- Scripts -->
    <script src="<?= URL_BASE ?>/assets/js/panel.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Admin</title>
    <style>
        /* Tus estilos se mantienen iguales */
        body { background: #0f172a; color: white; font-family: 'Segoe UI', sans-serif; display: flex; height: 100vh; align-items: center; justify-content: center; margin: 0; }
        .box { background: #1e293b; padding: 2rem; border-radius: 1rem; width: 300px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.5); }
        h2 { text-align: center; color: #38bdf8; }
        input { width: 100%; padding: 0.75rem; margin: 0.5rem 0; border-radius: 0.5rem; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box; }
        button { width: 100%; padding: 0.75rem; background: #38bdf8; border: none; border-radius: 0.5rem; color: #0f172a; font-weight: bold; cursor: pointer; }
        .error { color: #f87171; font-size: 0.8rem; text-align: center; }
    </style>
</head>
<body>
    <div class="box">
        <h2>CORDOVA</h2>
        
        <?php if (isset($_SESSION['error'])): ?>
            <p class="error">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </p>
        <?php endif; ?>

        <!-- El action usa URL_BASE para ir a /auth/authenticate -->
        <form action="<?= URL_BASE ?>/auth/authenticate" method="POST">
            <input type="email" name="correo" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
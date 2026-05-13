<?php
namespace App\Middlewares;

class AuthMiddleware
{
    /**
     * Verifica si el usuario está logueado.
     * Si no, lo manda de patitas al login.
     */
    public static function check()
    {
        // Iniciamos sesión si no se ha iniciado aún
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: " . URL_BASE . "/auth");
            exit();
        }
    }
}
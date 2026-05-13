<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Middlewares\AuthMiddleware;

class BasePanelController extends Controller
{
    public function __construct()
    {
        // Esta es la barrera que protege a todos los hijos
        AuthMiddleware::check();
    }
}
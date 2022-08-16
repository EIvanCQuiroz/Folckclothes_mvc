<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\LoginController;
use Controllers\ProductoController;
use MVC\Router;
$router = new Router();

$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Password
$router->get('/forgot', [LoginController::class, 'forgot']);
$router->post('/forgot', [LoginController::class, 'forgot']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//Crear cuenta
$router->get('/registrar', [LoginController::class, 'registrar']);
$router->post('/registrar', [LoginController::class, 'registrar']);

//Confirmacion
$router->get('/confirmar-ac', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Zonas privadas
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/cita', [CitaController::class, 'index']);

//API para citas
$router->get('/api/productos', [APIController::class, 'index']);
$router->post('/api/pedidos', [APIController::class, 'guardar']);
$router->post('/api/eliminar', [APIController::class, 'eliminar']);


//CRUD SRVS
$router->get('/productos', [ProductoController::class, 'index']);
$router->get('/productos/crear', [ProductoController::class, 'crear']);
$router->post('/productos/crear', [ProductoController::class, 'crear']);
$router->get('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router->post('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router->post('/productos/eliminar', [ProductoController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
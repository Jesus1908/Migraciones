<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal - redirigir a login
$routes->get('/', 'IdentificacionController::iniciarSesion');

// Rutas de identificación
$routes->group('identificacion', function($routes) {
    $routes->get('iniciar-sesion', 'IdentificacionController::iniciarSesion');
    $routes->post('procesar-inicio-sesion', 'IdentificacionController::procesarInicioSesion');
    $routes->get('registrarse', 'IdentificacionController::registrarse');
    $routes->post('procesar-registro', 'IdentificacionController::procesarRegistro');
    $routes->get('cerrar-sesion', 'IdentificacionController::cerrarSesion');
});

// Rutas del sistema (requieren autenticación)
$routes->group('welcome', function($routes) {
    $routes->get('/', 'WelcomeController::bienvenida');
});

// Ruta de bienvenida (alias)
$routes->get('welcome', 'WelcomeController::bienvenida');


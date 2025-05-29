<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('sobre-nosotros', 'SobreNosotros::index');
$routes->get('comercializacion', 'Comercializacion::index');
$routes->get('contacto', 'Contacto::index');
$routes->get('terminos', 'Terminos::index');
$routes->get('catalogo', 'Catalogo::index');
$routes->get('productos', 'Productos::index');

$routes->get('detalles', 'Detalles::index');
$routes->post('mensaje', 'Contacto::guardar');

$routes->post('registro_usuario', 'UsuarioController::add_cliente');
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

$routes->get('Admin', 'Admin::index');
$routes->get('Registrar producto', 'AdminController::index');
$routes->get('gestionar_productos', 'ProductoController::gestionarProductos');
$routes->get('activar_producto/(:num)/(:num)', 'ProductoController::activarProducto/$1/$2');

$routes->get('detalles', 'Detalles::index');
$routes->post('mensaje', 'Contacto::guardar');

$routes->post('registro_usuario', 'UsuarioController::add_cliente');
$routes->post('login_usuario', 'UsuarioController::buscar_usuario');
$routes->get('user_admin', 'UsuarioController::admin');
$routes->get('logout', 'UsuarioController::cerrar_sesion');

$routes->get('upload', 'Upload::index');          
$routes->post('upload/upload', 'Upload::upload'); 
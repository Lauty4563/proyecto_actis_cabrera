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
$routes->get('productos', 'ProductoController::listarProductos');

$routes->get('Admin', 'Admin::index');
$routes->get('registrar_producto', 'ProductoController::registrarProducto');
$routes->get('gestionar_productos', 'ProductoController::gestionarProductos');
$routes->get('activar_producto/(:num)/(:num)', 'ProductoController::activarProducto/$1/$2');
$routes->get('editar_producto/(:num)', 'ProductoController::editarProducto/$1');
$routes->post('actualizar_producto/(:num)', 'ProductoController::actualizarProducto/$1');
$routes->post('productos/guardar', 'ProductoController::guardar');
$routes->post('cargar_producto', 'ProductoController::cargar_producto');

$routes->get('upload', 'Upload::index');          
$routes->post('upload/upload', 'Upload::upload'); 

$routes->get('detalles', 'Detalles::index');
$routes->post('mensaje', 'Contacto::guardar');

$routes->post('registro_usuario', 'UsuarioController::add_cliente');
$routes->post('login_usuario', 'UsuarioController::buscar_usuario');
$routes->get('user_admin', 'UsuarioController::admin');
$routes->get('logout', 'UsuarioController::cerrar_sesion');

$routes->get('ver_consultas', 'Contacto::consultas');
$routes->post('responder_consulta', 'Contacto::responder_consulta');

$routes->get('ver_carrito', 'CarritoController::ver_carrito');
$routes->post('add_cart', 'CarritoController::agregar_carrito');
$routes->get('eliminar_item/(:any)', 'CarritoController::eliminar/$1');


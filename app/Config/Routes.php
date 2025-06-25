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

$routes->get('Admin', 'Admin::index', ['filter' => 'admin']);
$routes->get('registrar_producto', 'ProductoController::registrarProducto', ['filter' => 'admin']);
$routes->get('gestionar_productos', 'ProductoController::gestionarProductos', ['filter' => 'admin']);
$routes->get('activar_producto/(:num)/(:num)', 'ProductoController::activarProducto/$1/$2');
$routes->get('editar_producto/(:num)', 'ProductoController::editarProducto/$1');
$routes->post('actualizar_producto/(:num)', 'ProductoController::actualizarProducto/$1');
$routes->post('productos/guardar', 'ProductoController::guardar');
$routes->post('cargar_producto', 'ProductoController::cargar_producto');
$routes->get('buscar', 'ProductoController::buscar');

$routes->get('upload', 'Upload::index');          
$routes->post('upload/upload', 'Upload::upload'); 

$routes->get('detalles', 'Detalles::index');
$routes->post('mensaje', 'Contacto::guardar');

$routes->post('registro_usuario', 'UsuarioController::add_cliente');
$routes->post('login_usuario', 'UsuarioController::buscar_usuario');
$routes->get('user_admin', 'UsuarioController::admin');
$routes->get('admin/usuarios', 'UsuarioController::listarUsuarios', ['filter' => 'admin']);
$routes->get('logout', 'UsuarioController::cerrar_sesion');
$routes->get('mi_perfil', 'UsuarioController::miPerfil', ['filter' => 'cliente']);
$routes->post('update_envio_user', 'UsuarioController::updateEnvioUser');
$routes->post('update_imagen_user', 'UsuarioController::updateImagenUser');
$routes->get('admin/usuarios', 'UsuarioController::listarUsuarios', ['filter' => 'admin']);
$routes->post('admin/usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1', ['filter' => 'admin']);
$routes->post('admin/usuarios/cambiar_rol/(:num)', 'UsuarioController::cambiar_rol/$1', ['filter' => 'admin']);
$routes->get('admin/usuarios/eliminados', 'UsuarioController::eliminados', ['filter' => 'admin']);
$routes->post('admin/usuarios/restaurar/(:num)', 'UsuarioController::restaurar/$1');
$routes->post('admin/usuarios/restaurar/(:num)', 'UsuarioController::restaurar/$1', ['filter' => 'admin']);


$routes->get('ver_consultas', 'Contacto::consultas', ['filter' => 'admin']);
$routes->post('responder_consulta', 'Contacto::responder_consulta');

$routes->get('ver_carrito', 'CarritoController::ver_carrito', ['filter' => 'cliente']);
$routes->post('add_cart', 'CarritoController::agregar_carrito');
$routes->get('eliminar_item/(:any)', 'CarritoController::eliminar/$1');
$routes->get('ventas', 'CarritoController::guardar_venta', ['filter' => 'cliente']);
$routes->get('listar_ventas', 'VentaController::listarVentas', ['filter' => 'admin']);
$routes->get('ventas/detalle/(:num)', 'VentaController::verDetalle/$1', ['filter' => 'admin']);


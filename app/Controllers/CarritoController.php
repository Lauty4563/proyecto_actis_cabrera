<?php
namespace App\Controllers;

use App\Models\Productos_Model;
use CodeIgniterCart\Cart;
use App\Models\Venta_Model;
use App\Models\Detalle_Venta_Model;
use App\Models\Usuario_Model;

class CarritoController extends BaseController
{
    public function ver_carrito()
    {
        $cart = \Config\Services::cart();
        $data = [
        'titulo' => 'Carrito de compras',
        'active' => 'carrito',
    ];
        return view('plantilla/header_view', $data)
            . view('plantilla/navbar_view', $data)
            . view('contenido/carrito_view')
            . view('plantilla/footer_view');
    }

    public function agregar_carrito()
    {
    $cart = \Config\Services::cart();
    $request = \Config\Services::request();
    $data = array(
        'id'    => $request->getPost('id'),
        'name'  => $request->getPost('titulo'),
        'price' => $request->getPost('precio'),
        'qty'   => $request->getPost('cantidad')
    );
    $cart->insert($data);
    // Mensaje que se agregó al carrito
    return redirect()->route('ver_carrito');
    }

    public function eliminar($rowid) 
    {
        $cart = \Config\Services::cart();

        if($rowid == "all") {
            $cart -> destroy();
        } else {
            $cart -> remove($rowid);
        }
        
        return redirect()->route('ver_carrito');
    }

    public function guardar_venta() 
    {
        $cart = \Config\Services::cart();
        $venta = new Venta_Model();
        $detalle = new Detalle_Venta_Model();
        $productos = new Productos_Model();
        $usuarioModel = new Usuario_Model();

        // Verificar si está logueado
        if (!session()->has('id')) {
            return redirect()->back()->with('mensaje_login', 'Debes iniciar sesión para continuar con la compra.');
        }

        // Verificar si tiene todos los datos de envio.
        $usuario = $usuarioModel->find(session('id'));

        if (empty($usuario['dni_usuario']) || 
            empty($usuario['fecha_usuario']) ||
            empty($usuario['direccion_usuario']) ||
            empty($usuario['provincia_usuario']) ||
            empty($usuario['pais_usuario']) ||
            empty($usuario['codigopostal_usuario']) ||
            empty($usuario['nombre']) ||
            empty($usuario['apellido'])) 
        {
            return redirect()->route('mi_perfil')->with('mensaje_perfil', 'Completa tus datos de envío antes de comprar.');
        }

        $cart1 = $cart->contents();

        // Verificar el stock de cada producto
        foreach($cart1 as $item) {
            $producto = $productos->where('id_producto', $item['id'])->first();
            if($producto['stock_producto'] < $item['qty']) {
                return redirect()->back()
                        ->with('error_carrito', 'Stock insuficiente.')
                        ->with('rowid_sin_stock', $item['rowid']);
            }
        }

        $data = array (
            'id_cliente' => session('id'),
            'venta_fecha' => date('Y-m-d'),
        );

        $venta_id = $venta->insert($data);

        $cart1 = $cart->contents();
        foreach($cart1 as $item) {
            $detalle_venta = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
            );
            $producto = $productos->where('id_producto', $item['id'])->first();
            $data = [
                'stock_producto' => $producto['stock_producto'] - $item['qty'],
            ];
            // Actualiza el stock del libro
            $productos->update($item['id'], $data);
            //Inserta el detalle de venta
            $detalle->insert($detalle_venta);
        }

        $cart->destroy();
        return redirect()->back()->with('mensaje_carrito', 'Transacción realizada con exito ¡Gracias por su compra!');
    }
}
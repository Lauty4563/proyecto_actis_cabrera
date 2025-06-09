<?php
namespace App\Controllers;

use App\Models\Productos_Model;

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
        'qty'   => 1
    );
    $cart->insert($data);
    // Mensaje que se agregó al carrito
    return redirect()->route('ver_carrito');
}
}
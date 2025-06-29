<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $productoController = new \App\Controllers\ProductoController();
        $data = [
            'titulo' => 'Página Principal',
            'active' => 'principal',
            'mensaje_registro' => session()->getFlashdata('mensaje_registro'),
            'mensaje_login' => session()->getFlashdata('mensaje_login'),
            'validation_registro' => session()->getFlashdata('validation_registro'),
            'validation_login' => session()->getFlashdata('validation_login'),
            'productosAleatorios' => $productoController->obtenerProductosAleatorios(),
        ];

        $this->cargarVista('./contenido/principal_view' , $data);
    }
}

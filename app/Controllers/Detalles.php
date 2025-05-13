<?php

namespace App\Controllers;

class Detalles extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Detalles de Producto',
            'active' => 'detalles',
        ];

        $this->cargarVista('./contenido/detalles_view' , $data);
    }
}
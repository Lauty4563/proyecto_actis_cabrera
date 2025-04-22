<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Catálogo de Productos',
            'active' => 'productos',
        ];

        $this->cargarVista('./contenido/productos_view' , $data);
    }
}

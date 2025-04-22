<?php

namespace App\Controllers;

class Comercializacion extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Comercialización',
            'active' => 'comercializacion',
        ];

        $this->cargarVista('./contenido/comercializacion_view' , $data);
    }
}
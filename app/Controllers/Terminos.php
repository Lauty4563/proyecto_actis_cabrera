<?php

namespace App\Controllers;

class Terminos extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Terminos y Usos',
            'active' => 'terminos',
        ];

        $this->cargarVista('./contenido/terminos_view' , $data);
    }
}

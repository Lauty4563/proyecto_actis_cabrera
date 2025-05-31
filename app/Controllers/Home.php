<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Página Principal',
            'active' => 'principal',
            'mensaje_registro' => session()->getFlashdata('mensaje_registro'),
            'validation' => session()->getFlashdata('validation')
        ];

        $this->cargarVista('./contenido/principal_view' , $data);
    }
}

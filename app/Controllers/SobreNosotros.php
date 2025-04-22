<?php

namespace App\Controllers;

class SobreNosotros extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Sobre Nosotros',
            'active' => 'sobre-nosotros',
        ];

        $this->cargarVista('./contenido/sobre_nosotros_view' , $data);
    }
}
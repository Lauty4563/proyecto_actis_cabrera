<?php

namespace App\Controllers;

class Consultas extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Consultas',
            'active' => 'consultas',
        ];

        $this->cargarVista('./contenido/consultas_view' , $data);
    }
}

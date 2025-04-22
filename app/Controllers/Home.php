<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Página Principal',
            'active' => 'principal',
        ];

        $this->cargarVista('./contenido/principal_view' , $data);
    }
}

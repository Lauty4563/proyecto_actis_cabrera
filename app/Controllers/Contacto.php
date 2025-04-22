<?php

namespace App\Controllers;

class Contacto extends BaseController
{
    public function index()
    {
        $data = [
            'titulo' => 'Contacto',
            'active' => 'contacto',
        ];

        $this->cargarVista('./contenido/contacto_view' , $data);
    }
}
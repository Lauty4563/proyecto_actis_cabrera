<?php

namespace App\Controllers;

use App\Models\Mensajes_Model;

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


public function guardar()
    {
        $model = new Mensajes_Model();

        $data = [
            'nombre_mensaje'   => $this->request->getPost('nombre'),
            'email_mensaje'    => $this->request->getPost('email'),
            'telefono_mensaje' => $this->request->getPost('telefono'),
            'asunto_mensaje'   => $this->request->getPost('asunto'),
            'texto_mensaje'    => $this->request->getPost('mensaje'),
        ];

        $guardado = [ 'guardado' => true ];

        $model->save($data);

        return redirect()->route('contacto')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
        $this->index('./contenido/contacto_view' , $guardado);
    }

    public function listado()
    {
        $model = new Mensajes_Model();
        $data['mensajes'] = $model->findAll();

        return view('contacto_listado', $data);
    }
}
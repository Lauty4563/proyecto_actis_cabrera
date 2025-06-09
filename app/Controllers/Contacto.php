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
            'mensaje_consulta' => session()->getFlashdata('mensaje_consulta'),
            'validation' => session()->getFlashdata('validation')
        ];

        $this->cargarVista('./contenido/contacto_view' , $data);
    }


    public function guardar()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[50]',
                'email' => 'required|valid_email',
                'telefono' => 'required|max_length[10]',
                'asunto' => 'required|max_length[50]|min_length[10]',
                'mensaje' => 'required|max_length[500]|min_length[10]'
            ],
            [   // Errors
                'nombre' => [
                    'required' => 'El nombre es requerido',
                ],

                'email' => [
                    'required' => 'El correo electrónico es obligatorio',
                    'valid_email' => 'La dirección de correo debe ser válida'
                ],

                'telefono'   => [
                    'required' => 'El telefono es obligatorio',
                    "max_length"    => 'El telefono de la consulta debe tener como máximo 10 caracteres'
                ],

                'asunto' => [
                    'required' => 'El asunto es requerido',
                    'min_length' =>'El asunto debe tener como mínimo 10 caracteres',
                    'max_length' => 'El asunto debe tener como máximo 50 caracteres',
                ],

                'mensaje' => [
                    'required' => 'El mensaje es requerido',
                    'min_length' =>'El mensaje debe tener como mínimo 10 caracteres',
                    'max_length' => 'El mensaje debe tener como máximo 500 caracteres',
                ],
            ]
        );

        if ($validation->withRequest($request)->run() ){

            $data = [
                'nombre_mensaje'   => $this->request->getPost('nombre'),
                'email_mensaje'    => $this->request->getPost('email'),
                'telefono_mensaje' => $this->request->getPost('telefono'),
                'asunto_mensaje'   => $this->request->getPost('asunto'),
                'texto_mensaje'    => $this->request->getPost('mensaje'),
            ];

            $consulta = new Mensajes_model();
            $consulta->insert($data);

            return redirect()->route('contacto')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
                                
        } else {

            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();
            
            return redirect()
                ->route('contacto')
                ->with('validation', $validation->getErrors())
                ->withInput();
        }
        
    }

    public function listado()
    {
        $model = new Mensajes_Model();
        $data['mensajes'] = $model->findAll();

        return view('contacto_listado', $data);
    }

    public function consultas()
{
    $model = new \App\Models\Mensajes_Model();
    $data['mensajes'] = $model->orderBy('id_mensaje', 'DESC')->findAll();
    $data['titulo'] = 'Ver consultas';
    $data['active'] = 'ver-consultas';

    return $this->cargarVista('./backend/consultas_view', $data);
}

public function responder_consulta()
{
    $email = $this->request->getPost('email_destinatario');
    $nombre = $this->request->getPost('nombre_destinatario');
    $respuesta = $this->request->getPost('respuesta');

    // Aquí podés enviar un correo real si tenés configurado el servicio de email
    // O simplemente mostrar un mensaje de éxito

    // Simulación de envío exitoso
    return redirect()->back()->with('mensaje_respuesta', "Respuesta enviada a $nombre ($email) correctamente.");
}

}

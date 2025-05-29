<?php

namespace App\Controllers;

use App\Models\Usuario_Model;

class UsuarioController extends BaseController
{
    public function index()
    {
        
    }

        public function add_cliente()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
            [
                'nombre' => 'required|max_length[50]',
                'contrasena' => 'required|min_length[8]',
                'dni' => 'required|max_length[10]|min_length[7]',
                'fecha' => 'required|valid_date',
                'direccion' => 'required',
                'provincia' => 'required',
                'pais' =>'required',
                'codigopostal' => 'required',

            ],
            [   // Errors
                'nombre' => [
                    'required' => 'El nombre es requerido',
                ],

                'contrasena' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'debe tener al menos 8 caracteres'
                ],

                'dni'   => [
                    'required' => 'El numero de DNI es obligatorio',
                    'max_length'   => 'El DNI debe tener como máximo 10 caracteres',
                    'min_length' => 'debe tener al menos 7 caracteres',
                ],

                'fecha' => [
                    'required' => 'La fecha de nacimiento es requerida',
                    'valid_date' =>'Introduzca una fecha valida',
                ],

                'direccion' => [
                    'required' => 'La direccion es requerida',
                ],

                'provincia' => [
                    'required' =>'La provincia es requerida',
                ],

                'pais' => [
                    'required' =>'El pais es requerido',
                ],

                'codigopostal' => [
                    'required' =>'El codigo postal es requerido',
                ],
            ]
        );

        if ($validation->withRequest($request)->run() ){

            $data = [
                'nombre_usuario'   => $this->request->getPost('nombre'),
                'contrasena_usuario'    => $this->request->getPost('contrasena'),
                'dni_usuario' => $this->request->getPost('dni'),
                'fecha_usuario'   => $this->request->getPost('fecha'),
                'direccion_usuario'    => $this->request->getPost('direccion'),
                'provincia_usuario' => $this->request->getPost('provincia'),
                'pais_usuario'   => $this->request->getPost('pais'),
                'codigopostal_usuario'    => $this->request->getPost('codigopostal'),
            ];

            $usuario = new Usuario_Model();
            $usuario->insert($data);

            return redirect()->route('Home')->with('mensaje_registro', 'Ha sido registrado correctamente!');
                                
        } else {

            $data['titulo'] = 'Home';
            $data['validation'] = $validation->getErrors();
            
            return redirect()
                ->route('/')
                ->with('validation', $validation->getErrors())
                ->withInput();
        }
        
    }
}

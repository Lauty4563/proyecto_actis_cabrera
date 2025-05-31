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
                'usuario' => 'required|max_length[50]',
                'contrasena' => 'required|min_length[8]',
                'repetir-contrasena' => 'required|min_length[8]|matches[contrasena]',
                'dni' => 'max_length[10]|min_length[7]',
                'fecha' => 'valid_date',
                'direccion' => 'max_length[500]',
                'provincia' => 'max_lenght[50]',
                'pais' =>'max_lenght[50]',
                'codigopostal' => 'max_lenght[5]',
                'nombre' => 'max_lenght[50]'
                'apellido' => 'max_lenght[50]'
            ],
            [   // Errors
                'usuario' => [
                    'required' => 'El nombre de usuario es requerido',
                    'max_length' => 'El nombre de usuario supera máximo de caracteres'
                ],

                'contrasena' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'Contraseña debe tener al menos 8 caracteres',
                ],

                'repetir_contrasena' => [
                    'required' => 'Repetir contraseña es obligatorio',
                    'min_length' => 'Repetir contraseña debe tenr como mínimo 8 caracteres'
                    'matches' => 'Las contraseñas no coinciden'
                ],

                'dni'   => [
                    'max_length'   => 'El DNI debe tener como máximo 10 caracteres',
                    'min_length' => 'El DNI debe tener al menos 7 caracteres',
                ],

                'fecha' => [
                    'valid_date' => 'Introduzca una fecha válida',
                ],

                'direccion' => [
                    'max_length' => 'La dirección supera el máximo de caracteres',
                ],

                'provincia' => [
                    'max_length' => 'La provincia supera el máximo de caracteres',
                ],

                'pais' => [
                    'max_length' => 'El pais supera el máximo de caracteres',
                ],

                'codigopostal' => [
                    'max_length' => 'El código postal supera el máximo de caracteres',
                ],

                'nombre' => [
                    'max_length' => 'El nombre supera el máximo de caracteres',
                ],

                'apellido' => [
                    'max_length' => 'El apellido supera el máximo de caracteres',
                ],

            ]
        );

        if ($validation->withRequest($request)->run() ){

            $data = [
                'nombre_usuario'   => $this->request->getPost('nombre'),
                'contrasena_usuario'    => password_hash($request->getPost('contrasena'), PASSWORD_BCRYPT),
                'dni_usuario' => $this->request->getPost('dni'),
                'fecha_usuario'   => $this->request->getPost('fecha'),
                'direccion_usuario'    => $this->request->getPost('direccion'),
                'provincia_usuario' => $this->request->getPost('provincia'),
                'pais_usuario'   => $this->request->getPost('pais'),
                'codigopostal_usuario'    => $this->request->getPost('codigopostal'),
                'nombre'    => $this->request->getPost('nombre'),
                'apellido'    => $this->request->getPost('apellido'),
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

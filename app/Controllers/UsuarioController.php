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
                'email' => 'required|max_length[50]|is_unique[usuario.email_usuario]',
                'contrasena' => 'required|min_length[8]',
                'repetir-contrasena' => 'required|min_length[8]|matches[contrasena]',
                'dni' => 'permit_empty|max_length[10]|min_length[7]',
                'fecha' => 'permit_empty|valid_date',
                'direccion' => 'max_length[500]',
                'provincia' => 'max_length[50]',
                'pais' => 'max_length[50]',
                'codigopostal' => 'max_length[5]',
                'nombre' => 'max_length[50]',
                'apellido' => 'max_length[50]'
            ],
            [   // Errors
                'usuario' => [
                    'required' => 'El nombre de usuario es requerido',
                    'max_length' => 'El nombre de usuario supera máximo de caracteres',
                ],

                'email' => [
                    'required' => 'El email de usuario es requerido',
                    'max_length' => 'El email de usuario supera máximo de caracteres',
                    'is_unique' => 'El eamil ya se encuentra registrado',
                ],


                'contrasena' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'Contraseña debe tener al menos 8 caracteres',
                ],

                'repetir-contrasena' => [
                    'required' => 'Repetir contraseña es obligatorio',
                    'min_length' => 'Repetir contraseña debe tenr como mínimo 8 caracteres',
                    'matches' => 'Las contraseñas no coinciden',
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
                'nombre_usuario'   => $this->request->getPost('usuario'),
                'email_usuario'   => $this->request->getPost('email'),
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
                ->with('validation_registro', $validation->getErrors())
                ->withInput();
        }
        
    }

    public function buscar_usuario() 
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

        $validation->setRules(
            [
                'login_email' => 'required|valid_email',
                'login_contrasena' => 'required|min_length[8]',
            ],
            [   // Errors
                'login_email' => [
                    'required' => 'El email de usuario es requerido',
                    'valid_email' => 'El email debe ser válido',
                ],
                'login_contrasena' => [
                    'required' => 'La contraseña es requerida',
                    'min_length' => 'Contraseña debe tener al menos 8 caracteres',
                ],
            ]
        );

        if (!$validation->withRequest($request)->run() ) {
            
            return redirect()
            ->route('/')
            ->with('validation_login', $validation->getErrors());
        }

        $email = $request->getPost('login_email');
        $contrasena = $request->getPost('login_contrasena');
        $user_Model = new Usuario_Model();
        $user = $user_Model->where('email_usuario', $email)->first();

        if ($user && password_verify($contrasena, $user['contrasena_usuario'])) {
            $data = [
                'id' => $user['id_usuario'],
                'usuario' => $user['nombre_usuario'],
                'nombre' => $user['nombre'],
                'apellido' => $user['apellido'],
                'perfil' => $user['perfil_id'],
                'login' => TRUE,
            ];

            $session->set($data);
            switch($user['perfil_id']) {
                case '1': {
                    return redirect()->to('/');
                }
                case '2': {
                    return redirect()->to('user_admin');
                }
            }
        } else {
            return redirect()->route('/')->with('mensaje_login', '¡Usuario y/o contraseña incorrecto!');
        }

    }

    public function admin()
{
    $usuarioModel = new \App\Models\Usuario_Model();
    $productoModel = new \App\Models\Productos_Model();
    $mensajeModel = new \App\Models\Mensajes_Model();

    $data = [
        'titulo' => 'Panel de Administración',
        'active' => 'principal',
        'totalUsuarios' => $usuarioModel->where('activo', 1)->countAllResults(),
        'totalProductos' => $productoModel->where('activo', 1)->countAllResults(),
        'totalMensajes' => $mensajeModel->countAll(),
        'ultimosMensajes' => $mensajeModel->orderBy('id_mensaje', 'DESC')->limit(5)->findAll(),
        'mensaje_registro' => session()->getFlashdata('mensaje_registro'),
        'mensaje_login' => session()->getFlashdata('mensaje_login'),
        'validation_registro' => session()->getFlashdata('validation_registro'),
        'validation_login' => session()->getFlashdata('validation_login'),
    ];

    $this->cargarVista('./contenido/admin_view', $data);
}


    public function cerrar_sesion() 
    {
        $session = session();
        $session->destroy();
        return redirect()->route('/');
    }
}

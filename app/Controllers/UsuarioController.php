<?php

namespace App\Controllers;

use App\Models\Usuario_Model;
use App\Models\Venta_Model;
use App\Models\Detalle_Venta_Model;
use App\Models\Productos_Model;


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
                'imagen' => $user['imagen_usuario'],
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
            return redirect()->route('/')->with('mensaje_login', '¡Usuario y/o contraseña incorrecto!')->withInput();
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

public function miPerfil() 
{
    if (!session()->has('id')) {
        return redirect()->back()->with('mensaje_login', 'Debes iniciar sesión para acceder a tu perfil de usuario.');
    }

    $user_Model = new Usuario_Model();
    $ventaModel = new Venta_Model();
    $detalleModel = new Detalle_Venta_Model();
    $productoModel = new Productos_Model();

    $user = $user_Model->where('id_usuario', session('id'))->first();

    // Obtener ventas del usuario
    $ventasRaw = $ventaModel
        ->where('id_usuario', session('id'))
        ->orderBy('venta_fecha', 'DESC')
        ->findAll();

    $ventas = [];

    foreach ($ventasRaw as $venta) {
        $detalles = $detalleModel->where('id_venta', $venta['id_venta'])->findAll();
        $productos = [];
        $total = 0;

        foreach ($detalles as $detalle) {
            $prod = $productoModel->find($detalle['id_producto']);
            $subtotal = $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
            $total += $subtotal;

            $productos[] = [
                'nombre' => $prod['nombre_producto'] ?? 'Producto eliminado',
                'precio' => $detalle['detalle_precio'],
                'cantidad' => $detalle['detalle_cantidad'],
                'subtotal' => $subtotal
            ];
        }

        $ventas[] = [
            'id_venta' => $venta['id_venta'],
            'fecha' => $venta['venta_fecha'],
            'total' => $total,
            'productos' => $productos
        ];
    }

    $data['usuario'] = $user;
    $data['ventas'] = $ventas;
    $data['titulo'] = 'Mi Perfil';
    $data['active'] = 'mi_perfil';

    $this->cargarVista('./contenido/mi_perfil_view', $data);
}


    public function updateEnvioUser() 
{
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
        [
            'ue_dni' => 'required|max_length[10]|min_length[7]',
            'ue_fecha' => 'required|valid_date',
            'ue_direccion' => 'required|max_length[500]',
            'ue_provincia' => 'required|max_length[50]',
            'ue_pais' => 'required|max_length[50]',
            'ue_codigopostal' => 'required|max_length[5]',
            'ue_nombre' => 'required|max_length[50]',
            'ue_apellido' => 'required|max_length[50]'
        ],
        [   // Errors
            'ue_dni'   => [
                'required' => 'El DNI es requerido',
                'max_length'   => 'El DNI debe tener como máximo 10 caracteres',
                'min_length' => 'El DNI debe tener al menos 7 caracteres',
            ],

            'ue_fecha' => [
                'required' => 'La Fecha es requerida',
                'valid_date' => 'Introduzca una fecha válida',
            ],

            'ue_direccion' => [
                'required' => 'La Dirección es requerida',
                'max_length' => 'La dirección supera el máximo de caracteres',
            ],

            'ue_provincia' => [
                'required' => 'La Provincia es requerida',
                'max_length' => 'La provincia supera el máximo de caracteres',
            ],

            'ue_pais' => [
                'required' => 'El Pais es requerido',
                'max_length' => 'El pais supera el máximo de caracteres',
            ],

            'ue_codigopostal' => [
                'required' => 'El Código Postal es requerido',
                'max_length' => 'El código postal supera el máximo de caracteres',
            ],

            'ue_nombre' => [
                'required' => 'El Nombre es requerido',
                'max_length' => 'El nombre supera el máximo de caracteres',
            ],

            'ue_apellido' => [
                'required' => 'El Apellido es requerido',
                'max_length' => 'El apellido supera el máximo de caracteres',
            ],

        ]
    );

    if ($validation->withRequest($request)->run() ){

        $data = [
            'dni_usuario' => $this->request->getPost('ue_dni'),
            'fecha_usuario'   => $this->request->getPost('ue_fecha'),
            'direccion_usuario'    => $this->request->getPost('ue_direccion'),
            'provincia_usuario' => $this->request->getPost('ue_provincia'),
            'pais_usuario'   => $this->request->getPost('ue_pais'),
            'codigopostal_usuario'    => $this->request->getPost('ue_codigopostal'),
            'nombre'    => $this->request->getPost('ue_nombre'),
            'apellido'    => $this->request->getPost('ue_apellido'),
        ];

        $usuario = new Usuario_Model();

        $usuario->update(session('id'), $data);

        return redirect()->back()->with('mensaje_perfil', '¡Los datos se han cargado correctamente!');
                            
    } else {
        
        return redirect()
            ->back()
            ->with('errors', $validation->getErrors())
            ->withInput();
    }
}

    public function updateImagenUser()
{
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
        [
            'ui_imagen' => 'uploaded[ui_imagen]|is_image[ui_imagen]|max_size[ui_imagen,2048]|mime_in[ui_imagen,image/jpg,image/jpeg,image/png,image/webp]'        ],
        [   // Errores
            'ui_imagen' => [
                'required' => 'La imagen es requerida',
                'is_image' => 'El archivo debe ser una imagen válida',
                'max_size' => 'La imagen no debe superar los 2MB',
                'mime_in' => 'La imagen debe ser de tipo JPG, JPEG, PNG o WEBP',
            ],
        ]
    );

    if (! $this->validate($validation->getRules()))
    {
        $data['errors'] = $validation->getErrors();
        return redirect()->back()->with('errors', $validation->getErrors());
    }

    $imagenArchivo = $this->request->getFile('ui_imagen');

    if ($imagenArchivo && $imagenArchivo->isValid() && !$imagenArchivo->hasMoved()) {
        // Obtener nombre anterior desde la BD
        $usuarioModel = new Usuario_Model();
        $usuarioViejo = $usuarioModel->find(session('id'));
        $imagenAnterior = $usuarioViejo['imagen_usuario'] ?? null;

        // Generar nuevo nombre y mover archivo
        $nuevoNombre = $imagenArchivo->getRandomName();
        $imagenArchivo->move('./assets/img/perfiles/', $nuevoNombre);
        $data['imagen_usuario'] = $nuevoNombre;

        // Eliminar imagen anterior si existe
        if ($imagenAnterior && file_exists('./assets/img/perfiles/' . $imagenAnterior)) {
            unlink('./assets/img/perfiles/' . $imagenAnterior);
        }
    }

    $usuario = new Usuario_Model();
    $usuario->update(session('id'), $data);
    
    return redirect()->route('mi_perfil');
}

public function listarUsuarios()
{
    $usuarioModel = new \App\Models\Usuario_Model();

    $clientes = $usuarioModel->where('perfil_id', 1)->findAll();
    $admins = $usuarioModel->where('perfil_id', 2)->findAll();

    $data = [
        'titulo' => 'Usuarios del sistema',
        'active' => 'usuarios',
        'clientes' => $clientes,
        'admins' => $admins,
    ];

    return view('plantilla/header_view', $data)
        . view('plantilla/navbar_view', $data)
        . view('contenido/listar_usuarios', $data)
        . view('plantilla/footer_view');
}

 public function eliminar($id)
    {
        $usuarioModel = new Usuario_Model();

        // Validar que no se elimine a sí mismo (opcional pero recomendado)
        if ($id == session('id')) {
            return redirect()->back()->with('error', 'No puedes eliminar tu propio usuario.');
        }

        // Verificar que exista el usuario
        $usuario = $usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $usuarioModel->delete($id);

        return redirect()->back()->with('mensaje', 'Usuario eliminado correctamente.');
    }

    // Cambiar rol de usuario (cliente <-> admin)
    public function cambiar_rol($id)
    {
        $usuarioModel = new Usuario_Model();

        // Validar que no se cambie rol a sí mismo (opcional)
        if ($id == session('id')) {
            return redirect()->back()->with('error', 'No puedes cambiar tu propio rol.');
        }

        // Validar que exista usuario
        $usuario = $usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        $nuevoRol = $this->request->getPost('nuevo_rol');
        if (!in_array($nuevoRol, ['1', '2'])) {
            return redirect()->back()->with('error', 'Rol inválido.');
        }

        $usuarioModel->update($id, ['perfil_id' => $nuevoRol]);

        return redirect()->back()->with('mensaje', 'Rol cambiado correctamente.');
    }

}

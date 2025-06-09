<?php

namespace App\Controllers;

use App\Models\Productos_Model;
use App\Models\CategoriaColeccion_Model;
use App\Models\CategoriaGenero_Model;
use App\Models\CategoriaPrenda_Model;

class ProductoController extends BaseController
{
    protected $helpers = ['form', 'url'];

   
public function cargar_producto()
{
    helper(['form']);

    $validationRule = [
    'imagen_producto' => [
        'label' => 'Imagen del producto',
        'rules' => 'uploaded[imagen_producto]|is_image[imagen_producto]|mime_in[imagen_producto,image/jpg,image/jpeg,image/png]|max_size[imagen_producto,2048]',
    ],
    'nombre_producto' => 'required',
    'precio_producto' => 'required|decimal',
    'stock_producto' => 'required|integer',
];


    if (! $this->validate($validationRule)) {
        return view('backend/productos/registrar_productos_view', ['errors' => $this->validator->getErrors()]);

    }

    $img = $this->request->getFile('imagen_producto');

    if (! $img->hasMoved()) {
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/uploads', $newName);

        $productoModel = new Productos_Model();

        $productoModel->insert([
            'nombre_producto'      => $this->request->getPost('nombre_producto'),
            'precio_producto'      => $this->request->getPost('precio_producto'),
            'cat_coleccion'        => $this->request->getPost('cat_coleccion'),
            'cat_genero'           => $this->request->getPost('cat_genero'),
            'cat_prenda'           => $this->request->getPost('cat_prenda'),
            'descripcion_producto' => $this->request->getPost('descripcion_producto'),
            'stock_producto'       => $this->request->getPost('stock_producto'),
            'imagen_producto'      => $newName,
            'activo'               => 1,
            'soft_delete'          => 0,
        ]);

        return redirect()->to('registrar_producto')->with('success', '¡Producto cargado con éxito!');
    }

    return view('backend/productos/registrar_productos_view', [
        'errors' => ['No se pudo subir la imagen.']
    ]);

}

public function gestionarProductos() 
{
    $producto_Model = new Productos_Model();
    $catColeccion = new CategoriaColeccion_Model();
    $data['producto'] = $producto_Model
    ->select('producto.*, c.nombre AS nombre_coleccion, g.nombre AS nombre_genero, p.nombre AS nombre_prenda')
    ->join('cat_coleccion c', 'c.id = producto.cat_coleccion_id')
    ->join('cat_genero g', 'g.id = producto.cat_genero_id')
    ->join('cat_prenda p', 'p.id = producto.cat_prenda_id')
    ->findAll();
    $data['titulo'] = 'listar productos';
    $data['active'] = 'gestionar-productos';
    $data['mensaje_gestion'] = session()->getFlashdata('mensaje_gestion');
    $data['validation_gestion'] = session()->getFlashdata('validation_gestion');

    return $this->cargarVista('./backend/productos/gestionar_productos_view' , $data);
}

public function activarProducto($id, $estado) 
{
    $data = array('activo' => $estado);
    $producto = new Productos_Model();
    $producto->update($id, $data);
    return redirect()->route('gestionar_productos');
}

public function editarProducto($id) 
{
    $producto_Model = new Productos_Model();
    $categoriaColeccion = new CategoriaColeccion_Model();
    $categoriaGenero = new CategoriaGenero_Model();
    $categoriaPrenda = new CategoriaPrenda_Model();
    $data['categoria_coleccion'] = $categoriaColeccion->findAll();
    $data['categoria_genero'] = $categoriaGenero->findAll();
    $data['categoria_prenda'] = $categoriaPrenda->findAll();
    $data['producto'] = $producto_Model->where('id_producto', $id)->first();

    return $this->response->setJSON($data);
}

public function listarProductos() {
    $producto_Model = new Productos_Model();
    $categoriaColeccion = new CategoriaColeccion_Model();
    $categoriaGenero = new CategoriaGenero_Model();
    $categoriaPrenda = new CategoriaPrenda_Model();
    $data['categorias_coleccion'] = $categoriaColeccion->findAll();
    $data['categorias_genero'] = $categoriaGenero->findAll();
    $data['categorias_prenda'] = $categoriaPrenda->findAll();
    $data['productos'] = $producto_Model
    ->select('producto.*, c.nombre AS nombre_coleccion, g.nombre AS nombre_genero, p.nombre AS nombre_prenda')
    ->join('cat_coleccion c', 'c.id = producto.cat_coleccion_id')
    ->join('cat_genero g', 'g.id = producto.cat_genero_id')
    ->join('cat_prenda p', 'p.id = producto.cat_prenda_id')
    ->findAll();
    $data['titulo'] = 'listar productos';
    $data['active'] = 'productos';

    return $this->cargarVista('./contenido/productos_view' , $data);
}

public function registrarProducto() 
{
    $producto_Model = new Productos_Model();
    $catColeccion = new CategoriaColeccion_Model();
    $data['producto'] = $producto_Model
    ->select('producto.*, c.nombre AS nombre_coleccion, g.nombre AS nombre_genero, p.nombre AS nombre_prenda')
    ->join('cat_coleccion c', 'c.id = producto.cat_coleccion_id')
    ->join('cat_genero g', 'g.id = producto.cat_genero_id')
    ->join('cat_prenda p', 'p.id = producto.cat_prenda_id')
    ->findAll();
    $data['titulo'] = 'listar productos';
    $data['active'] = 'registrar-productos';

    return $this->cargarVista('./backend/productos/registrar_productos_view' , $data);
}

public function actualizarProducto($id) 
{
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
        [
            'edit_nombre' => 'max_length[50]',
            'edit_precio' => 'numeric|greater_than_equal_to[0]',
            'edit_coleccion' => 'integer',
            'edit_genero' => 'integer',
            'edit_prenda' => 'integer',
            'edit_descripcion' => 'max_length[255]',
            'edit_stock' => 'integer|greater_than_equal_to[0]',
            'edit_imagen' => 'permit_empty|is_image[imagen]|max_size[imagen,2048]|mime_in[imagen,image/jpg,image/jpeg,image/png,image/webp]'
        ],
        [   // Errores personalizados
            'edit_nombre' => [
                'max_length' => 'El nombre no debe superar los 50 caracteres',
            ],
            'edit_precio' => [
                'numeric' => 'El precio debe ser un número',
                'greater_than_equal_to' => 'El precio no puede ser negativo',
            ],
            'edit_categoria_coleccion' => [
                'integer' => 'La categoría de colección debe ser un número válido',
            ],
            'edit_categoria_genero' => [
                'integer' => 'La categoría de género debe ser un número válido',
            ],
            'edit_categoria_prenda' => [
                'integer' => 'La categoría de prenda debe ser un número válido',
            ],
            'edit_descripcion' => [
                'max_length' => 'La descripción no debe superar los 255 caracteres',
            ],
            'edit_stock' => [
                'integer' => 'El stock debe ser un número entero',
                'greater_than_equal_to' => 'El stock no puede ser negativo',
            ],
            'edit_imagen' => [
                'is_image' => 'El archivo debe ser una imagen válida',
                'max_size' => 'La imagen no debe superar los 2MB',
                'mime_in' => 'La imagen debe ser de tipo JPG, JPEG, PNG o WEBP',
            ],
        ]
    );

    if ($validation->withRequest($request)->run() ) {

        $data = [
            'nombre_producto'   => $this->request->getPost('edit_nombre'),
            'precio_producto'   => $this->request->getPost('edit_precio'),
            'cat_coleccion_id'    => $this->request->getPost('edit_coleccion'),
            'cat_genero_id'    => $this->request->getPost('edit_genero'),
            'cat_prenda_id'    => $this->request->getPost('edit_prenda'),
            'descripcion_producto'    => $this->request->getPost('edit_descripcion'),
            'stock_producto'    => $this->request->getPost('edit_stock'),
        ];

        $imagenArchivo = $this->request->getFile('edit_imagen');
        if ($imagenArchivo && $imagenArchivo->isValid() && !$imagenArchivo->hasMoved()) {
            // Obtener nombre anterior desde la BD
            $productoModel = new Productos_Model();
            $productoViejo = $productoModel->find($id);
            $imagenAnterior = $productoViejo['imagen_producto'] ?? null;

            // Generar nuevo nombre y mover archivo
            $nuevoNombre = $imagenArchivo->getRandomName();
            $imagenArchivo->move('./assets/img/', $nuevoNombre);
            $data['imagen_producto'] = $nuevoNombre;

            // Eliminar imagen anterior si existe
            if ($imagenAnterior && file_exists('./assets/img/' . $imagenAnterior)) {
                unlink('./assets/img/' . $imagenAnterior);
            }
        }

        $producto = new Productos_Model();
        $producto->update($id, $data);

        return redirect()->route('gestionar_productos')->with('mensaje_gestion', '¡El producto ha sido editado correctamente!');
                            
    } else {

        $data['titulo'] = 'gestionar-productos';
        $data['validation_gestion'] = $validation->getErrors();
        
        return redirect()
            ->route('gestionar_productos')
            ->with('validation_gestion', $validation->getErrors())
            ->withInput();
    }    
}

}

<?php

namespace App\Controllers;

use App\Models\Productos_Model;
use App\Models\CategoriaColeccion_Model;
use App\Models\CategoriaGenero_Model;
use App\Models\CategoriaPrenda_Model;

class ProductoController extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        return view('form_carga', ['errors' => []]);
    }

   
public function cargar_producto()
{
    helper(['form']);

    $validationRule = [
        'userfile' => [
            'label' => 'Imagen del producto',
            'rules' => 'uploaded[userfile]|is_image[userfile]|mime_in[userfile,image/jpg,image/jpeg,image/png]|max_size[userfile,2048]',
        ],
        'nombre_producto' => 'required',
        'precio_producto' => 'required|decimal',
        'stock_producto' => 'required|integer',
    ];

    if (! $this->validate($validationRule)) {
        return view('form_carga', ['errors' => $this->validator->getErrors()]);
    }

    $img = $this->request->getFile('userfile');

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

        return view('carga_exitosa');
    }

    return view('form_carga', ['errors' => ['No se pudo subir la imagen.']]);
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

public function registrarProducto() {
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

}

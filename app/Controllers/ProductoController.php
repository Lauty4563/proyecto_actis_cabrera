<?php

namespace App\Controllers;

use App\Models\Productos_Model;

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
}

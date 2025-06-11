<?php

namespace App\Controllers;
use App\Models\Productos_Model;
use App\Models\CategoriaColeccion_Model;
use App\Models\CategoriaGenero_Model;
use App\Models\CategoriaPrenda_Model;

class Detalles extends BaseController
{
    public function index()
    {
        $id = $this->request->getGet('id');

        $data = [
            'titulo' => 'Detalles de Producto',
            'active' => 'detalles',
        ];

        $producto_Model = new Productos_Model();
        $data['producto'] = $producto_Model->where('id_producto', $id)
        ->select('producto.*, c.nombre AS nombre_coleccion, g.nombre AS nombre_genero, p.nombre AS nombre_prenda')
        ->join('cat_coleccion c', 'c.id = producto.cat_coleccion_id')
        ->join('cat_genero g', 'g.id = producto.cat_genero_id')
        ->join('cat_prenda p', 'p.id = producto.cat_prenda_id')
        ->first();

        $this->cargarVista('./contenido/detalles_view' , $data);
    }
}
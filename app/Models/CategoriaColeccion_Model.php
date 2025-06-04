<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaColeccion_Model extends Model
{
    protected $table      = 'cat_coleccion';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'descripcion',
    ];
}
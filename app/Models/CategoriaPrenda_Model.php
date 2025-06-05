<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaPrenda_Model extends Model
{
    protected $table      = 'cat_prenda';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'descripcion',
    ];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaGenero_Model extends Model
{
    protected $table      = 'cat_genero';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'descripcion',
    ];
}
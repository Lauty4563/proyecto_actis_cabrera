<?php

namespace App\Models;

use CodeIgniter\Model;

class Mensajes_Model extends Model
{
    protected $table      = 'mensajes';
    protected $primaryKey = 'id_mensaje';
    protected $allowedFields = [
        'nombre_mensaje',
        'email_mensaje',
        'telefono_mensaje',
        'asunto_mensaje',
        'texto_mensaje'
    ];
}

<?php

namespace App\Models;
use App\Controllers\BaseController;
use App\Models\CategoriasModel;

use CodeIgniter\Model;

class CategoriasModel extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'estado'];

    protected $useSoftDeletes = false;

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = 'fecha_modifica';
}
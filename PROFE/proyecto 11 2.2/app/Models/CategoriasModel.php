<?php 
namespace APP\Models;
use CodeIgniter\Model;
 
class CategoriasModel extends Model
{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';
 
    protected $useAutoIncrement = true;
 
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
 
    protected $allowedFields = ['id', 'nombre', 'estado', 'fecha_crea', 'fecha_modifica'];
 
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
 
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'deleted_at';
 
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
 
    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
} // final model
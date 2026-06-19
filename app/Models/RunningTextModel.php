<?php

namespace App\Models;

use CodeIgniter\Model;

class RunningTextModel extends Model
{
    protected $table            = 'running_text';
    protected $primaryKey       = 'running_text_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['teks', 'tautan', 'status', 'urutan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

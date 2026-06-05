<?php

namespace App\Models;

use CodeIgniter\Model;

class QurbanModel extends Model
{
    protected $table            = 'qurban';
    protected $primaryKey       = 'qurban_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kelompok', 'waktu_pemotongan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}

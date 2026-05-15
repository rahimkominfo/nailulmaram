<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusSubBidangModel extends Model
{
    protected $table            = 'pengurus_sub_bidang';
    protected $primaryKey       = 'sub_bidang_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['bidang_id', 'nama_sub_bidang', 'urutan'];
    protected $useTimestamps    = false;
}

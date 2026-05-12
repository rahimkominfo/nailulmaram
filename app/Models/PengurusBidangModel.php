<?php

namespace App\Models;

use CodeIgniter\Model;

class PengurusBidangModel extends Model
{
    protected $table            = 'pengurus_bidang';
    protected $primaryKey       = 'bidang_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_bidang', 'jenis', 'ikon', 'urutan'];
    protected $useTimestamps    = false;
}

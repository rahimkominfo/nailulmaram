<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanTujuanModel extends Model
{
    protected $table            = 'aduan_tujuan';
    protected $primaryKey       = 'aduan_tujuan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['pengurus_id', 'nama_aduan_tujuan'];

    public function getWithPengurus()
    {
        return $this->select('aduan_tujuan.*, pengurus.nama as nama_pengurus')
                    ->join('pengurus', 'pengurus.pengurus_id = aduan_tujuan.pengurus_id')
                    ->findAll();
    }
}

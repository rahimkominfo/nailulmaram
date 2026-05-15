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
        return $this->select('aduan_tujuan.*, pengurus.nama as nama_pengurus, pengurus.no_hp, pengurus_bidang.ikon, pengurus_bidang.nama_bidang, pengurus_sub_bidang.nama_sub_bidang')
                    ->join('pengurus', 'pengurus.pengurus_id = aduan_tujuan.pengurus_id')
                    ->join('pengurus_bidang', 'pengurus_bidang.bidang_id = pengurus.bidang_id', 'left')
                    ->join('pengurus_sub_bidang', 'pengurus_sub_bidang.sub_bidang_id = pengurus.sub_bidang_id', 'left')
                    ->findAll();
    }
}

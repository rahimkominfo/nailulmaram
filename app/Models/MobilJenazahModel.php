<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilJenazahModel extends Model
{
    protected $table            = 'mobil_jenazah';
    protected $primaryKey       = 'mobil_jenazah_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal', 
        'jenis_layanan', 
        'nama_almarhum', 
        'lokasi_penjemputan', 
        'lokasi_disalatkan', 
        'lokasi_tujuan', 
        'keterangan', 
        'foto_dokumentasi', 
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tanggal'       => 'required|valid_date',
        'jenis_layanan' => 'required|max_length[100]',
        'lokasi_tujuan' => 'required|max_length[255]',
        'status'        => 'required|in_list[draft,published,archived]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}

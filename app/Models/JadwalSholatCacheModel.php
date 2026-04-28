<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalSholatCacheModel extends Model
{
    protected $table            = 'jadwal_sholat_cache';
    protected $primaryKey       = 'tanggal';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal', 'imsak', 'subuh', 'terbit', 'dzuhur', 
        'ashar', 'maghrib', 'isya', 'h_hari', 'h_bulan', 'h_tahun'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = 'last_updated';

    // Validation
    protected $validationRules      = [
        'tanggal' => 'required|valid_date',
        'imsak'   => 'required|max_length[10]',
        'subuh'   => 'required|max_length[10]',
        'dzuhur'  => 'required|max_length[10]',
        'ashar'   => 'required|max_length[10]',
        'maghrib' => 'required|max_length[10]',
        'isya'    => 'required|max_length[10]',
    ];
}

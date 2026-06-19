<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoDokumentasiModel extends Model
{
    protected $table            = 'video_dokumentasi';
    protected $primaryKey       = 'video_dokumentasi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'url_youtube',
        'status',
        'urutan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}

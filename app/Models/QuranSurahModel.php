<?php

namespace App\Models;

use CodeIgniter\Model;

class QuranSurahModel extends Model
{
    protected $table            = 'quran_surah';
    protected $primaryKey       = 'nomor';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nomor', 'nama', 'nama_latin', 'jumlah_ayat', 'tempat_turun', 'arti'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class QuranAyatModel extends Model
{
    protected $table            = 'quran_ayat';
    protected $primaryKey       = 'ayat_id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['surah_nomor', 'nomor_ayat', 'teks_arab', 'teks_indonesia'];
}

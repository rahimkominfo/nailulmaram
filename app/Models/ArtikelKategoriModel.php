<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelKategoriModel extends Model
{
    protected $table            = 'artikel_kategori';
    protected $primaryKey       = 'artikel_id'; // Note: composite PK not well-supported by CI4 Model, usually use one field or use query builder
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['artikel_id', 'kategori_id'];
}

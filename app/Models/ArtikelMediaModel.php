<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelMediaModel extends Model
{
    protected $table            = 'artikel_media';
    protected $primaryKey       = 'artikel_id'; 
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['artikel_id', 'media_id', 'urutan', 'is_featured'];
}

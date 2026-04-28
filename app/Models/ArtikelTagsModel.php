<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelTagsModel extends Model
{
    protected $table            = 'artikel_tags';
    protected $primaryKey       = 'artikel_id'; 
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['artikel_id', 'tag_id'];
}

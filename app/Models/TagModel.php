<?php

namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table            = 'tags';
    protected $primaryKey       = 'tag_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'slug'];

    // Validation
    protected $validationRules      = [
        'nama' => 'required|max_length[50]',
        'slug' => 'required|max_length[50]|is_unique[tags.slug,tag_id,{tag_id}]',
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $primaryKey       = 'kategori_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'slug', 'kategori_induk_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama'              => 'required|max_length[100]',
        'slug'              => 'required|max_length[100]|is_unique[kategori.slug,kategori_id,{kategori_id}]',
        'kategori_induk_id' => 'permit_empty|is_not_unique[kategori.kategori_id]',
    ];
}

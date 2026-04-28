<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'artikel_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'slug', 'konten', 'gambar_utama', 'abstrak', 
        'penulis_id', 'status', 'jumlah_tayang'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_publikasi';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'judul'      => 'required|max_length[255]',
        'slug'       => 'required|max_length[255]|is_unique[artikel.slug,artikel_id,{artikel_id}]',
        'konten'     => 'required',
        'penulis_id' => 'required|is_not_unique[penulis.penulis_id]',
        'status'     => 'required|in_list[Draf,Ditayangkan,Diarsipkan]',
    ];
}

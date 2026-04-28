<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table            = 'komentar';
    protected $primaryKey       = 'komentar_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'artikel_id', 'nama_pengunjung', 'email_pengunjung', 
        'isi_komentar', 'status', 'komentar_induk_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'artikel_id'       => 'required|is_not_unique[artikel.artikel_id]',
        'nama_pengunjung'  => 'required|max_length[100]',
        'email_pengunjung' => 'permit_empty|valid_email|max_length[100]',
        'isi_komentar'     => 'required',
        'status'           => 'required|in_list[Disetujui,Menunggu,Spam]',
        'komentar_induk_id'=> 'permit_empty|is_not_unique[komentar.komentar_id]',
    ];
}

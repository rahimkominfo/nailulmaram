<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilMasjidModel extends Model
{
    protected $table            = 'profil_masjid';
    protected $primaryKey       = 'profil_masjid_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_masjid', 'alamat_lengkap', 'telepon', 'whatsapp', 
        'instagram', 'youtube', 'facebook', 'latitude', 'longitude'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'nama_masjid'    => 'required|max_length[255]',
        'alamat_lengkap' => 'required',
        'telepon'        => 'permit_empty|max_length[20]',
        'whatsapp'       => 'permit_empty|max_length[20]',
        'instagram'      => 'permit_empty|max_length[255]',
        'youtube'        => 'permit_empty|max_length[255]',
        'facebook'       => 'permit_empty|max_length[255]',
    ];
}

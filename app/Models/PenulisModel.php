<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table            = 'penulis';
    protected $primaryKey       = 'penulis_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'email', 'password', 'nama_publik', 'peran'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true; 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_daftar';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'username'    => 'required|alpha_numeric_space|min_length[3]|max_length[50]|is_unique[penulis.username,penulis_id,{penulis_id}]',
        'email'       => 'required|valid_email|max_length[100]|is_unique[penulis.email,penulis_id,{penulis_id}]',
        'password'    => 'required|min_length[8]',
        'nama_publik' => 'required|min_length[3]|max_length[100]',
        'peran'       => 'required|in_list[Admin,Editor,Kontributor]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}

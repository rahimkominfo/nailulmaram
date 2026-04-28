<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriberModel extends Model
{
    protected $table            = 'subscribers';
    protected $primaryKey       = 'subscriber_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'email'  => 'required|valid_email|max_length[100]|is_unique[subscribers.email,subscriber_id,{subscriber_id}]',
        'status' => 'required|in_list[Aktif,Tidak Aktif,Batal]',
    ];
}

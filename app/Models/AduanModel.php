<?php

namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table            = 'aduan';
    protected $primaryKey       = 'aduan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_tiket',
        'nama_pengirim',
        'kontak_pengirim',
        'aduan_tujuan_id',
        'judul_aduan',
        'isi_aduan',
        'lampiran_file',
        'status_aduan',
        'tanggapan_pengurus'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'waktu_dibuat';
    protected $updatedField  = 'waktu_diperbarui';

    /**
     * Get aduan with goal and pengurus info
     */
    public function getAduanWithPengurus($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('aduan.*, aduan_tujuan.nama_aduan_tujuan, pengurus.nama as nama_pengurus, pengurus.jabatan');
        $builder->join('aduan_tujuan', 'aduan_tujuan.aduan_tujuan_id = aduan.aduan_tujuan_id');
        $builder->join('pengurus', 'pengurus.pengurus_id = aduan_tujuan.pengurus_id');
        
        if ($id !== null) {
            $builder->where('aduan.aduan_id', $id);
            return $builder->get()->getRowArray();
        }

        $builder->orderBy('aduan.waktu_dibuat', 'DESC');
        return $builder->get()->getResultArray();
    }

    /**
     * Search and Filter Aduan
     */
    public function searchAduan($keyword = '', $status = '', $bidang = '')
    {
        $builder = $this->db->table($this->table);
        $builder->select('aduan.*, aduan_tujuan.nama_aduan_tujuan');
        $builder->join('aduan_tujuan', 'aduan_tujuan.aduan_tujuan_id = aduan.aduan_tujuan_id');

        if (!empty($keyword)) {
            $builder->groupStart()
                    ->like('aduan.kode_tiket', $keyword)
                    ->orLike('aduan.nama_pengirim', $keyword)
                    ->orLike('aduan.judul_aduan', $keyword)
                    ->groupEnd();
        }

        if (!empty($status) && $status !== 'all') {
            $builder->where('aduan.status_aduan', $status);
        }

        if (!empty($bidang) && $bidang !== 'all') {
            $builder->where('aduan.aduan_tujuan_id', $bidang);
        }

        $builder->orderBy('aduan.waktu_dibuat', 'DESC');
        return $builder->get()->getResultArray();
    }
}

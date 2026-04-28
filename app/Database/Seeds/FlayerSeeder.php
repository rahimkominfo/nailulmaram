<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FlayerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'Fiqih Ibadah Kontemporer',
                'gambar_url' => 'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?auto=format&fit=crop&q=80&w=800',
                'label'      => 'Kajian Rutin',
                'status'     => 'Aktif',
                'urutan'     => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Pelatihan UMKM Berbasis Masjid',
                'gambar_url' => 'https://images.unsplash.com/photo-1597933534024-1647416345d3?auto=format&fit=crop&q=80&w=800',
                'label'      => 'Pemberdayaan',
                'status'     => 'Aktif',
                'urutan'     => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => "I'tikaf Sepuluh Hari Terakhir",
                'gambar_url' => 'https://images.unsplash.com/photo-1621160471147-c5be030e199b?auto=format&fit=crop&q=80&w=800',
                'label'      => 'Ramadhan',
                'status'     => 'Aktif',
                'urutan'     => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Layanan Zakat & Infaq Digital',
                'gambar_url' => 'https://images.unsplash.com/photo-1590076215667-873d6f00918c?auto=format&fit=crop&q=80&w=800',
                'label'      => 'ZISWAF',
                'status'     => 'Aktif',
                'urutan'     => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'judul'      => 'Tahfidz Quran Untuk Anak-Anak',
                'gambar_url' => 'https://images.unsplash.com/photo-1519817650390-64a934479f67?auto=format&fit=crop&q=80&w=800',
                'label'      => 'Pendidikan',
                'status'     => 'Aktif',
                'urutan'     => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('flayer')->insertBatch($data);
    }
}

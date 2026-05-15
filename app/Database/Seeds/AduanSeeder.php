<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AduanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_tiket'        => 'ADU-20260506-001',
                'nama_pengirim'     => 'Ahmad Fauzi',
                'kontak_pengirim'   => '081234567890',
                'pengurus_id'       => 9, 
                'judul_aduan'       => 'Keran air wudhu rusak di sisi kanan',
                'isi_aduan'         => "Assalamu'alaikum. Saya ingin melaporkan bahwa keran air wudhu di sisi kanan masjid sudah rusak sejak kurang lebih 2 minggu yang lalu. Air terus menetes meskipun keran sudah ditutup. Mohon untuk segera diperbaiki. Terima kasih.",
                'status_aduan'      => 'Diproses',
                'waktu_dibuat'      => '2026-05-06 10:00:00'
            ],
            [
                'kode_tiket'        => 'ADU-20260505-003',
                'nama_pengirim'     => null,
                'kontak_pengirim'   => null,
                'pengurus_id'       => 9,
                'judul_aduan'       => 'Lampu parkiran mati sudah 1 minggu',
                'isi_aduan'         => "Lampu di area parkir motor bagian belakang mati. Sangat gelap kalau malam hari.",
                'status_aduan'      => 'Menunggu',
                'waktu_dibuat'      => '2026-05-05 20:15:00'
            ],
            [
                'kode_tiket'        => 'ADU-20260505-002',
                'nama_pengirim'     => 'Muh. Rizal',
                'kontak_pengirim'   => '085222333444',
                'pengurus_id'       => 12, 
                'judul_aduan'       => 'Saran: kajian rutin untuk pemuda',
                'isi_aduan'         => "Saran untuk pengurus agar mengadakan kajian rutin khusus pemuda di malam ahad.",
                'status_aduan'      => 'Menunggu',
                'waktu_dibuat'      => '2026-05-05 15:30:00'
            ],
            [
                'kode_tiket'        => 'ADU-20260504-001',
                'nama_pengirim'     => 'Hj. Rahmawati',
                'kontak_pengirim'   => 'rahma@example.com',
                'pengurus_id'       => 4, 
                'judul_aduan'       => 'Transparansi laporan keuangan',
                'isi_aduan'         => "Mohon papan informasi laporan keuangan masjid diperbarui setiap minggu.",
                'status_aduan'      => 'Diteruskan',
                'waktu_dibuat'      => '2026-05-04 09:00:00'
            ],
            [
                'kode_tiket'        => 'ADU-20260503-002',
                'nama_pengirim'     => 'Irfan Syawal',
                'kontak_pengirim'   => '08111222333',
                'pengurus_id'       => 9,
                'judul_aduan'       => 'AC ruang utama tidak dingin',
                'isi_aduan'         => "AC di shaft tengah sepertinya perlu diservis karena hanya keluar angin saja.",
                'status_aduan'      => 'Selesai',
                'tanggapan_pengurus'=> 'Terima kasih laporannya. AC sudah diservis dan freon sudah diisi ulang pada 4 Mei 2026.',
                'waktu_dibuat'      => '2026-05-03 14:00:00'
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('aduan')->insert($item);
        }
    }
}

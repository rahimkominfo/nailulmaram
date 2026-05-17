<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MobilJenazahModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class MobilJenazah extends BaseController
{
    public function index()
    {
        $model = new MobilJenazahModel();
        
        // Ambil input dari query string
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');

        // Jika tidak ada parameter di URL (akses pertama kali atau reset), gunakan default sekarang
        if ($this->request->getGet('tahun') === null && $this->request->getGet('bulan') === null) {
            $tahun = date('Y');
            $bulan = date('m');
        }

        $query = $model->orderBy('tanggal', 'DESC');

        if ($tahun) {
            $query->where('YEAR(tanggal)', $tahun);
        }
        if ($bulan) {
            $query->where('MONTH(tanggal)', $bulan);
        }

        // Ambil daftar tahun yang tersedia di database
        $db = \Config\Database::connect();
        $listTahunResult = $db->table('mobil_jenazah')
                        ->select('YEAR(tanggal) as tahun')
                        ->distinct()
                        ->orderBy('tahun', 'DESC')
                        ->get()->getResultArray();
        
        // Pastikan tahun sekarang ada dalam list meskipun belum ada data di DB (agar bisa dipilih)
        $listTahun = array_column($listTahunResult, 'tahun');
        if (!in_array(date('Y'), $listTahun)) {
            $listTahun[] = date('Y');
            rsort($listTahun);
        }
        
        $listBulan = [
            ['val' => '01', 'nama' => 'Januari'],
            ['val' => '02', 'nama' => 'Februari'],
            ['val' => '03', 'nama' => 'Maret'],
            ['val' => '04', 'nama' => 'April'],
            ['val' => '05', 'nama' => 'Mei'],
            ['val' => '06', 'nama' => 'Juni'],
            ['val' => '07', 'nama' => 'Juli'],
            ['val' => '08', 'nama' => 'Agustus'],
            ['val' => '09', 'nama' => 'September'],
            ['val' => '10', 'nama' => 'Oktober'],
            ['val' => '11', 'nama' => 'November'],
            ['val' => '12', 'nama' => 'Desember'],
        ];

        $data = [
            'title'     => 'Layanan Mobil Jenazah',
            'layanan'   => $query->findAll(),
            'filter'    => [
                'tahun' => $tahun,
                'bulan' => $bulan
            ],
            'listTahun' => $listTahun,
            'listBulan' => $listBulan
        ];
        return view('admin/mobil_jenazah/index', $data);
    }

    public function exportPdf()
    {
        $model = new MobilJenazahModel();
        
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');

        // Jika tidak ada parameter di URL (akses pertama kali atau reset), gunakan default sekarang
        if ($tahun === null && $bulan === null) {
            $tahun = date('Y');
            $bulan = date('m');
        }

        $query = $model->orderBy('tanggal', 'ASC');

        if ($tahun) {
            $query->where('YEAR(tanggal)', $tahun);
        }
        if ($bulan) {
            $query->where('MONTH(tanggal)', $bulan);
        }

        $listBulan = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember',
        ];

        $data = [
            'title'   => 'Laporan Layanan Mobil Jenazah',
            'layanan' => $query->findAll(),
            'filter'  => [
                'tahun'      => $tahun,
                'bulan'      => $bulan,
                'nama_bulan' => $bulan ? $listBulan[$bulan] : 'Semua Bulan'
            ]
        ];

        $html = view('admin/mobil_jenazah/pdf_report', $data);

        // Dompdf configuration
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        
        $filename = 'Laporan_Mobil_Jenazah_' . ($tahun ?: 'SemuaTahun') . '_' . ($bulan ?: 'SemuaBulan') . '.pdf';
        
        return $this->response->setHeader('Content-Type', 'application/pdf')
                              ->setBody($dompdf->output());
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Layanan Mobil Jenazah'
        ];
        return view('admin/mobil_jenazah/form', $data);
    }

    public function store()
    {
        $model = new MobilJenazahModel();

        $rules = [
            'tanggal'       => 'required|valid_date',
            'jenis_layanan' => 'required|max_length[100]',
            'nama_almarhum' => 'permit_empty|max_length[150]',
            'lokasi_penjemputan' => 'permit_empty|max_length[255]',
            'lokasi_disalatkan'  => 'permit_empty|max_length[255]',
            'lokasi_tujuan'      => 'required|max_length[255]',
            'keterangan'         => 'permit_empty',
            'status'             => 'required|in_list[draft,published,archived]',
            'foto_dokumentasi'   => 'permit_empty|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'            => $this->request->getPost('tanggal'),
            'jenis_layanan'      => $this->request->getPost('jenis_layanan'),
            'nama_almarhum'      => $this->request->getPost('nama_almarhum'),
            'lokasi_penjemputan' => $this->request->getPost('lokasi_penjemputan'),
            'lokasi_disalatkan'  => $this->request->getPost('lokasi_disalatkan'),
            'lokasi_tujuan'      => $this->request->getPost('lokasi_tujuan'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'status'             => $this->request->getPost('status'),
            'foto_dokumentasi'   => $this->request->getPost('foto_dokumentasi')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil disimpan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function show($id)
    {
        $model = new MobilJenazahModel();
        $layanan = $model->find($id);

        if (!$layanan) {
            return redirect()->to('/admin/mobil-jenazah')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'   => 'Detail Layanan Mobil Jenazah',
            'layanan' => $layanan
        ];
        return view('admin/mobil_jenazah/show', $data);
    }

    public function edit($id)
    {
        $model = new MobilJenazahModel();
        $layanan = $model->find($id);

        if (!$layanan) {
            return redirect()->to('/admin/mobil-jenazah')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'   => 'Edit Layanan Mobil Jenazah',
            'layanan' => $layanan
        ];
        return view('admin/mobil_jenazah/form', $data);
    }

    public function update($id)
    {
        $model = new MobilJenazahModel();
        
        $rules = [
            'tanggal'       => 'required|valid_date',
            'jenis_layanan' => 'required|max_length[100]',
            'nama_almarhum' => 'permit_empty|max_length[150]',
            'lokasi_penjemputan' => 'permit_empty|max_length[255]',
            'lokasi_disalatkan'  => 'permit_empty|max_length[255]',
            'lokasi_tujuan'      => 'required|max_length[255]',
            'keterangan'         => 'permit_empty',
            'status'             => 'required|in_list[draft,published,archived]',
            'foto_dokumentasi'   => 'permit_empty|max_length[255]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tanggal'            => $this->request->getPost('tanggal'),
            'jenis_layanan'      => $this->request->getPost('jenis_layanan'),
            'nama_almarhum'      => $this->request->getPost('nama_almarhum'),
            'lokasi_penjemputan' => $this->request->getPost('lokasi_penjemputan'),
            'lokasi_disalatkan'  => $this->request->getPost('lokasi_disalatkan'),
            'lokasi_tujuan'      => $this->request->getPost('lokasi_tujuan'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'status'             => $this->request->getPost('status'),
            'foto_dokumentasi'   => $this->request->getPost('foto_dokumentasi')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function delete($id)
    {
        $model = new MobilJenazahModel();
        if ($model->delete($id)) {
            return redirect()->to('/admin/mobil-jenazah')->with('success', 'Data layanan mobil jenazah berhasil dihapus.');
        }
        return redirect()->to('/admin/mobil-jenazah')->with('error', 'Gagal menghapus data.');
    }
}

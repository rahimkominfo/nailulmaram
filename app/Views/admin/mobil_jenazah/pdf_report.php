<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        @page {
            size: A4 portrait;
            margin: 1.5cm;
        }
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 11pt;
            color: #333;
            line-height: 1.5;
        }
        .header-table {
            width: 100%;
            border-bottom: 3px double #000;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }
        .header-logo {
            width: 80px;
            text-align: left;
        }
        .header-text {
            text-align: center;
        }
        .header-text h1 {
            text-transform: uppercase;
            margin: 0;
            font-size: 18pt;
            color: #064E3B;
        }
        .header-text p {
            margin: 2px 0;
            font-size: 9pt;
            color: #666;
        }
        .report-title {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 25px;
            text-transform: uppercase;
            font-size: 14pt;
        }
        .item {
            margin-bottom: 35px;
            page-break-inside: avoid;
        }
        .item-header {
            font-weight: bold;
            font-size: 12pt;
            margin-bottom: 8px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .documentation-img {
            max-width: 100%;
            height: auto;
            max-height: 350px;
            display: block;
            margin: 12px 0;
            border: 1px solid #ddd;
            padding: 4px;
            border-radius: 8px;
        }
        .narrative {
            text-align: justify;
            background-color: #fcfcfc;
            padding: 10px;
            border-left: 3px solid #064E3B;
            font-style: italic;
        }
        .footer {
            margin-top: 60px;
            text-align: right;
        }
        .signature {
            margin-top: 20px;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    /**
     * Helper untuk mengubah gambar menjadi base64 agar aman di PDF
     * Mendukung path lokal maupun URL full
     */
    function base64_img($input, $subdir = '') {
        // Jika input adalah URL full, coba ambil path lokalnya
        if (filter_var($input, FILTER_VALIDATE_URL)) {
            $filename = basename($input);
            $path = FCPATH . ($subdir ? $subdir . '/' : '') . $filename;
        } else {
            $path = FCPATH . ($subdir ? $subdir . '/' : '') . $input;
        }

        if (file_exists($path) && is_file($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        
        // Fallback jika file tidak ditemukan secara lokal tapi input adalah URL
        if (filter_var($input, FILTER_VALIDATE_URL)) {
            return $input;
        }

        return null;
    }

    function getIndoDateParts($date) {
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $months = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        
        $timestamp = strtotime($date);
        return [
            'hari' => $days[date('w', $timestamp)],
            'tgl'  => date('d', $timestamp),
            'bln'  => $months[date('m', $timestamp)],
            'thn'  => date('Y', $timestamp)
        ];
    }
    ?>

    <table class="header-table">
        <tr>
            <td class="header-logo">
                <?php $logo = base64_img('images/logo_masjid.jpeg'); ?>
                <?php if ($logo): ?>
                    <img src="<?= $logo ?>" style="width: 80px; height: 80px;">
                <?php endif; ?>
            </td>
            <td class="header-text">
                <h1>Masjid Jami Nailul Maram</h1>
                <p>Kel. Lappa, Kec. Sinjai Utara, Kab. Sinjai, Prov. Sulawesi Selatan</p>
                <p>Website: nailulmaram.id</p>
            </td>
            <td class="header-logo" style="text-align: right;">
                 <!-- Placeholder for symmetry -->
            </td>
        </tr>
    </table>

    <div class="report-title">
        LAPORAN PENGGUNAAN MOBIL JENAZAH<br>
        PERIODE <?= strtoupper($filter['nama_bulan']) ?> <?= $filter['tahun'] ?>
    </div>

    <?php if(empty($layanan)): ?>
        <p style="text-align: center; font-style: italic; color: #999;">Tidak ada data laporan untuk periode ini.</p>
    <?php else: ?>
        <?php $no = 1; foreach($layanan as $l): 
            $d = getIndoDateParts($l['tanggal']);
            $namaAlmarhum = $l['nama_almarhum'] ?: '(Tanpa Nama)';
        ?>
            <div class="item">
                <div class="item-header">
                    <?= $no++ ?>. <?= strtoupper($namaAlmarhum) ?>
                </div>
                
                <?php if ($l['foto_dokumentasi']): ?>
                    <?php $foto = base64_img($l['foto_dokumentasi'], 'uploads/mobil_jenazah'); ?>
                    <?php if ($foto): ?>
                        <img src="<?= $foto ?>" class="documentation-img">
                    <?php endif; ?>
                <?php endif; ?>

                <div class="narrative">
                    <?php if ($l['jenis_layanan'] === 'Pengantaran ke Pemakaman'): ?>
                        Pada Hari <?= $d['hari'] ?> Tanggal <?= $d['tgl'] ?> Bulan <?= $d['bln'] ?> Tahun <?= $d['thn'] ?>, <?= $l['jenis_layanan'] ?> jenazah <?= $namaAlmarhum ?> dari <?= $l['lokasi_penjemputan'] ?: '-' ?> ke <?= $l['lokasi_disalatkan'] ?: '-' ?> untuk disholatkan lalu dibawa ke <?= $l['lokasi_tujuan'] ?>, keterangan: <?= $l['keterangan'] ?: '-' ?>
                    <?php else: ?>
                        Pada Hari <?= $d['hari'] ?> Tanggal <?= $d['tgl'] ?> Bulan <?= $d['bln'] ?> Tahun <?= $d['thn'] ?>, <?= $l['jenis_layanan'] ?> <?= $namaAlmarhum ?> dari <?= $l['lokasi_penjemputan'] ?: '-' ?> ke <?= $l['lokasi_tujuan'] ?>, keterangan: <?= $l['keterangan'] ?: '-' ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="footer">
        <p>Sinjai, <?= date('d') ?> <?= [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ][date('m')] ?> <?= date('Y') ?></p>
        <div class="signature">
            <p>Pengurus Masjid Jami Nailul Maram <br> Ketua,</p>
            <br><br><br><br>
            <p><strong>Muzawwir, S.Pd.I, M.Pd</strong></p>
        </div>
    </div>
</body>
</html>

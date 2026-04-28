<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\GaleriModel;
use CodeIgniter\Controller;

class Sitemap extends Controller
{
    public function index()
    {
        // Matikan error reporting agar warning tidak merusak XML
        error_reporting(0);
        ini_set('display_errors', '0');

        $artikelModel = new ArtikelModel();
        $galeriModel = new GaleriModel();

        // Ambil artikel yang sudah ditayangkan
        $artikels = $artikelModel->where('status', 'Ditayangkan')->findAll();
        
        // Ambil semua galeri
        $galeris = $galeriModel->findAll();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Home
        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . base_url() . '</loc>' . PHP_EOL;
        $xml .= '        <priority>1.0</priority>' . PHP_EOL;
        $xml .= '        <changefreq>daily</changefreq>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;

        // Profil
        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . base_url('profil') . '</loc>' . PHP_EOL;
        $xml .= '        <priority>0.8</priority>' . PHP_EOL;
        $xml .= '        <changefreq>monthly</changefreq>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;

        // Berita
        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . base_url('berita') . '</loc>' . PHP_EOL;
        $xml .= '        <priority>0.9</priority>' . PHP_EOL;
        $xml .= '        <changefreq>daily</changefreq>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;

        // Galeri
        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . base_url('galeri') . '</loc>' . PHP_EOL;
        $xml .= '        <priority>0.7</priority>' . PHP_EOL;
        $xml .= '        <changefreq>weekly</changefreq>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;

        // Dinamis Artikel
        foreach ($artikels as $artikel) {
            $dateStr = $artikel['updated_at'] ?? $artikel['tanggal_publikasi'] ?? date('Y-m-d');
            $lastmod = date('Y-m-d', strtotime($dateStr));
            $xml .= '    <url>' . PHP_EOL;
            $xml .= '        <loc>' . base_url('berita/baca/' . $artikel['slug']) . '</loc>' . PHP_EOL;
            $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
            $xml .= '        <priority>0.8</priority>' . PHP_EOL;
            $xml .= '        <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '    </url>' . PHP_EOL;
        }

        // Dinamis Galeri Album
        foreach ($galeris as $galeri) {
            $dateStr = $galeri['updated_at'] ?? $galeri['created_at'] ?? date('Y-m-d');
            $lastmod = date('Y-m-d', strtotime($dateStr));
            $xml .= '    <url>' . PHP_EOL;
            $xml .= '        <loc>' . base_url('galeri/album/' . $galeri['galeri_id']) . '</loc>' . PHP_EOL;
            $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
            $xml .= '        <priority>0.6</priority>' . PHP_EOL;
            $xml .= '        <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '    </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        // Bersihkan output buffer jika ada yang sudah terlanjur keluar
        if (ob_get_level() > 0) {
            ob_clean();
        }

        // Kirim langsung dan exit untuk menghindari filter/toolbar yang mungkin merusak XML
        $this->response->setXML(trim($xml))->send();
        exit;
    }
}

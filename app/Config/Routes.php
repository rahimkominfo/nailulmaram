<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('qurban', 'Home::qurban');
$routes->get('profil', 'Profil::index');
$routes->get('profil/pengurus', 'Profil::pengurus');
$routes->get('cerita-inspiratif', 'Cerita::index');
$routes->get('sitemap.xml', 'Sitemap::index');

// Public News
$routes->get('berita', 'Berita::index');
$routes->get('berita/baca/(:segment)', 'Berita::baca/$1');

// Public Quran
$routes->get('quran', 'Quran::index');
$routes->get('quran/(:num)', 'Quran::surah/$1');

// Public Gallery
$routes->get('galeri', 'Galeri::index');
$routes->get('galeri/album/(:num)', 'Galeri::album/$1');

// Admin Auth
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login/attempt', 'Admin\Auth::attemptLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Group (Protected)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Modul Profil
    $routes->get('profil', 'Admin\Profil::index');
    $routes->post('profil/update', 'Admin\Profil::update');

    // Modul Kategori
    $routes->get('kategori', 'Admin\Kategori::index');
    $routes->post('kategori/store', 'Admin\Kategori::store');
    $routes->post('kategori/update', 'Admin\Kategori::update');
    $routes->get('kategori/delete/(:num)', 'Admin\Kategori::delete/$1');

    // Modul Artikel
    $routes->get('artikel', 'Admin\Artikel::index');
    $routes->get('artikel/tambah', 'Admin\Artikel::tambah');
    $routes->post('artikel/store', 'Admin\Artikel::store');
    $routes->get('artikel/edit/(:num)', 'Admin\Artikel::edit/$1');
    $routes->post('artikel/update/(:num)', 'Admin\Artikel::update/$1');
    $routes->get('artikel/delete/(:num)', 'Admin\Artikel::delete/$1');

    // Modul Galeri
    $routes->get('galeri', 'Admin\Galeri::index');
    $routes->get('galeri/tambah', 'Admin\Galeri::tambah');
    $routes->post('galeri/store', 'Admin\Galeri::store');
    $routes->get('galeri/edit/(:num)', 'Admin\Galeri::edit/$1');
    $routes->post('galeri/update/(:num)', 'Admin\Galeri::update/$1');
    $routes->get('galeri/delete/(:num)', 'Admin\Galeri::delete/$1');
    $routes->get('galeri/view/(:num)', 'Admin\Galeri::view/$1');
    $routes->post('galeri/upload-gambar', 'Admin\Galeri::uploadGambar');
    $routes->get('galeri/hapus-gambar/(:num)', 'Admin\Galeri::hapusGambar/$1');

    // Modul Media
    $routes->get('media', 'Admin\Media::index');
    $routes->post('media/store', 'Admin\Media::store');
    $routes->get('media/delete/(:num)', 'Admin\Media::delete/$1');

    // Modul Penulis (Admin Only)
    $routes->get('penulis', 'Admin\Penulis::index');
    $routes->get('penulis/tambah', 'Admin\Penulis::tambah');
    $routes->post('penulis/store', 'Admin\Penulis::store');
    $routes->get('penulis/edit/(:num)', 'Admin\Penulis::edit/$1');
    $routes->post('penulis/update/(:num)', 'Admin\Penulis::update/$1');
    $routes->get('penulis/delete/(:num)', 'Admin\Penulis::delete/$1');

    // Modul Jadwal Sholat
    $routes->get('jadwal', 'Admin\Jadwal::index');
    $routes->post('jadwal/sync', 'Admin\Jadwal::sync');
    $routes->get('jadwal/edit/(:segment)', 'Admin\Jadwal::edit/$1');
    $routes->post('jadwal/update/(:segment)', 'Admin\Jadwal::update/$1');

    // Modul Flayer
    $routes->get('flayer', 'Admin\Flayer::index');
    $routes->get('flayer/tambah', 'Admin\Flayer::tambah');
    $routes->post('flayer/store', 'Admin\Flayer::store');
    $routes->get('flayer/edit/(:num)', 'Admin\Flayer::edit/$1');
    $routes->post('flayer/update/(:num)', 'Admin\Flayer::update/$1');
    $routes->get('flayer/delete/(:num)', 'Admin\Flayer::delete/$1');
});

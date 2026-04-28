<?php

// Seed data script for nailul_maram_db
require_once __DIR__ . '/vendor/autoload.php';

// Bootstrap CI4 environment
define('FCPATH', __DIR__ . '/public' . DIRECTORY_SEPARATOR);
require __DIR__ . '/app/Config/Paths.php';
$paths = new Config\Paths();
require __DIR__ . '/vendor/codeigniter4/framework/system/bootstrap.php';

$db = \Config\Database::connect();

// 1. Seed profil_masjid
$db->table('profil_masjid')->insert([
    'profil_masjid_id' => 1,
    'nama_masjid' => 'Masjid Jami Nailul Maram',
    'alamat_lengkap' => 'Jl. Poros Sulawesi No. 123, Kabupaten Bone, Sulawesi Selatan.',
    'telepon' => '0812-3456-7890',
    'whatsapp' => '0812-3456-7890',
    'instagram' => 'https://instagram.com/masjidjami',
    'youtube' => 'https://youtube.com/masjidjami',
    'facebook' => 'https://facebook.com/masjidjami',
    'latitude' => '-5.1246',
    'longitude' => '120.2530'
]);

// 2. Seed penulis (Admin)
$password = password_hash('admin123', PASSWORD_DEFAULT);
$db->table('penulis')->insert([
    'username' => 'admin',
    'email' => 'admin@mail.com',
    'password' => $password,
    'nama_publik' => 'Administrator',
    'peran' => 'Admin'
]);

echo "Seeding completed successfully.
";

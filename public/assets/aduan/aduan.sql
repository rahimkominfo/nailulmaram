CREATE TABLE `pengurus` (
  `pengurus_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(150) NOT NULL,
  `foto` TEXT DEFAULT NULL,
  `jabatan` VARCHAR(100) NOT NULL,
  `jenis` ENUM('harian','bidang') NOT NULL,
  `bidang` VARCHAR(150) DEFAULT NULL,
  `sub_bidang` VARCHAR(150) DEFAULT NULL,
  `ikon` VARCHAR(50) DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `pengurus`
(`nama`, `foto`, `jabatan`, `jenis`, `bidang`, `sub_bidang`, `ikon`)
VALUES
('Muzawwir, S.Pd.I, M.Pd', 'https://lh3.googleusercontent.com/a/default-user', 'Ketua', 'harian', NULL, NULL, NULL),
('H. Safri, B.Sc', 'https://lh3.googleusercontent.com/a/default-user', 'Wakil Ketua', 'harian', NULL, NULL, NULL),
('Takdir Kahar, S.Pd, M.Pd', 'https://lh3.googleusercontent.com/a/default-user', 'Sekretaris', 'harian', NULL, NULL, NULL),
('H. Basri Nurdin', 'https://lh3.googleusercontent.com/a/default-user', 'Bendahara', 'harian', NULL, NULL, NULL),
('Abd. Samad', 'https://lh3.googleusercontent.com/a/default-user', 'Wakil Bendahara', 'harian', NULL, NULL, NULL);

INSERT INTO `pengurus`
(`nama`, `foto`, `jabatan`, `jenis`, `bidang`, `sub_bidang`, `ikon`)
VALUES
('Abduh Isra Madya', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Ibadah & Dakwah', 'Sub Bidang Dakwah & Hari Besar Islam', 'mosque'),
('Ust. Ishak Amir, S.Pd.I, M.Pd', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Ibadah & Dakwah', 'Sub Imam Masjid Jami Nailul Maram', 'mosque'),
('Djubirusman Madya', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Pembangunan', NULL, 'construction'),
('Sanusi Madya MRzz', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Sarana & Prasarana', NULL, 'inventory_2'),
('Abdul Rahman', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Humas & IT', NULL, 'groups'),
('Nasrullah', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Pengawas LPQ', NULL, 'menu_book'),
('Sabri Hidayat', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Remaja Masjid', NULL, 'diversity_3'),
('Zakaria Amiruddin Akil', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Perpustakaan', NULL, 'local_library'),
('H. Mappaselle', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Dana', NULL, 'volunteer_activism'),
('Dra. Hj. Haerati', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Muslimah', 'Sub Bidang Kajian & Dakwah Muslimah', 'face_4'),
('Hj. Hilda Ismail, S.Pd, M.M.', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Muslimah', 'Sub Bidang Kesehatan, Sosial & Ekonomi Muslimah', 'face_4'),
('Hj. Nurlina', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Muslimah', 'Sub Bidang Kreativitas & Keterampilan Muslimah', 'face_4'),
('AKP. Mukhsin Sirajuddin, S.Sos, M.Si', 'https://lh3.googleusercontent.com/a/default-user', 'Koordinator', 'bidang', 'Bidang Keamanan', NULL, 'security');

CREATE TABLE `aduan` (
  `aduan_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_tiket` VARCHAR(50) NOT NULL COMMENT 'ID unik untuk tracking (contoh: ADU-20260502-001)',
  `nama_pengirim` VARCHAR(150) DEFAULT NULL COMMENT 'Nama jamaah (NULL jika anonim)',
  `kontak_pengirim` VARCHAR(100) DEFAULT NULL COMMENT 'WhatsApp atau Email untuk notifikasi balasan',
  `pengurus_id` INT(11) NOT NULL COMMENT 'Relasi ke tabel pengurus',
  `judul_aduan` VARCHAR(255) NOT NULL COMMENT 'Judul aduan',
  `isi_aduan` TEXT NOT NULL COMMENT 'Isi lengkap aduan',
  `lampiran_file` VARCHAR(255) DEFAULT NULL COMMENT 'Path file foto/dokumen (opsional)',
  `status_aduan` ENUM('Menunggu', 'Diproses', 'Selesai', 'Ditolak') NOT NULL DEFAULT 'Menunggu',
  `tanggapan_pengurus` TEXT DEFAULT NULL COMMENT 'Jawaban atau solusi dari pengurus',
  `waktu_dibuat` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu masuk aduan',
  `waktu_diperbarui` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu aduan direspon/diupdate',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aduan_kode_tiket_unique` (`kode_tiket`),
  KEY `aduan_id_pengurus_foreign` (`pengurus_id`),
  CONSTRAINT `fk_aduan_pengurus` FOREIGN KEY (`pengurus_id`) REFERENCES `pengurus` (`pengurus_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

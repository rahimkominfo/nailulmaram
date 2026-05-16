<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10">
        <a href="<?= base_url('admin/mobil-jenazah') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 max-w-4xl mx-auto">
        <h3 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-8 border-b-4 border-blue-600 w-fit pb-2">
            <?= isset($layanan) ? 'Edit' : 'Tambah' ?> Layanan Mobil Jenazah
        </h3>
        
        <?php if (session()->has('errors')) : ?>
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl">
                <p class="font-bold text-xs uppercase tracking-widest mb-2">Terjadi Kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form action="<?= isset($layanan) ? base_url('admin/mobil-jenazah/update/'.$layanan['id']) : base_url('admin/mobil-jenazah/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="tanggal">Tanggal Layanan</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="tanggal" name="tanggal" type="date" value="<?= old('tanggal', isset($layanan) ? $layanan['tanggal'] : date('Y-m-d')) ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="jenis_layanan">Jenis Layanan</label>
                        <select class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="jenis_layanan" name="jenis_layanan" required>
                            <option value="Pengantaran ke Pemakaman" <?= old('jenis_layanan', isset($layanan) ? $layanan['jenis_layanan'] : '') == 'Pengantaran ke Pemakaman' ? 'selected' : '' ?>>Pengantaran ke Pemakaman</option>
                            <option value="Penjemputan Jenazah" <?= old('jenis_layanan', isset($layanan) ? $layanan['jenis_layanan'] : '') == 'Penjemputan Jenazah' ? 'selected' : '' ?>>Penjemputan Jenazah</option>
                            <option value="Lainnya" <?= old('jenis_layanan', isset($layanan) ? $layanan['jenis_layanan'] : '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="nama_almarhum">Nama Almarhum / Almarhumah</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="nama_almarhum" name="nama_almarhum" type="text" value="<?= old('nama_almarhum', isset($layanan) ? $layanan['nama_almarhum'] : '') ?>" placeholder="Masukkan nama...">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="status">Status</label>
                        <select class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="status" name="status" required>
                            <option value="draft" <?= old('status', isset($layanan) ? $layanan['status'] : '') == 'draft' ? 'selected' : '' ?>>DRAFT</option>
                            <option value="published" <?= old('status', isset($layanan) ? $layanan['status'] : '') == 'published' ? 'selected' : '' ?>>PUBLISHED</option>
                            <option value="archived" <?= old('status', isset($layanan) ? $layanan['status'] : '') == 'archived' ? 'selected' : '' ?>>ARCHIVED</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="lokasi_penjemputan">Lokasi Penjemputan</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="lokasi_penjemputan" name="lokasi_penjemputan" type="text" value="<?= old('lokasi_penjemputan', isset($layanan) ? $layanan['lokasi_penjemputan'] : '') ?>" placeholder="Misal: Rumah Duka / RS...">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="lokasi_disalatkan">Lokasi Disalatkan</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="lokasi_disalatkan" name="lokasi_disalatkan" type="text" value="<?= old('lokasi_disalatkan', isset($layanan) ? $layanan['lokasi_disalatkan'] : '') ?>" placeholder="Misal: Masjid Nailul Maram...">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="lokasi_tujuan">Lokasi Tujuan</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="lokasi_tujuan" name="lokasi_tujuan" type="text" value="<?= old('lokasi_tujuan', isset($layanan) ? $layanan['lokasi_tujuan'] : '') ?>" placeholder="Misal: TPU Macanda..." required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="foto_dokumentasi">URL Foto Dokumentasi</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="foto_dokumentasi" name="foto_dokumentasi" type="text" value="<?= old('foto_dokumentasi', isset($layanan) ? $layanan['foto_dokumentasi'] : '') ?>" placeholder="URL gambar...">
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="keterangan">Keterangan</label>
                <textarea class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="keterangan" name="keterangan" rows="3"><?= old('keterangan', isset($layanan) ? $layanan['keterangan'] : '') ?></textarea>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-blue-200 transition duration-300 uppercase tracking-widest">
                    <?= isset($layanan) ? 'Perbarui' : 'Simpan' ?> Data Layanan
                </button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

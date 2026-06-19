<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800"><?= $title ?></h1>
    <a href="<?= base_url('admin/running-text') ?>" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
    </a>
</div>

<?php if(session()->getFlashdata('errors')): ?>
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
    <ul class="list-disc list-inside">
    <?php foreach(session()->getFlashdata('errors') as $err): ?>
        <li><?= $err ?></li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <form action="<?= base_url('admin/running-text/store') ?>" method="POST" class="p-6 space-y-6">
        <?= csrf_field() ?>
        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Teks</label>
            <textarea name="teks" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required><?= old('teks') ?></textarea>
            <p class="text-xs text-gray-500 mt-1">Teks yang akan berjalan di bagian atas/bawah halaman. Bisa berisi pengumuman atau ucapan.</p>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Link/Tautan (Opsional)</label>
            <input type="url" name="tautan" value="<?= old('tautan') ?>" placeholder="Contoh: https://google.com atau http://..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <p class="text-xs text-gray-500 mt-1">Jika diisi, teks berjalan dapat diklik dan akan mengarah ke link ini.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    <option value="Aktif" <?= old('status') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= old('status') == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Urutan Tampil (Opsional)</label>
                <input type="number" name="urutan" value="<?= old('urutan', '0') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            </div>
        </div>
        
        <div class="flex justify-end pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-bold">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

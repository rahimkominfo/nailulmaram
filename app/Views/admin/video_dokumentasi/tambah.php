<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="p-6 border-b border-gray-100">
        <h3 class="text-lg font-bold text-gray-800">Tambah Video Dokumentasi</h3>
    </div>

    <form action="<?= base_url('admin/video-dokumentasi/store') ?>" method="POST" class="p-6 space-y-6">
        <?= csrf_field() ?>

        <?php if(session('errors')): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    <?php foreach(session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Judul Video <span class="text-red-500">*</span></label>
            <input type="text" name="judul" value="<?= old('judul') ?>" required
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition" 
                placeholder="Masukkan judul video">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">URL YouTube <span class="text-red-500">*</span></label>
            <input type="url" name="url_youtube" value="<?= old('url_youtube') ?>" required
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition" 
                placeholder="https://www.youtube.com/watch?v=...">
            <p class="text-xs text-gray-500 mt-2">Masukkan URL lengkap video YouTube (contoh: https://www.youtube.com/watch?v=xxxxxxxxxxx)</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                <select name="status" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                    <option value="Aktif" <?= old('status') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="Tidak Aktif" <?= old('status') == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" name="urutan" value="<?= old('urutan', '0') ?>" min="0"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 outline-none transition">
                <p class="text-xs text-gray-500 mt-2">Urutan dari yang terkecil</p>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="<?= base_url('admin/video-dokumentasi') ?>" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition">Simpan Video</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10">
        <a href="<?= base_url('admin/flayer') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 max-w-4xl mx-auto">
        <h3 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-8 border-b-4 border-green-600 w-fit pb-2">Tambah Flayer Baru</h3>
        
        <form action="<?= base_url('admin/flayer/store') ?>" method="post">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="judul">Judul Flayer</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="judul" name="judul" type="text" placeholder="Contoh: Kajian Ramadhan" value="<?= old('judul') ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="label">Label (Opsional)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="label" name="label" type="text" placeholder="Contoh: Terbaru / Segera" value="<?= old('label') ?>">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-[10px] font-black mb-2 uppercase tracking-widest" for="urutan">Urutan Tampil</label>
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="urutan" name="urutan" type="number" value="<?= old('urutan', 0) ?>" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-[10px] font-black mb-2 uppercase tracking-widest" for="status">Status</label>
                            <select class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="status" name="status" required>
                                <option value="Aktif" <?= old('status') == 'Aktif' ? 'selected' : '' ?>>AKTIF</option>
                                <option value="Tidak Aktif" <?= old('status') == 'Tidak Aktif' ? 'selected' : '' ?>>TIDAK AKTIF</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="gambar_url">URL Gambar Flayer</label>
                        <div class="mt-2 flex flex-col items-center">
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold mb-4" id="gambar_url" name="gambar_url" type="url" placeholder="https://example.com/image.jpg" value="<?= old('gambar_url') ?>" oninput="updatePreview(this.value)" required>
                            
                            <div id="previewContainer" class="w-full aspect-video rounded-2xl overflow-hidden border-2 border-dashed border-gray-200 shadow-inner bg-gray-50">
                                <img id="imagePreview" src="https://placehold.co/600x400?text=Paste+URL+Above" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/600x400?text=Invalid+URL'">
                            </div>
                            <p class="text-[10px] text-gray-400 mt-2 font-bold italic text-center">Preview akan terupdate otomatis saat URL dimasukkan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-gray-100">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-green-200 transition duration-300 uppercase tracking-widest">
                    Simpan Flayer
                </button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        function updatePreview(url) {
            const preview = document.getElementById('imagePreview');
            if (url) {
                preview.src = url;
            } else {
                preview.src = 'https://placehold.co/600x400?text=Paste+URL+Above';
            }
        }
    </script>
<?= $this->endSection() ?>

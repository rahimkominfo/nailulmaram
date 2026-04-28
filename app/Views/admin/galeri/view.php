<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <a href="<?= base_url('admin/galeri') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest block mb-2">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
            </a>
            <h3 class="text-2xl font-black text-gray-800 tracking-tighter uppercase border-b-4 border-green-600 w-fit pb-1">Album: <?= $galeri['judul'] ?></h3>
        </div>
        
        <button onclick="document.getElementById('modalUpload').classList.remove('hidden')" class="bg-green-600 hover:bg-green-700 text-white font-black py-4 px-8 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest flex items-center">
            <i class="fas fa-upload mr-3"></i> Tambah Foto Ke Album
        </button>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if(empty($gambar)): ?>
            <div class="col-span-full bg-white p-20 rounded-3xl shadow-sm border border-gray-100 text-center">
                <i class="fas fa-images text-6xl text-gray-100 mb-6"></i>
                <p class="text-gray-400 font-bold italic">Album ini masih kosong. Silahkan tambahkan foto.</p>
            </div>
        <?php else: ?>
            <?php foreach($gambar as $img): ?>
                <div class="bg-white p-4 rounded-3xl shadow-sm border border-gray-100 group relative overflow-hidden">
                    <div class="h-40 rounded-2xl overflow-hidden mb-4">
                        <img src="<?= base_url('uploads/galeri/'.$img['gambar_url']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest truncate mr-2"><?= $img['caption'] ?: 'Tanpa Caption' ?></p>
                        <a href="<?= base_url('admin/galeri/hapus-gambar/'.$img['galeri_gambar_id']) ?>" onclick="return confirm('Hapus foto ini?')" class="w-8 h-8 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition flex items-center justify-center text-xs">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Modal Upload -->
    <div id="modalUpload" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 backdrop-blur-sm p-6">
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-lg">
            <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase mb-6 border-b-4 border-green-600 w-fit pb-2">Tambah Foto Baru</h3>
            <form action="<?= base_url('admin/galeri/upload-gambar') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="galeri_id" value="<?= $galeri['galeri_id'] ?>">
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Pilih Foto (Bisa pilih banyak)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 transition font-bold" type="file" name="gambar_url[]" multiple required>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="caption">Caption (Opsional)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 transition font-bold" id="caption" name="caption" type="text" placeholder="Masukkan keterangan singkat">
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <button type="button" onclick="document.getElementById('modalUpload').classList.add('hidden')" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-500 font-black py-4 rounded-2xl transition duration-300 uppercase tracking-widest">
                            Batal
                        </button>
                        <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                            Mulai Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

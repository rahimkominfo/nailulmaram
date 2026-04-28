<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10">
        <a href="<?= base_url('admin/galeri') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
        </a>
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
            <h3 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-8 border-b-4 border-green-600 w-fit pb-2">Buat Album Baru</h3>
            
            <form action="<?= base_url('admin/galeri/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="judul">Judul Album</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="judul" name="judul" type="text" placeholder="Contoh: Dokumentasi Ramadhan 1447 H" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="deskripsi">Deskripsi</label>
                        <textarea class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold h-32" id="deskripsi" name="deskripsi" placeholder="Ceritakan singkat tentang album ini..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Foto Sampul</label>
                        <div class="mt-2 flex flex-col items-center">
                            <div id="previewContainer" class="hidden mb-4 w-full h-56 rounded-3xl overflow-hidden border-2 border-dashed border-gray-200">
                                <img id="imagePreview" src="" class="w-full h-full object-cover">
                            </div>
                            <label class="w-full flex flex-col items-center px-4 py-8 bg-white text-green-600 rounded-2xl border-2 border-dashed border-gray-200 tracking-wide uppercase font-black cursor-pointer hover:bg-green-600 hover:text-white transition duration-300">
                                <i class="fas fa-camera text-3xl mb-2"></i>
                                <span>Pilih Foto Sampul</span>
                                <input type='file' class="hidden" name="sampul_url" onchange="previewImage(this)" accept="image/*" required />
                            </label>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                            Simpan & Lanjutkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const container = document.getElementById('previewContainer');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<?= $this->endSection() ?>

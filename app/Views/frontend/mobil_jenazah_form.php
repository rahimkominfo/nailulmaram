<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-green-600 p-8 text-white text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white/30">
                    <i class="fas fa-ambulance text-3xl"></i>
                </div>
                <h1 class="text-3xl font-black uppercase tracking-tighter">Lapor Layanan Mobil Jenazah</h1>
                <p class="text-green-100 font-medium mt-2">Silakan isi formulir penggunaan mobil jenazah di bawah ini.</p>
            </div>

            <div class="p-8 md:p-12">
                <?php if (session()->has('errors')) : ?>
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl">
                        <ul class="text-sm font-bold uppercase tracking-wide list-disc list-inside">
                            <?php foreach (session('errors') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php if (session()->has('error')) : ?>
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl font-bold text-sm">
                        <?= session('error') ?>
                    </div>
                <?php endif ?>

                <form action="<?= base_url('mobil-jenazah/simpan') ?>" method="post" enctype="multipart/form-data" class="space-y-6" novalidate>
                    <?= csrf_field() ?>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Tanggal Layanan</label>
                            <input type="date" name="tanggal" value="<?= old('tanggal', date('Y-m-d')) ?>" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Jenis Layanan</label>
                            <select name="jenis_layanan" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition" required>
                                <option value="Pengantaran ke Pemakaman" <?= old('jenis_layanan') == 'Pengantaran ke Pemakaman' ? 'selected' : '' ?>>Pengantaran ke Pemakaman</option>
                                <option value="Penjemputan Jenazah" <?= old('jenis_layanan') == 'Penjemputan Jenazah' ? 'selected' : '' ?>>Penjemputan Jenazah</option>
                                <option value="Lainnya" <?= old('jenis_layanan') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Nama Almarhum / Almarhumah</label>
                        <input type="text" name="nama_almarhum" value="<?= old('nama_almarhum') ?>" placeholder="Masukkan nama lengkap" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition" required>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-gray-700 text-xs font-black mb-1 uppercase tracking-widest">Rute Perjalanan</label>
                        <input type="text" name="lokasi_penjemputan" value="<?= old('lokasi_penjemputan') ?>" placeholder="Lokasi Penjemputan (Misal: Rumah Duka)" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition">
                        <input type="text" name="lokasi_disalatkan" value="<?= old('lokasi_disalatkan') ?>" placeholder="Lokasi Disalatkan (Misal: Masjid)" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition">
                        <input type="text" name="lokasi_tujuan" value="<?= old('lokasi_tujuan') ?>" placeholder="Lokasi Tujuan (Misal: TPU Macanda)" class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Dokumentasi <span class="text-gray-400 font-normal normal-case">(Opsional)</span></label>
                        <label class="flex flex-col items-center justify-center w-full px-6 py-10 bg-gray-50 border-2 border-dashed border-gray-300 rounded-3xl cursor-pointer hover:bg-gray-100 transition group" for="foto_input">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-camera text-4xl text-gray-400 group-hover:text-green-500 transition mb-4"></i>
                                <p class="text-sm font-black text-gray-500 uppercase tracking-widest">Klik untuk Ambil Foto</p>
                                <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase italic">Mendukung kamera langsung dari HP</p>
                            </div>
                        </label>
                        <input type="file" name="foto_dokumentasi" id="foto_input" accept="image/*" capture="camera" class="hidden" onchange="previewImage(this)">
                        
                        <div id="image_preview_container" class="mt-6 hidden">
                            <div class="relative inline-block w-full">
                                <img id="image_preview" class="w-full h-64 object-cover rounded-3xl border-4 border-green-500 shadow-lg">
                                <div class="absolute top-4 right-4 bg-green-600 text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest shadow-md">
                                    <i class="fas fa-check-circle mr-1"></i> Foto Siap
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Keterangan Tambahan (Opsional)</label>
                        <textarea name="keterangan" rows="3" placeholder="Tambahkan catatan jika diperlukan..." class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-green-500 outline-none font-bold transition"><?= old('keterangan') ?></textarea>
                    </div>

                    <div class="pt-6">
                        <button type="submit" id="submit-button" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-green-200 transition duration-300 uppercase tracking-widest flex items-center justify-center">
                            <span id="button-text" class="flex items-center">
                                <i class="fas fa-paper-plane mr-3"></i> Kirim Laporan Sekarang
                            </span>
                            <span id="loading-spinner" class="hidden items-center">
                                <i class="fas fa-circle-notch fa-spin mr-3"></i> Mengirim...
                            </span>
                        </button>
                        <p class="text-[10px] text-gray-400 text-center font-bold mt-4 uppercase tracking-widest italic">Data akan diverifikasi oleh Admin Masjid Jami Nailul Maram.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function previewImage(input) {
    const container = document.getElementById('image_preview_container');
    const preview = document.getElementById('image_preview');
    if (input.files && input.files[0]) {
        // Check file size (2MB = 2048 * 1024 bytes)
        if (input.files[0].size > 2 * 1024 * 1024) {
            alert('Ukuran foto terlalu besar. Maksimal 2MB.');
            input.value = '';
            container.classList.add('hidden');
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.classList.remove('hidden');
            // Scroll to preview
            container.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.querySelector('form').addEventListener('submit', function(e) {
    const button = document.getElementById('submit-button');
    const buttonText = document.getElementById('button-text');
    const loadingSpinner = document.getElementById('loading-spinner');
    
    // Simple validation check before showing loading
    if (this.checkValidity()) {
        button.disabled = true;
        button.classList.add('opacity-75', 'cursor-not-allowed');
        buttonText.classList.add('hidden');
        loadingSpinner.classList.replace('hidden', 'flex');
    }
});
</script>
<?= $this->endSection() ?>

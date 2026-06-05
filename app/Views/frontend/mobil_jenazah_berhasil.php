<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<section class="py-20 bg-gray-50 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-10 text-center">
            <div class="w-24 h-24 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner ring-8 ring-green-50">
                <i class="fas fa-check text-4xl"></i>
            </div>
            
            <h1 class="text-3xl font-black text-gray-800 uppercase tracking-tighter mb-2">Laporan Terkirim!</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mb-8">Terima kasih atas laporan penggunaan mobil jenazah.</p>
            
            <div class="bg-gray-50 p-6 rounded-2xl mb-8 border border-gray-100">
                <p class="text-sm text-gray-600 leading-relaxed font-medium">
                    Data Anda telah kami terima dengan status <span class="font-black text-green-600 uppercase">Draft</span>. Admin akan melakukan verifikasi sebelum data ditayangkan di sistem.
                </p>
            </div>

            <a href="<?= base_url() ?>" class="inline-flex items-center px-8 py-4 bg-gray-800 hover:bg-black text-white font-black rounded-2xl transition duration-300 uppercase tracking-widest text-sm shadow-lg shadow-gray-200">
                <i class="fas fa-home mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

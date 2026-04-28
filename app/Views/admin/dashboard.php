<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="bg-blue-100 p-4 rounded-2xl text-blue-600">
                <i class="fas fa-newspaper text-2xl"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Berita</p>
                <p class="text-2xl font-black text-gray-800">0</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="bg-purple-100 p-4 rounded-2xl text-purple-600">
                <i class="fas fa-images text-2xl"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Galeri</p>
                <p class="text-2xl font-black text-gray-800">0</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="bg-orange-100 p-4 rounded-2xl text-orange-600">
                <i class="fas fa-list text-2xl"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Kategori</p>
                <p class="text-2xl font-black text-gray-800">0</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="bg-green-100 p-4 rounded-2xl text-green-600">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Penulis</p>
                <p class="text-2xl font-black text-gray-800">1</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-gray-100">
        <div class="text-center py-6 md:py-10">
            <div class="bg-green-100 w-20 h-20 md:w-24 md:h-24 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-3xl md:text-4xl text-green-600"></i>
            </div>
            <h3 class="text-2xl md:text-3xl font-black text-gray-800 tracking-tighter uppercase mb-4">Selamat Datang, <?= session()->get('nama') ?>!</h3>
            <p class="text-gray-500 font-medium max-w-xl mx-auto">Anda sekarang berada di panel administrasi Masjid Jami Nailul Maram. Gunakan menu di samping untuk mulai mengelola konten website.</p>
        </div>
    </div>
<?= $this->endSection() ?>

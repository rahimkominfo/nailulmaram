<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
    <section class="bg-green-900 py-24">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-black text-white uppercase tracking-tighter mb-4">Berita & Informasi Masjid Jami Nailul Maram</h1>
            <p class="text-green-300 font-medium italic">Dapatkan berita terbaru Masjid Jami Nailul Maram, mulai dari kegiatan keagamaan, pengumuman penting, jadwal sholat, hingga berbagai informasi islami yang bermanfaat bagi jamaah dan masyarakat.</p>
        </div>
    </section>

    <section class="py-12 bg-white border-b border-gray-100">
        <div class="container mx-auto px-6">
            <form action="<?= base_url('berita') ?>" method="get" class="max-w-3xl mx-auto flex flex-col md:flex-row gap-4 mb-10">
                <div class="flex-1 relative">
                    <input type="text" name="q" value="<?= esc($searchTerm ?? '') ?>" placeholder="Cari judul berita..." class="w-full pl-14 pr-6 py-5 bg-gray-50 border border-gray-200 rounded-3xl focus:outline-none focus:ring-4 focus:ring-green-500/10 focus:bg-white transition duration-300 font-bold text-lg">
                    <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                    <?php if($activeKat): ?>
                        <input type="hidden" name="kategori" value="<?= esc($activeKat) ?>">
                    <?php endif; ?>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-black px-10 rounded-3xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                    Cari
                </button>
            </form>

            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center gap-3 md:gap-4 overflow-x-auto pb-4 scrollbar-hide">
                <a href="<?= base_url('berita' . ($searchTerm ? '?q=' . esc($searchTerm) : '')) ?>" 
                   class="px-8 py-3 rounded-full text-[10px] font-black uppercase tracking-widest transition-all shadow-sm border <?= !$activeKat ? 'bg-green-600 text-white border-green-600 shadow-green-100' : 'bg-white text-gray-500 border-gray-100 hover:border-green-600 hover:text-green-600' ?>">
                    Semua Berita
                </a>
                <?php foreach($categories as $cat): ?>
                    <a href="<?= base_url('berita?kategori=' . $cat['slug'] . ($searchTerm ? '&q=' . esc($searchTerm) : '')) ?>" 
                       class="px-8 py-3 rounded-full text-[10px] font-black uppercase tracking-widest transition-all shadow-sm border <?= $activeKat == $cat['slug'] ? 'bg-green-600 text-white border-green-600 shadow-green-100' : 'bg-white text-gray-500 border-gray-100 hover:border-green-600 hover:text-green-600' ?> whitespace-nowrap">
                        <?= $cat['nama'] ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <?php if(!empty($searchTerm)): ?>
                <p class="text-center mt-6 text-gray-500 font-medium italic">Menampilkan hasil pencarian untuk: <span class="text-green-600 font-bold">"<?= esc($searchTerm) ?>"</span></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="py-24 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php if(empty($berita)): ?>
                <div class="col-span-full text-center py-20 text-gray-400 italic">Belum ada berita yang diterbitkan.</div>
            <?php else: ?>
            <?php foreach($berita as $b): ?>
                <a href="<?= base_url('berita/baca/'.$b['slug']) ?>" class="group block bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="h-64 relative overflow-hidden">
                        <img src="<?= $b['gambar_utama'] ? base_url('uploads/artikel/'.$b['gambar_utama']) : 'https://images.pexels.com/photos/8164567/pexels-photo-8164567.jpeg?auto=compress&cs=tinysrgb&w=800' ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <?php if($b['nama_kategori']): ?>
                            <div class="absolute top-6 left-6">
                                <span class="bg-green-600 text-white px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg">
                                    <?= $b['nama_kategori'] ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 text-[10px] text-gray-400 mb-4 font-black uppercase tracking-widest">
                            <div class="flex items-center">
                                <i class="far fa-calendar-alt mr-2 text-green-500"></i> <?= format_indo($b['tanggal_publikasi'], false, true) ?>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-user mr-2 text-green-500"></i> <?= $b['nama_publik'] ?? 'Admin' ?>
                            </div>
                        </div>
                        <h4 class="text-2xl font-black mb-4 text-gray-800 leading-tight uppercase tracking-tighter group-hover:text-green-600 transition"><?= $b['judul'] ?></h4>
                        <p class="text-gray-500 text-sm line-clamp-3 font-light leading-relaxed"><?= $b['abstrak'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="mt-20">
            <?= $pager->links('default', 'frontend') ?>
        </div>
    </section>
<?= $this->endSection() ?>

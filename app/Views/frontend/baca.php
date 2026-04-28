<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
    <section class="bg-white py-24">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <!-- Main Content -->
                <div class="lg:col-span-8">
                    <article>
                        <div class="mb-12">
                            <a href="<?= base_url('berita') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest block mb-8">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Berita
                            </a>
                            <div class="flex flex-wrap gap-4 items-center text-[10px] text-green-600 mb-6 font-black uppercase tracking-widest">
                                <?php if($artikel['nama_kategori']): ?>
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full"><?= $artikel['nama_kategori'] ?></span>
                                <?php endif; ?>
                                <span><i class="far fa-calendar-alt mr-1"></i> <?= format_indo($artikel['tanggal_publikasi'], false) ?></span>
                                <span><i class="far fa-eye mr-1"></i> <?= $artikel['jumlah_tayang'] ?> Kali Dibaca</span>
                            </div>
                            <h1 class="text-4xl md:text-5xl font-black text-gray-800 leading-[1.1] uppercase tracking-tighter mb-10"><?= $artikel['judul'] ?></h1>
                            
                            <?php if($artikel['gambar_utama']): ?>
                                <div class="rounded-[40px] overflow-hidden shadow-2xl mb-12">
                                    <img src="<?= base_url('uploads/artikel/'.$artikel['gambar_utama']) ?>" class="w-full h-auto">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed font-medium mb-16">
                            <?= nl2br($artikel['konten']) ?>
                        </div>

                        <!-- Share Buttons -->
                        <div class="flex flex-wrap gap-4 items-center mb-16 pt-8 border-t border-gray-100">
                            <span class="text-xs font-black text-gray-400 uppercase tracking-widest mr-2">Bagikan Artikel :</span>
                            
                            <a href="https://wa.me/?text=<?= urlencode($artikel['judul'] . ' - ' . current_url()) ?>" target="_blank" 
                               class="flex items-center gap-2 px-6 py-3 bg-[#25D366] text-white rounded-full font-black text-xs uppercase tracking-widest hover:bg-[#128C7E] transition-all shadow-lg hover:scale-105">
                                <i class="fab fa-whatsapp text-lg"></i> WhatsApp
                            </a>

                            <button onclick="copyToClipboard()" id="btn-copy"
                                    class="flex items-center gap-2 px-6 py-3 bg-gray-800 text-white rounded-full font-black text-xs uppercase tracking-widest hover:bg-black transition-all shadow-lg hover:scale-105">
                                <i class="fas fa-link text-sm"></i> <span id="text-copy">Salin URL</span>
                            </button>
                        </div>

                        <div class="pt-12 border-t border-gray-100">
                            <div class="bg-gray-50 p-8 rounded-[40px] flex items-center space-x-6">
                                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white text-2xl font-black shadow-lg">
                                    <?= substr($artikel['nama_publik'] ?? 'A', 0, 1) ?>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Diterbitkan Oleh</p>
                                    <h5 class="text-lg font-black text-gray-800 uppercase tracking-tighter"><?= $artikel['nama_publik'] ?? 'Admin Masjid Jami' ?></h5>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 space-y-12">
                    <!-- Berita Terbaru -->
                    <div class="bg-gray-50 p-8 rounded-[40px] border border-gray-100">
                        <h4 class="text-xl font-black text-gray-800 uppercase tracking-tighter mb-8 border-b-4 border-green-600 w-fit pb-2">Berita Terbaru</h4>
                        <div class="space-y-8">
                            <?php foreach($beritaTerbaru as $bt): ?>
                                <a href="<?= base_url('berita/baca/'.$bt['slug']) ?>" class="group block">
                                    <div class="flex gap-4">
                                        <div class="w-20 h-20 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-200">
                                            <img src="<?= $bt['gambar_utama'] ? base_url('uploads/artikel/'.$bt['gambar_utama']) : 'https://via.placeholder.com/150' ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-[10px] font-black text-green-600 uppercase tracking-widest mb-1"><?= $bt['nama_kategori'] ?? 'Berita' ?></p>
                                            <h5 class="text-sm font-bold text-gray-800 leading-tight group-hover:text-green-600 transition line-clamp-2 uppercase"><?= $bt['judul'] ?></h5>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Berita Terpopuler -->
                    <div class="bg-white p-8 rounded-[40px] border border-gray-100 shadow-sm">
                        <h4 class="text-xl font-black text-gray-800 uppercase tracking-tighter mb-8 border-b-4 border-blue-600 w-fit pb-2">Terpopuler</h4>
                        <div class="space-y-8">
                            <?php foreach($beritaTerpopuler as $index => $bp): ?>
                                <a href="<?= base_url('berita/baca/'.$bp['slug']) ?>" class="group block">
                                    <div class="flex items-start gap-4">
                                        <div class="text-4xl font-black text-gray-100 group-hover:text-blue-100 transition">
                                            0<?= $index + 1 ?>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1"><?= $bp['nama_kategori'] ?? 'Berita' ?></p>
                                            <h5 class="text-sm font-bold text-gray-800 leading-tight group-hover:text-blue-600 transition line-clamp-2 uppercase"><?= $bp['judul'] ?></h5>
                                            <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold"><?= $bp['jumlah_tayang'] ?> Pembaca</p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Statistik Pengunjung -->
                    <div class="bg-white p-8 rounded-[40px] border border-gray-100 shadow-sm">
                        <h4 class="text-xl font-black text-gray-800 uppercase tracking-tighter mb-8 border-b-4 border-green-600 w-fit pb-2">
                            <i class="fas fa-chart-line mr-2"></i>Statistik
                        </h4>
                        <?= view_cell('App\Cells\VisitorCell::render') ?>
                    </div>                </div>
            </div>
        </div>
    </section>

    <script>
        function copyToClipboard() {
            const url = window.location.href;
            const btn = document.getElementById('btn-copy');
            const text = document.getElementById('text-copy');
            const icon = btn.querySelector('i');

            navigator.clipboard.writeText(url).then(() => {
                // Feedback visual
                text.innerText = 'Berhasil Disalin!';
                btn.classList.replace('bg-gray-800', 'bg-green-600');
                icon.classList.replace('fa-link', 'fa-check');

                setTimeout(() => {
                    text.innerText = 'Salin URL';
                    btn.classList.replace('bg-green-600', 'bg-gray-800');
                    icon.classList.replace('fa-check', 'fa-link');
                }, 2000);
            }).catch(err => {
                console.error('Gagal menyalin: ', err);
            });
        }
    </script>
<?= $this->endSection() ?>

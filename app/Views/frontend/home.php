<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>

    <!-- Seksi Video YouTube -->
    <!-- <section id="video-profil" class="py-8 container mx-auto px-6">-->
    <!--    <div class="bg-white rounded-3xl shadow-2xl p-4 md:p-8 border border-gray-100">-->
    <!--        <h3 class="text-3xl font-bold text-gray-800 tracking-tight mb-8 border-l-8 border-green-600 pl-6">Live Streaming</h3>-->
    <!--        <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-lg border-4 border-green-50/50">-->
    <!--            <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/yNKvkPJl-tg?si=8M_ZbXmz7UtSesRi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <section class="relative h-[550px] md:h-[700px] overflow-hidden bg-green-950 group">
        <div id="hero-carousel" class="relative h-full w-full">
            <!-- Slide 1 -->
            <div class="hero-slide absolute inset-0 transition-all duration-1000 ease-in-out opacity-100 z-10">
                <img src="<?= base_url('images/background1.jpeg') ?>" 
                     class="w-full h-full object-cover animate-kenburns opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6">
                    <h1 class="text-3xl md:text-6xl font-black mb-4 md:mb-6 drop-shadow-2xl tracking-tighter uppercase">
                        Selamat Datang di <br> <span class="text-green-400"><?= $profil['nama_masjid'] ?? 'Masjid Jami' ?></span>
                    </h1>
                    <div class="w-24 h-2 bg-green-500 mb-4 md:mb-8 rounded-full"></div>
                    <p class="text-lg md:text-3xl max-w-4xl font-light italic text-gray-100 drop-shadow-md leading-relaxed">
                        "Hanyalah yang memakmurkan masjid-masjid Allah ialah orang-orang yang beriman kepada Allah dan hari kemudian."
                    </p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide absolute inset-0 transition-all duration-1000 ease-in-out opacity-0 z-0 pointer-events-none">
                <img src="<?= base_url('images/background2.jpeg') ?>" 
                     class="w-full h-full object-cover animate-kenburns opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6">
                    <h1 class="text-3xl md:text-5xl font-black mb-4 md:mb-6 drop-shadow-2xl tracking-tighter uppercase">
                        Pusat Dakwah & <span class="text-green-400">Pendidikan</span>
                    </h1>
                    <div class="w-24 h-2 bg-green-500 mb-4 md:mb-8 rounded-full"></div>
                    <p class="text-lg md:text-3xl max-w-4xl font-light italic text-gray-100 drop-shadow-md leading-relaxed">
                        Mewujudkan generasi yang berakhlak mulia dan berwawasan luas berdasarkan nilai-nilai Islami.
                    </p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide absolute inset-0 transition-all duration-1000 ease-in-out opacity-0 z-0 pointer-events-none">
                <img src="<?= base_url('images/background3.jpeg') ?>" 
                     class="w-full h-full object-cover animate-kenburns opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6">
                    <h1 class="text-3xl md:text-5xl font-black mb-4 md:mb-6 drop-shadow-2xl tracking-tighter uppercase">
                        Kebersamaan dalam <span class="text-green-400">Ibadah</span>
                    </h1>
                    <div class="w-24 h-2 bg-green-500 mb-4 md:mb-8 rounded-full"></div>
                    <p class="text-lg md:text-3xl max-w-4xl font-light italic text-gray-100 drop-shadow-md leading-relaxed">
                        Mari rapatkan barisan, perkuat ukhuwah Islamiyah di lingkungan Masjid Jami Nailul Maram.
                    </p>
                </div>
            </div>
            
            <!-- Slide 4 -->
            <div class="hero-slide absolute inset-0 transition-all duration-1000 ease-in-out opacity-0 z-0 pointer-events-none">
                <!-- Desktop Image -->
                <img src="<?= base_url('images/banner_qurban_d.webp') ?>" 
                     class="hidden md:block w-full h-full object-cover animate-kenburns">
                <!-- Mobile Image -->
                <img src="<?= base_url('images/banner_qurban_m.webp') ?>" 
                     class="block md:hidden w-full h-full object-cover animate-kenburns">
            </div>
        </div>

        <!-- Controls -->
        <button onclick="prevHero()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 p-3 rounded-full bg-black/20 hover:bg-black/50 text-white transition-all opacity-0 group-hover:opacity-100">
            <i class="fas fa-chevron-left text-2xl"></i>
        </button>
        <button onclick="nextHero()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 p-3 rounded-full bg-black/20 hover:bg-black/50 text-white transition-all opacity-0 group-hover:opacity-100">
            <i class="fas fa-chevron-right text-2xl"></i>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex space-x-3">
            <button onclick="goToHero(0)" class="hero-indicator w-3 h-3 rounded-full bg-white transition-all duration-300 ring-4 ring-green-500/30"></button>
            <button onclick="goToHero(1)" class="hero-indicator w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300"></button>
            <button onclick="goToHero(2)" class="hero-indicator w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300"></button>
            <button onclick="goToHero(3)" class="hero-indicator w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all duration-300"></button>
        </div>
    </section>

    <section id="jadwal" class="container mx-auto px-6 mt-20 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Jadwal Sholat Hari Ini</h2>
                    <p class="text-green-600 font-semibold mt-1"><?= format_indo(date('Y-m-d')) ?> | <span class="text-orange-600"><?= $hijriah ?></span></p>
                </div>
                <div class="mt-4 md:mt-0 italic bg-gray-50 px-4 py-2 rounded-xl text-sm border border-gray-100 md:self-start">
                    <i class="fas fa-location-dot mr-2 text-red-500"></i>Sinjai, Sulawesi Selatan
                </div>
            </div>

            <!-- Countdown Baru yang Lebih Mencolok -->
            <div id="countdown-container" class="hidden mb-8 bg-gradient-to-r from-green-600 to-green-800 rounded-3xl p-6 text-white shadow-lg flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest opacity-80">Waktu Sholat Berikutnya</p>
                        <h3 id="next-prayer-display" class="text-2xl font-black uppercase">---</h3>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-1">Hitung Mundur</p>
                    <div id="main-countdown" class="text-5xl font-black tabular-nums">00:00:00</div>
                </div>
            </div>
            
            <?php if($jadwal): ?>
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4" id="prayer-times-grid">
                <div data-prayer="Subuh" class="bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-green-600 uppercase mb-2">Subuh</p>
                    <p class="text-3xl font-black text-green-900"><?= $jadwal['subuh'] ?></p>
                </div>
                <div data-prayer="Dzuhur" class="bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-green-600 uppercase mb-2">Dzuhur</p>
                    <p class="text-3xl font-black text-green-900"><?= $jadwal['dzuhur'] ?></p>
                </div>
                <div data-prayer="Ashar" class="bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-green-600 uppercase mb-2">Ashar</p>
                    <p class="text-3xl font-black text-green-900"><?= $jadwal['ashar'] ?></p>
                </div>
                <div data-prayer="Maghrib" class="bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-green-600 uppercase mb-2">Maghrib</p>
                    <p class="text-3xl font-black text-green-900"><?= $jadwal['maghrib'] ?></p>
                </div>
                <div data-prayer="Isya" class="bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-green-600 uppercase mb-2">Isya</p>
                    <p class="text-3xl font-black text-green-900"><?= $jadwal['isya'] ?></p>
                </div>
                <div data-prayer="Imsak" class="bg-gray-100 p-6 rounded-2xl text-center border-b-4 border-gray-500 shadow-sm transition hover:scale-105 duration-300">
                    <p class="text-xs font-bold text-gray-500 uppercase mb-2">Imsak</p>
                    <p class="text-3xl font-black text-gray-800"><?= $jadwal['imsak'] ?></p>
                </div>
            </div>
            <?php else: ?>
                <div class="bg-red-50 p-8 rounded-2xl text-center border border-red-100 text-red-600 italic font-bold">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Jadwal sholat hari ini belum disinkronkan.
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!--Berita masjid-->
    <section id="berita" class="py-24 container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-10 gap-4">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight border-l-8 border-green-600 pl-6 w-full md:w-auto">Berita Terbaru</h3>
            
            <div class="flex space-x-3">
                <button onclick="changeNews(-1)" class="w-12 h-12 bg-white border border-gray-200 shadow-sm hover:bg-green-600 hover:border-green-600 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 text-gray-600">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="changeNews(1)" class="w-12 h-12 bg-white border border-gray-200 shadow-sm hover:bg-green-600 hover:border-green-600 hover:text-white rounded-full flex items-center justify-center transition-all duration-300 text-gray-600">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        
        <div class="relative w-full h-[550px] md:h-[400px] rounded-3xl overflow-hidden shadow-xl border border-gray-100 bg-white group">
            <?php if(empty($berita)): ?>
                <div class="flex items-center justify-center h-full text-gray-400 italic">Belum ada berita yang ditayangkan.</div>
            <?php else: ?>
                <?php foreach($berita as $idx => $b): ?>
                    <div class="news-slide absolute inset-0 transition-all duration-700 ease-in-out <?= $idx === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' ?>">
                        <div class="flex flex-col md:flex-row h-full">
                            <div class="w-full md:w-1/2 h-56 md:h-full relative overflow-hidden">
                                <img src="<?= $b['gambar_utama'] ? base_url('uploads/artikel/'.$b['gambar_utama']) : 'https://images.pexels.com/photos/8164567/pexels-photo-8164567.jpeg?auto=compress&cs=tinysrgb&w=800' ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
                                <div class="absolute top-6 left-6 bg-green-600 text-white text-[10px] px-3 py-1 rounded-full uppercase font-bold shadow-xl"><?= $b['nama_kategori'] ?? 'Berita' ?></div>                            </div>
                            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white">
                                <div class="flex items-center text-xs text-gray-400 mb-4 font-semibold uppercase tracking-wider">
                                    <i class="far fa-calendar-alt mr-2 text-green-500"></i> <?= format_indo($b['tanggal_publikasi'], false, true) ?>
                                </div>
                                <h4 class="text-2xl md:text-3xl font-bold mb-4 text-gray-800 leading-tight"><?= $b['judul'] ?></h4>
                                <p class="text-gray-500 text-base mb-8 line-clamp-3 font-light leading-relaxed"><?= $b['abstrak'] ?></p>
                                <a href="<?= base_url('berita/baca/'.$b['slug']) ?>" class="inline-flex items-center text-green-600 font-bold hover:text-green-800 transition group/link">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="mt-12 text-center">
            <a href="<?= base_url('berita') ?>" class="inline-flex items-center px-8 py-3 border-2 border-green-600 text-green-600 font-bold rounded-full hover:bg-green-600 hover:text-white transition-all duration-300 group shadow-sm hover:shadow-md">
                Lihat Semua Berita 
                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </section>
    
    <!-- Section Flayer -->
    <section id="flayer-section" class="py-24 bg-gray-50 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end md:items-center mb-12 gap-6">
                <div class="w-full md:w-auto">
                    <h3 class="text-4xl font-black text-gray-800 tracking-tighter border-l-8 border-orange-600 pl-6 uppercase italic">Informasi & <span class="text-orange-600 not-italic">Flayer</span></h3>
                    <p class="text-gray-500 mt-3 pl-6 font-light max-w-xl">Ikuti terus pembaruan informasi, agenda kegiatan, dan pengumuman penting melalui flayer resmi Masjid Jami Nailul Maram.</p>
                </div>
                
                <div class="flex space-x-3">
                    <button id="flayer-prev" class="w-14 h-14 bg-white border border-gray-200 shadow-sm hover:bg-orange-600 hover:border-orange-600 hover:text-white rounded-full flex items-center justify-center transition-all duration-500 text-gray-600 group/btn">
                        <i class="fas fa-chevron-left text-xl transform group-hover/btn:-translate-x-1 transition-transform"></i>
                    </button>
                    <button id="flayer-next" class="w-14 h-14 bg-white border border-gray-200 shadow-sm hover:bg-orange-600 hover:border-orange-600 hover:text-white rounded-full flex items-center justify-center transition-all duration-500 text-gray-600 group/btn">
                        <i class="fas fa-chevron-right text-xl transform group-hover/btn:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>

            <div class="relative">
                <div id="flayer-slider-container" class="overflow-hidden">
                    <div id="flayer-slider" class="flex transition-transform duration-700 ease-[cubic-bezier(0.23,1,0.32,1)]">
                        <?php if(empty($flayers)): ?>
                            <div class="flex-none w-full text-center py-12 text-gray-400 italic">Belum ada flayer yang aktif.</div>
                        <?php else: ?>
                            <?php foreach($flayers as $f): ?>
                                <!-- Flayer Item -->
                                <div class="flex-none w-full md:w-1/3 px-4">
                                    <div class="group relative overflow-hidden shadow-2xl aspect-[3/4] bg-white border-4 border-white">
                                        <img src="<?= (strpos($f['gambar_url'], 'http') === 0) ? $f['gambar_url'] : base_url('uploads/flayer/'.$f['gambar_url']) ?>" alt="<?= $f['judul'] ?>" class="w-full h-full object-contain transform group-hover:scale-110 transition duration-1000">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-700 flex flex-col justify-end p-8">
                                            <?php if($f['label']): ?>
                                                <span class="bg-orange-600 text-[10px] w-fit px-3 py-1 rounded-full text-white font-bold mb-3 uppercase tracking-widest"><?= $f['label'] ?></span>
                                            <?php endif; ?>
                                            <p class="text-white font-black text-2xl uppercase tracking-tighter leading-tight"><?= $f['judul'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            </div>

            <div id="flayer-indicators" class="flex justify-center space-x-3 mt-12">
                <!-- Indicators dynamically generated -->
            </div>
        </div>
    </section>

    <section id="galeri" class="py-24 bg-gray-950 text-white overflow-hidden">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-bold tracking-tight mb-4 text-center text-green-400 uppercase">Dokumentasi Kegiatan</h3>
            <p class="text-center text-gray-400 font-light italic mb-16 max-w-2xl mx-auto">Klik pada album untuk melihat keseruan dan khidmatnya kegiatan di Masjid Jami.</p>

            <div class="grid md:grid-cols-2 gap-12">
                <?php if(empty($galeri)): ?>
                    <div class="col-span-full text-center text-gray-500 italic">Belum ada dokumentasi.</div>
                <?php else: ?>
                    <?php foreach($galeri as $idx => $g): ?>
                    <div onclick="openGalleryAlbum(<?= $g['galeri_id'] ?>)" class="group relative h-[450px] rounded-[40px] overflow-hidden cursor-pointer shadow-2xl animate-fade-in-up <?= $idx === 1 ? 'delay-300' : 'delay-100' ?> transform hover:-translate-y-2 transition-all duration-500 hover:shadow-green-900/50">
                        <img src="<?= base_url('uploads/galeri/'.$g['sampul_url']) ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-125">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent p-12 flex flex-col justify-end group-hover:via-black/60 transition-colors duration-500">
                            <span class="bg-green-600 w-fit text-xs px-4 py-1.5 rounded-full font-black mb-4 shadow-lg tracking-widest uppercase transform group-hover:scale-110 origin-left transition-transform duration-300">Lihat Koleksi</span>
                            <h4 class="text-4xl font-black mb-2 leading-tight uppercase tracking-tighter"><?= $g['judul'] ?></h4>
                            <p class="text-green-300 font-light tracking-wide opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0 italic flex items-center">
                                <i class="fas fa-search-plus mr-2"></i> Ketuk untuk melihat
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="mt-16 text-center animate-fade-in-up delay-300">
                <a href="<?= base_url('galeri') ?>" class="inline-flex items-center px-8 py-3 border-2 border-green-500 text-green-400 font-bold rounded-full hover:bg-green-500 hover:text-gray-950 transition-all duration-300 group shadow-[0_0_15px_rgba(34,197,94,0.3)] hover:shadow-[0_0_25px_rgba(34,197,94,0.6)]">
                    Lihat Semua Galeri 
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Seksi Video YouTube -->
    <section id="video-youtube" class="py-12 container mx-auto px-6">
        <div class="bg-white rounded-[40px] shadow-2xl p-4 md:p-8 border border-gray-100">
            <h3 class="text-3xl font-bold text-gray-800 tracking-tight mb-8 border-l-8 border-green-600 pl-6 uppercase">Video Dokumentasi</h3>
            <div class="relative w-full aspect-video rounded-3xl overflow-hidden shadow-2xl border-4 border-green-50/50 group">
                <iframe 
                    class="w-full h-full" 
                    src="https://www.youtube.com/embed/QWKRCecX55E" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
    
    <!-- Seksi Kisah Nyata Inspiratif -->
    <section id="kisah-inspiratif" class="py-24 container mx-auto px-6">
        <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden border border-gray-100 group">
            <div class="flex flex-col lg:flex-row">
                <div class="w-full lg:w-[60%] relative overflow-hidden h-[300px] md:h-[500px]">
                    <img src="<?= base_url('images/panglima_masjid/sampul.webp') ?>" 
                         alt="Kisah Nyata Inspiratif - Panglima Masjid" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition duration-1000 cursor-pointer"
                         onclick="window.location.href='<?= base_url('cerita-inspiratif') ?>'">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent pointer-events-none"></div>
                </div>
                <div class="w-full lg:w-[40%] p-8 md:p-12 lg:p-16 flex flex-col justify-center bg-green-50/30">
                    <div class="inline-flex items-center text-green-600 font-black text-xs uppercase tracking-[0.2em] mb-4 bg-white/80 px-4 py-2 rounded-full w-fit shadow-sm">
                        <i class="fas fa-star mr-2 text-yellow-500"></i> Rekomendasi Bacaan
                    </div>
                    <h3 class="text-3xl md:text-5xl font-black text-gray-800 tracking-tighter mb-6 leading-tight uppercase italic">
                        Kisah Nyata <br> <span class="text-green-600 not-italic">Inspiratif</span>
                    </h3>
                    <p class="text-gray-600 text-lg mb-10 leading-relaxed font-light border-l-4 border-green-500 pl-6 italic">
                        "Perjalanan spiritual yang menggugah jiwa, menceritakan pengabdian tulus yang menjadi teladan bagi kita semua dalam memakmurkan rumah Allah."
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="<?= base_url('cerita-inspiratif') ?>" 
                           class="inline-flex items-center px-10 py-4 bg-green-600 text-white font-bold rounded-full hover:bg-green-700 transition-all duration-300 shadow-xl hover:shadow-green-200 group/btn">
                            Mulai Membaca 
                            <i class="fas fa-book-open ml-3 transform group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seksi Video Festival -->
    <!--<section id="video-festival" class="py-12 container mx-auto px-6">-->
    <!--    <div class="bg-white rounded-[40px] shadow-2xl p-4 md:p-8 border border-gray-100">-->
    <!--        <h3 class="text-3xl font-bold text-gray-800 tracking-tight mb-8 border-l-8 border-green-600 pl-6 uppercase">Buka Puasa Bersama LPQ Nailul Maram</h3>-->
    <!--        <div class="relative w-full aspect-video rounded-3xl overflow-hidden shadow-2xl border-4 border-green-50/50 group">-->
    <!--            <video -->
    <!--                class="w-full h-full object-cover" -->
    <!--                controls -->
    <!--                preload="metadata">-->
    <!--                <source src="<?= base_url('images/lpq.mp4') ?>" type="video/mp4">-->
    <!--                Your browser does not support the video tag.-->
    <!--            </video>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

    <!-- Seksi Ayo Baca Quran -->
    <section id="ayo-baca-quran" class="py-24 container mx-auto px-6">
        <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden border border-gray-100 group">
            <div class="flex flex-col lg:flex-row-reverse">
                <div class="w-full lg:w-[50%] relative overflow-hidden h-[400px] md:h-[600px] bg-green-50/30 flex items-center justify-center p-8">
                    <img loading="lazy" src="<?= base_url('images/ayo_baca_quran.webp') ?>" 
                         alt="Ayo Baca Quran" 
                         class="h-full w-auto object-contain transform group-hover:scale-105 transition duration-1000 shadow-2xl rounded-2xl">
                </div>
                <div class="w-full lg:w-[50%] p-8 md:p-12 lg:p-16 flex flex-col justify-center bg-white">
                    <!--<div class="inline-flex items-center text-green-600 font-black text-xs uppercase tracking-[0.2em] mb-4 bg-green-50 px-4 py-2 rounded-full w-fit shadow-sm">-->
                    <!--    <i class="fas fa-quran mr-2"></i> Program Literasi Quran-->
                    <!--</div>-->
                    <h3 class="text-3xl md:text-5xl font-black text-gray-800 tracking-tighter mb-6 leading-tight uppercase">
                        Ayo <br> <span class="text-green-600">Baca Quran</span>
                    </h3>
                    <p class="text-gray-600 text-lg mb-10 leading-relaxed font-light border-l-4 border-green-500 pl-6 italic">
                        "Sebaik-baik kalian adalah orang yang belajar Al-Qur'an dan mengajarkannya." (HR. Bukhari)
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="<?= base_url('quran') ?>" 
                           class="inline-flex items-center px-10 py-4 bg-green-600 text-white font-bold rounded-full hover:bg-green-700 transition-all duration-300 shadow-xl hover:shadow-green-200 group/btn text-lg">
                            Baca Quran 
                            <i class="fas fa-arrow-right ml-3 transform group-hover/btn:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Jumbotron Carousel Logic
        let currentHero = 0;
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroIndicators = document.querySelectorAll('.hero-indicator');

        function updateHero() {
            heroSlides.forEach((slide, idx) => {
                if (idx === currentHero) {
                    slide.classList.replace('opacity-0', 'opacity-100');
                    slide.classList.replace('z-0', 'z-10');
                    slide.classList.remove('pointer-events-none');
                } else {
                    slide.classList.replace('opacity-100', 'opacity-0');
                    slide.classList.replace('z-10', 'z-0');
                    slide.classList.add('pointer-events-none');
                }
            });

            heroIndicators.forEach((indicator, idx) => {
                if (idx === currentHero) {
                    indicator.classList.add('bg-white', 'ring-4', 'ring-green-500/30');
                    indicator.classList.remove('bg-white/40');
                } else {
                    indicator.classList.remove('bg-white', 'ring-4', 'ring-green-500/30');
                    indicator.classList.add('bg-white/40');
                }
            });
        }

        function nextHero() {
            currentHero = (currentHero + 1) % heroSlides.length;
            updateHero();
        }

        function prevHero() {
            currentHero = (currentHero - 1 + heroSlides.length) % heroSlides.length;
            updateHero();
        }

        function goToHero(idx) {
            currentHero = idx;
            updateHero();
        }

        // Auto slide hero
        let heroInterval = setInterval(nextHero, 7000);

        // Pause hero on hover
        const heroSection = document.getElementById('hero-carousel').parentElement;
        heroSection.addEventListener('mouseenter', () => clearInterval(heroInterval));
        heroSection.addEventListener('mouseleave', () => heroInterval = setInterval(nextHero, 7000));

        // Data Jadwal Sholat
        const prayerTimes = {
            today: <?= json_encode($jadwal) ?>,
            tomorrow: <?= json_encode($jadwalBesok) ?>
        };

        function startPrayerCountdown() {
            const countdownContainer = document.getElementById('countdown-container');
            const nextPrayerDisplay = document.getElementById('next-prayer-display');
            const mainCountdown = document.getElementById('main-countdown');
            const gridCards = document.querySelectorAll('[data-prayer]');

            // Pastikan data hari ini ada dan bukan array kosong
            const hasTodayData = prayerTimes.today && Object.keys(prayerTimes.today).length > 0;
            if (!hasTodayData || !countdownContainer) return;

            function update() {
                const now = new Date();
                
                // Format tanggal lokal (YYYY-MM-DD)
                const yyyy = now.getFullYear();
                const mm = String(now.getMonth() + 1).padStart(2, '0');
                const dd = String(now.getDate()).padStart(2, '0');
                const todayStr = `${yyyy}-${mm}-${dd}`;

                const tomorrow = new Date(now);
                tomorrow.setDate(tomorrow.getDate() + 1);
                const tY = tomorrow.getFullYear();
                const tM = String(tomorrow.getMonth() + 1).padStart(2, '0');
                const tD = String(tomorrow.getDate()).padStart(2, '0');
                const tomorrowStr = `${tY}-${tM}-${tD}`;

                const list = [
                    { name: 'Subuh', time: prayerTimes.today.subuh, date: todayStr },
                    { name: 'Dzuhur', time: prayerTimes.today.dzuhur, date: todayStr },
                    { name: 'Ashar', time: prayerTimes.today.ashar, date: todayStr },
                    { name: 'Maghrib', time: prayerTimes.today.maghrib, date: todayStr },
                    { name: 'Isya', time: prayerTimes.today.isya, date: todayStr },
                    { name: 'Subuh', time: (prayerTimes.tomorrow && prayerTimes.tomorrow.subuh) ? prayerTimes.tomorrow.subuh : null, date: tomorrowStr, isBesok: true }
                ];

                let next = null;
                for (let p of list) {
                    if (!p.time || typeof p.time !== 'string') continue;
                    
                    // Normalisasi pemisah (titik atau titik dua)
                    const timeStr = p.time.replace('.', ':').trim();
                    const t = timeStr.split(':');
                    if (t.length < 2) continue;

                    const hh = t[0].padStart(2, '0');
                    const min = t[1].padStart(2, '0');
                    
                    // Buat object date (Waktu Lokal)
                    const pDate = new Date(`${p.date}T${hh}:${min}:00`);
                    
                    if (pDate > now) {
                        next = { ...p, target: pDate };
                        break;
                    }
                }

                if (next) {
                    countdownContainer.style.display = 'flex';
                    countdownContainer.classList.remove('hidden');
                    if (nextPrayerDisplay) nextPrayerDisplay.innerText = next.name + (next.isBesok ? ' BESOK' : '');
                    
                    const diff = next.target - now;
                    const h = Math.floor(diff / 3600000);
                    const m = Math.floor((diff % 3600000) / 60000);
                    const s = Math.floor((diff % 60000) / 1000);
                    
                    if (mainCountdown) mainCountdown.innerText = `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;

                    // Update grid highlight
                    gridCards.forEach(card => {
                        const pName = card.getAttribute('data-prayer');
                        const active = (pName === next.name && !next.isBesok);
                        
                        const pFirst = card.querySelector('p:first-child');
                        const pLast = card.querySelector('p:last-child');

                        if (active) {
                            card.className = "bg-orange-100 p-6 rounded-2xl text-center border-b-4 border-orange-600 ring-2 ring-orange-400 shadow-md transition hover:scale-105 duration-300";
                            if (pFirst) pFirst.className = "text-xs font-bold text-orange-600 uppercase mb-2";
                            if (pLast) pLast.className = "text-3xl font-black text-orange-900";
                        } else {
                            const imsak = (pName === 'Imsak');
                            card.className = imsak 
                                ? "bg-gray-100 p-6 rounded-2xl text-center border-b-4 border-gray-500 shadow-sm transition hover:scale-105 duration-300"
                                : "bg-green-50 p-6 rounded-2xl text-center border-b-4 border-green-600 shadow-sm transition hover:scale-105 duration-300";
                            if (pFirst) pFirst.className = imsak ? "text-xs font-bold text-gray-500 uppercase mb-2" : "text-xs font-bold text-green-600 uppercase mb-2";
                            if (pLast) pLast.className = imsak ? "text-3xl font-black text-gray-800" : "text-3xl font-black text-green-900";
                        }
                    });
                } else {
                    countdownContainer.classList.add('hidden');
                }
            }

            setInterval(update, 1000);
            update();
        }

        // Initialize countdown on load
        document.addEventListener('DOMContentLoaded', startPrayerCountdown);

        // Data Galeri dari PHP ke JavaScript
        const galleryAlbums = {
            <?php foreach($galeri as $g): ?>
                "<?= $g['galeri_id'] ?>": {
                    title: "<?= addslashes($g['judul']) ?>",
                    images: [
                        <?php foreach($g['images'] as $img): ?>
                            "<?= base_url('uploads/galeri/'.$img['gambar_url']) ?>",
                        <?php endforeach; ?>
                    ]
                },
            <?php endforeach; ?>
        };

        function openGalleryAlbum(id) {
            const album = galleryAlbums[id];
            if (album && album.images.length > 0) {
                currentActiveAlbum = album.images;
                currentImgIdx = 0;
                
                // Set Title di Modal (pastikan elemen ini ada di template.php)
                const titleElem = document.getElementById('modalAlbumTitle');
                if (titleElem) titleElem.innerText = album.title;
                
                updateModalUI();
                document.getElementById('galleryModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                alert('Album ini belum memiliki foto.');
            }
        }

        // Flayer Slider Logic
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('flayer-slider');
            const nextBtn = document.getElementById('flayer-next');
            const prevBtn = document.getElementById('flayer-prev');
            const indicatorContainer = document.getElementById('flayer-indicators');
            const slides = slider.children;
            
            let currentIdx = 0;
            let itemsPerView = window.innerWidth >= 768 ? 3 : 1;
            let totalSlides = Math.ceil(slides.length / itemsPerView);

            // Create indicators
            function createIndicators() {
                indicatorContainer.innerHTML = '';
                totalSlides = Math.ceil(slides.length / itemsPerView);
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('button');
                    dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${i === 0 ? 'bg-orange-600 ring-4 ring-orange-200' : 'bg-gray-300 hover:bg-orange-400'}`;
                    dot.onclick = () => goToSlide(i);
                    indicatorContainer.appendChild(dot);
                }
            }

            function updateSlider() {
                const offset = currentIdx * 100;
                slider.style.transform = `translateX(-${offset}%)`;
                
                const dots = indicatorContainer.querySelectorAll('button');
                dots.forEach((dot, idx) => {
                    if (idx === currentIdx) {
                        dot.className = 'w-3 h-3 rounded-full transition-all duration-300 bg-orange-600 ring-4 ring-orange-200';
                    } else {
                        dot.className = 'w-3 h-3 rounded-full transition-all duration-300 bg-gray-300 hover:bg-orange-400';
                    }
                });
            }

            function nextSlide() {
                currentIdx = (currentIdx + 1) % totalSlides;
                updateSlider();
            }

            function prevSlide() {
                currentIdx = (currentIdx - 1 + totalSlides) % totalSlides;
                updateSlider();
            }

            function goToSlide(idx) {
                currentIdx = idx;
                updateSlider();
            }

            if(nextBtn) nextBtn.onclick = nextSlide;
            if(prevBtn) prevBtn.onclick = prevSlide;

            createIndicators();

            // Auto slide
            let autoSlide = setInterval(nextSlide, 5000);

            // Pause on hover
            const section = document.getElementById('flayer-section');
            if(section) {
                section.addEventListener('mouseenter', () => clearInterval(autoSlide));
                section.addEventListener('mouseleave', () => autoSlide = setInterval(nextSlide, 5000));
            }

            // Handle Resize
            window.addEventListener('resize', () => {
                const newItemsPerView = window.innerWidth >= 768 ? 3 : 1;
                if (newItemsPerView !== itemsPerView) {
                    itemsPerView = newItemsPerView;
                    currentIdx = 0;
                    createIndicators();
                    updateSlider();
                }
            });
        });
    </script>
<?= $this->endSection() ?>

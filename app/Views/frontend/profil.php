<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('extra_css') ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Custom Colors to match profil.html */
        :root {
            --mosque-green: #064e3b;
            --mosque-gold: #fbbf24;
        }
        .text-mosque-green { color: var(--mosque-green); }
        .bg-mosque-green { background-color: var(--mosque-green); }
        .border-mosque-green { border-color: var(--mosque-green); }
        .text-mosque-gold { color: var(--mosque-gold); }
        .bg-mosque-gold { background-color: var(--mosque-gold); }
        .border-mosque-gold { border-color: var(--mosque-gold); }

        /* Custom Background Pattern for Hero */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        /* Timeline line styling */
        .timeline-line::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background-color: #cbd5e1;
            transform: translateX(-50%);
        }
        @media (max-width: 768px) {
            .timeline-line::before {
                left: 1rem;
            }
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <header class="relative min-h-[80vh] flex items-center justify-center bg-mosque-green text-white bg-pattern overflow-hidden">
        <div class="absolute inset-0 bg-black/30 z-0"></div> 
        <div class="relative z-10 container mx-auto px-6 text-center" data-aos="zoom-in" data-aos-duration="1500">
            <span class="inline-block py-1 px-3 rounded-full bg-mosque-gold/20 text-mosque-gold text-sm font-semibold tracking-wider mb-6 border border-mosque-gold/50">
                PROFIL SEJARAH SINGKAT
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 leading-tight drop-shadow-lg">
                <!--Masjid Jami <br class="hidden md:block"> -->
                <span class="text-mosque-gold"><?= $profil['nama_masjid'] ?? 'Nailul Maram' ?></span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto flex items-center justify-center gap-2">
                <i class="fa-solid fa-location-dot text-mosque-gold"></i>
                <?= $profil['alamat_lengkap'] ?? 'Kel. Lappa, Kec. Sinjai Utara, Kab. Sinjai, Sulawesi Selatan' ?>
            </p>
            <div class="inline-block bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="500">
                <p class="text-xl font-semibold italic text-white tracking-wide">
                    "Pusat Peradaban Umat yang Adaptif"
                </p>
            </div>
            
            <div class="mt-16 animate-bounce">
                <a href="#tentang" class="text-white/70 hover:text-white transition">
                    <i class="fa-solid fa-chevron-down text-3xl"></i>
                </a>
            </div>
        </div>
    </header>

    <section id="tentang" class="py-20 bg-white">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-mosque-green mb-4">Pusat Spiritual & Sosial</h2>
                <div class="h-1 w-20 bg-mosque-gold mx-auto rounded"></div>
            </div>
            <p class="text-lg leading-relaxed text-slate-600 text-justify md:text-center" data-aos="fade-up" data-aos-delay="200">
                Masjid Jami Nailul Maram memiliki nilai sejarah dan peran penting dalam kehidupan keagamaan masyarakat di Kelurahan Lappa. Terletak di lokasi yang sangat strategis, tepatnya di perempatan Jalan Halim Perdana Kusuma dan Jalan Cakalang, masjid ini bukan sekadar tempat salat, melainkan pusat aktivitas ibadah sekaligus ruang pertemuan sosial kemasyarakatan yang terus hidup dan berkembang.
            </p>
        </div>
    </section>

    <section class="py-20 bg-slate-50 relative overflow-hidden">
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="text-center mb-16" data-aos="fade-down">
                <h2 class="text-3xl font-bold text-mosque-green mb-4">Jejak Langkah & Perkembangan</h2>
                <p class="text-slate-500">Fase pembangunan dan renovasi menyesuaikan kebutuhan jamaah</p>
            </div>

            <div class="relative timeline-line">
                
                <div class="mb-12 flex flex-col md:flex-row items-center justify-between w-full" data-aos="fade-right">
                    <div class="order-1 md:w-5/12 hidden md:block"></div>
                    <div class="z-20 flex items-center justify-center order-1 bg-mosque-green shadow-xl w-12 h-12 rounded-full absolute left-4 md:left-1/2 transform md:-translate-x-1/2">
                        <i class="fa-solid fa-hammer text-white"></i>
                    </div>
                    <div class="order-1 rounded-xl bg-white shadow-md p-6 md:w-5/12 ml-16 md:ml-0 border-l-4 border-mosque-green">
                        <h3 class="font-bold text-xl text-mosque-green mb-1">Awal Pembangunan</h3>
                        <p class="text-sm font-semibold text-mosque-gold mb-3">Ukuran 12 x 12 Meter</p>
                        <p class="text-slate-600 text-sm">Berdiri sebagai langkah awal untuk memfasilitasi ibadah masyarakat sekitar yang mulai tumbuh.</p>
                    </div>
                </div>

                <div class="mb-12 flex flex-col md:flex-row items-center justify-between w-full" data-aos="fade-left">
                    <div class="order-1 rounded-xl bg-white shadow-md p-6 md:w-5/12 ml-16 md:ml-0 border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-mosque-green md:text-right">
                        <h3 class="font-bold text-xl text-mosque-green mb-1">Renovasi Pertama</h3>
                        <p class="text-sm font-semibold text-mosque-gold mb-3">Ukuran 15 x 15 Meter</p>
                        <p class="text-slate-600 text-sm">Seiring bertambahnya jumlah jamaah dan aktivitas keagamaan, masjid diperluas untuk kenyamanan bersama.</p>
                    </div>
                    <div class="z-20 flex items-center justify-center order-1 bg-mosque-green shadow-xl w-12 h-12 rounded-full absolute left-4 md:left-1/2 transform md:-translate-x-1/2">
                        <i class="fa-solid fa-arrows-up-down-left-right text-white"></i>
                    </div>
                    <div class="order-1 md:w-5/12 hidden md:block"></div>
                </div>

                <div class="mb-12 flex flex-col md:flex-row items-center justify-between w-full" data-aos="fade-right">
                    <div class="order-1 md:w-5/12 hidden md:block"></div>
                    <div class="z-20 flex items-center justify-center order-1 bg-mosque-green shadow-xl w-12 h-12 rounded-full absolute left-4 md:left-1/2 transform md:-translate-x-1/2">
                        <i class="fa-solid fa-mosque text-white"></i>
                    </div>
                    <div class="order-1 rounded-xl bg-white shadow-md p-6 md:w-5/12 ml-16 md:ml-0 border-l-4 border-mosque-green">
                        <h3 class="font-bold text-xl text-mosque-green mb-1">Tahun 1960</h3>
                        <p class="text-sm font-semibold text-mosque-gold mb-3">Ukuran 20 x 20 Meter</p>
                        <p class="text-slate-600 text-sm">Renovasi besar menjadi tonggak penting dalam pengembangan fungsi masjid sebagai pusat kegiatan pembinaan umat.</p>
                    </div>
                </div>

                <div class="mb-12 flex flex-col md:flex-row items-center justify-between w-full" data-aos="fade-left">
                    <div class="order-1 rounded-xl bg-white shadow-md p-6 md:w-5/12 ml-16 md:ml-0 border-r-0 md:border-r-4 md:border-l-0 border-l-4 border-mosque-green md:text-right">
                        <h3 class="font-bold text-xl text-mosque-green mb-1">Tahun 2000 - Sekarang</h3>
                        <p class="text-sm font-semibold text-mosque-gold mb-3">Ukuran 21 x 21 Meter</p>
                        <p class="text-slate-600 text-sm">Renovasi keempat yang tetap dipertahankan hingga saat ini, memperkuat fungsi sosial dan kemasyarakatan masjid di era modern.</p>
                    </div>
                    <div class="z-20 flex items-center justify-center order-1 bg-mosque-gold shadow-xl w-12 h-12 rounded-full absolute left-4 md:left-1/2 transform md:-translate-x-1/2 animate-pulse">
                        <i class="fa-solid fa-star text-white"></i>
                    </div>
                    <div class="order-1 md:w-5/12 hidden md:block"></div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="zoom-in">
                <h2 class="text-3xl font-bold text-mosque-green mb-4">Pusat Aktivitas Umat</h2>
                <p class="text-slate-600 max-w-2xl mx-auto">Hingga tahun 2026, pengurus masjid terus aktif melaksanakan program yang melibatkan jamaah dan masyarakat luas.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-slate-50 rounded-2xl p-8 hover:-translate-y-2 transition duration-300 shadow-sm hover:shadow-xl border border-slate-100" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-emerald-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fa-solid fa-book-quran text-2xl text-mosque-green"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">Dakwah & Pendidikan</h3>
                    <p class="text-slate-600 text-sm">Pusat pendidikan keislaman yang menanamkan nilai-nilai ukhuwah islamiyah secara berkelanjutan.</p>
                </div>
                <div class="bg-slate-50 rounded-2xl p-8 hover:-translate-y-2 transition duration-300 shadow-sm hover:shadow-xl border border-slate-100" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-emerald-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fa-solid fa-users text-2xl text-mosque-green"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">Pembinaan Generasi Muda</h3>
                    <p class="text-slate-600 text-sm">Wadah positif untuk merangkul pemuda dalam kegiatan yang mempererat persaudaraan.</p>
                </div>
                <div class="bg-slate-50 rounded-2xl p-8 hover:-translate-y-2 transition duration-300 shadow-sm hover:shadow-xl border border-slate-100" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 bg-emerald-100 rounded-lg flex items-center justify-center mb-6">
                        <i class="fa-solid fa-hand-holding-heart text-2xl text-mosque-green"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">Kegiatan Sosial</h3>
                    <p class="text-slate-600 text-sm">Program kemanusiaan dan pelayanan yang memperkuat harmoni di tengah masyarakat Kelurahan Lappa.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-mosque-green text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-800 rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-teal-800 rounded-full mix-blend-multiply filter blur-3xl opacity-50 transform -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div data-aos="zoom-in-up">
                <span class="text-mosque-gold font-bold tracking-widest text-sm uppercase mb-3 block">Visi Masa Depan</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Menuju Masjid 5.0</h2>
                <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-10 italic">
                    "Peradaban selalu dimulai dari masjid"
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white/10 backdrop-blur border border-white/20 p-6 rounded-2xl">
                    <i class="fa-solid fa-graduation-cap text-3xl mb-4 text-mosque-gold"></i>
                    <h4 class="font-semibold">Pusat Edukasi</h4>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 p-6 rounded-2xl">
                    <i class="fa-solid fa-laptop-code text-3xl mb-4 text-mosque-gold"></i>
                    <h4 class="font-semibold">Literasi Digital</h4>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 p-6 rounded-2xl">
                    <i class="fa-solid fa-chart-line text-3xl mb-4 text-mosque-gold"></i>
                    <h4 class="font-semibold">Pemberdayaan Umat</h4>
                </div>
                <div class="bg-white/10 backdrop-blur border border-white/20 p-6 rounded-2xl">
                    <i class="fa-solid fa-people-roof text-3xl mb-4 text-mosque-gold"></i>
                    <h4 class="font-semibold">Inklusif & Modern</h4>
                </div>
            </div>

            <div class="mt-20 text-white/40 text-sm italic" data-aos="fade-up">
                &mdash; Dari berbagai Sumber / Narasi: Takdir Kahar (Sekretaris MJNM)
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            once: true, // Animation only triggers once
            offset: 100, // Offset from original trigger point
            duration: 800, // Animation duration
            easing: 'ease-out-cubic', // Easing for animations
        });
    </script>
<?= $this->endSection() ?>

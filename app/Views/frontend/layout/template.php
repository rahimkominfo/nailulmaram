<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Masjid Jami - Website Resmi' ?></title>

    <!-- Meta Tags for Social Media (Open Graph & Twitter) -->
    <meta name="description" content="<?= $meta_description ?? 'Website Resmi Masjid Jami Nailul Maram - Pusat Dakwah & Pendidikan' ?>">
    <meta property="og:title" content="<?= $title ?? 'Masjid Jami - Website Resmi' ?>">
    <meta property="og:description" content="<?= $meta_description ?? 'Website Resmi Masjid Jami Nailul Maram - Pusat Dakwah & Pendidikan' ?>">
    <meta property="og:image" content="<?= $meta_image ?? base_url('images/logo_masjid.jpeg') ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'Masjid Jami - Website Resmi' ?>">
    <meta name="twitter:description" content="<?= $meta_description ?? 'Website Resmi Masjid Jami Nailul Maram - Pusat Dakwah & Pendidikan' ?>">
    <meta name="twitter:image" content="<?= $meta_image ?? base_url('images/logo_masjid.jpeg') ?>">

    <link rel="icon" type="image/jpeg" href="<?= base_url('images/logo_masjid.jpeg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <?= $this->renderSection('extra_css') ?>
    <style>
        @keyframes kenburns {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
        .animate-kenburns {
            animation: kenburns 20s infinite alternate ease-in-out;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        
        /* Animasi Kustom untuk Galeri */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }
        .delay-100 {
            animation-delay: 100ms;
        }
        .delay-300 {
            animation-delay: 300ms;
        }

        /* Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 60s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 overflow-x-hidden">

    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-white p-1 rounded-lg shadow-lg shadow-green-100 overflow-hidden border border-gray-100">
                    <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo Masjid" class="h-10 w-10 object-contain">
                </div>
                <span class="text-2xl font-bold text-green-800 tracking-tight"><?= strtoupper($profil['nama_masjid'] ?? 'MASJID JAMI') ?></span>
            </div>
            <div class="hidden md:flex space-x-8 font-semibold">
                <a href="<?= base_url() ?>" class="<?= (current_url() == base_url() || current_url() == base_url().'/') ? 'text-green-600' : 'hover:text-green-600 transition' ?>">Beranda</a>
                <div class="relative">
                    <button id="desktop-profil-toggle" class="flex items-center space-x-1 <?= (strpos(current_url(), base_url('profil')) !== false) ? 'text-green-600' : 'hover:text-green-600 transition' ?> focus:outline-none">
                        <span>Profil</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="desktop-profil-icon"></i>
                    </button>
                    <div id="desktop-profil-dropdown" class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 hidden z-50 border border-gray-100">
                        <a href="<?= base_url('profil') ?>" class="block px-6 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Sejarah Nailul Maram</a>
                        <a href="<?= base_url('profil/pengurus') ?>" class="block px-6 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">Pengurus Masjid</a>
                    </div>
                </div>
                <a href="<?= base_url() ?>#jadwal" class="hover:text-green-600 transition">Jadwal Sholat</a>
                <a href="<?= base_url('berita') ?>" class="hover:text-green-600 transition">Berita</a>
                <a href="<?= base_url('quran') ?>" class="<?= (current_url() == base_url('quran')) ? 'text-green-600' : 'hover:text-green-600 transition' ?>">Al-Qur'an</a>
                <a href="<?= base_url('qurban') ?>" class="<?= (current_url() == base_url('qurban')) ? 'text-green-600' : 'hover:text-green-600 transition' ?>">Qurban</a>
                <a href="<?= base_url('galeri') ?>" class="hover:text-green-600 transition">Galeri</a>
                <a href="#kontak" class="hover:text-green-600 transition">Kontak</a>
            </div>
            <button id="menu-toggle" class="md:hidden text-2xl text-gray-600 focus:outline-none transition-transform duration-300">
                <i class="fas fa-bars" id="menu-icon"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden overflow-hidden max-h-0 bg-white transition-all duration-300 ease-in-out border-t border-gray-100">
            <div class="px-6 py-4 flex flex-col space-y-4 font-semibold text-gray-700">
                <a href="<?= base_url() ?>" class="hover:text-green-600 transition">Beranda</a>
                <div>
                    <button id="mobile-profil-toggle" class="flex items-center justify-between w-full hover:text-green-600 transition focus:outline-none">
                        <span>Profil</span>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="mobile-profil-icon"></i>
                    </button>
                    <div id="mobile-profil-submenu" class="max-h-0 overflow-hidden transition-all duration-300 flex flex-col space-y-3 pl-4 mt-3 border-l-2 border-green-100">
                        <a href="<?= base_url('profil') ?>" class="text-sm hover:text-green-600 transition mobile-menu-link">Sejarah Nailul Maram</a>
                        <a href="<?= base_url('profil/pengurus') ?>" class="text-sm hover:text-green-600 transition mobile-menu-link">Pengurus Masjid</a>
                    </div>
                </div>
                <a href="<?= base_url() ?>#jadwal" class="hover:text-green-600 transition mobile-menu-link">Jadwal Sholat</a>
                <a href="<?= base_url('berita') ?>" class="hover:text-green-600 transition">Berita</a>
                <a href="<?= base_url('quran') ?>" class="<?= (current_url() == base_url('quran')) ? 'text-green-600' : 'hover:text-green-600 transition' ?>">Al-Qur'an</a>
                <a href="<?= base_url('qurban') ?>" class="<?= (current_url() == base_url('qurban')) ? 'text-green-600' : 'hover:text-green-600 transition' ?>">Qurban</a>
                <a href="<?= base_url('galeri') ?>" class="hover:text-green-600 transition">Galeri</a>
                <a href="#kontak" class="hover:text-green-600 transition mobile-menu-link">Kontak</a>
            </div>
        </div>
    </nav>

    <?php
    $kelompok = [
        1 => ['H. Muh. Sadar', 'Hj. Nikma', 'Nasrullah', 'Ratnawati', 'Rustan', 'Niar', 'Nurlaela'],
        2 => ['Djubirusman Madya', 'Sanusi Madya Mrzz', 'Muh. Arsyad Madya', 'H. Basri Nurdin', 'Muh. Ishak Nurdin', 'Abd. Rasid', 'Tarmadi'],
        3 => ['Zulfadli B', 'Haliq Abdul Walid BM', 'Nurtina', 'Sribulan', 'Muhammad Idris', 'Baharuddin', 'Hj. Farida'],
        4 => ['Rosmawati Madya', 'H. Akbar', 'Affzaturrahman Akbar', 'Ilham Cokro', 'Muhdar', 'Syamsul Bahri', 'H. Safri'],
        5 => ['H. Mappaselle', 'Muh. Amir', 'Hj. Maswiah', 'Sultan', 'Ratna HB', 'Abd. Muzakkir', 'Hj. Rohani'],
        6 => ['Muh. Anis', 'Sudirman', 'Hj. Syamsiah Junaid', 'Muh. Arif', 'Nur Akhmad', 'H. Muh. Amir Siri', 'Munandar Muhti'],
        7 => ['Maksum', 'Abd. Samad', 'Sukman', 'Fauziah Husain', 'Muh. Rezky Sakti Hidayat', 'Sabri Hidayat', 'Ambo Tang Rauf'],
        8 => ['Munawirul Alma', 'Ridwan H. Junaid', 'Mustamin Bin Poto', 'Rahmatia H. P', 'Mappiare DG Maloga', 'Mustakim', 'Alimuddin Tahir'],
        9 => ['Syamsuddin Daud', 'Hj. Farida', 'Amiluddin', 'H. Amiruddin Akil', 'Jamaluddin H. Kunnu', 'Hj. Harsa', 'Hj. Andi Nurmiah Tenro'],
        10 => ['H. Badris Salam', 'Mustakim', 'Muhammad Alwi', 'Imam Nursani, SE', 'Agung Ayu Gitah, S.Farm', 'FAIZAL AMIN', 'NURFIRAH KASIM'],
    ];

    $running_text = "Daftar Nama-nama Peserta Qurban ";
    foreach ($kelompok as $no => $anggota) {
        $running_text .= "<span class='font-bold text-green-700'>Kelompok $no:</span> " . implode(', ', $anggota) . " <span class='mx-4 text-gray-300'>|</span> ";
    }
    // Duplicate for seamless loop
    $full_text = $running_text . $running_text;
    ?>

    <div class="bg-green-50 border-b border-green-100 overflow-hidden py-2">
        <div class="whitespace-nowrap animate-marquee inline-block">
            <span class="text-sm text-green-900 font-medium">
                <?= $full_text ?>
            </span>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

    <footer id="kontak" class="bg-white pt-24 pb-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 border-b border-gray-100 pb-20">
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="bg-white p-1 rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                            <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo Masjid" class="h-12 w-12 object-contain">
                        </div>
                        <span class="text-3xl font-black text-green-900 tracking-tighter"><?= strtoupper($profil['nama_masjid'] ?? 'MASJID JAMI') ?></span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed italic font-light mb-8">
                        Menjadi wadah persatuan umat dan sumber ilmu syar'i yang berlandaskan Al-Qur'an dan Sunnah di wilayah Sulawesi Selatan.
                    </p>
                    <div class="flex space-x-4">
                        <?php if($profil['youtube'] ?? false): ?>
                            <a href="<?= $profil['youtube'] ?>" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-red-600 hover:bg-red-600 hover:text-white transition shadow-sm"><i class="fab fa-youtube text-sm"></i></a>
                        <?php endif; ?>
                        <?php if($profil['instagram'] ?? false): ?>
                            <a href="<?= $profil['instagram'] ?>" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-pink-600 hover:bg-pink-600 hover:text-white transition shadow-sm"><i class="fab fa-instagram text-sm"></i></a>
                        <?php endif; ?>
                        <?php if($profil['facebook'] ?? false): ?>
                            <a href="<?= $profil['facebook'] ?>" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-blue-700 hover:bg-blue-700 hover:text-white transition shadow-sm"><i class="fab fa-facebook-f text-sm"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <h5 class="text-sm font-bold text-gray-800 mb-8 tracking-widest uppercase border-l-4 border-green-600 pl-4">Alamat & Kontak</h5>
                    <ul class="space-y-6">
                        <li class="flex items-start text-gray-600">
                            <i class="fas fa-map-marked-alt text-green-600 mt-1 mr-4 text-lg"></i>
                            <span class="text-xs font-medium"><?= $profil['alamat_lengkap'] ?? 'Jl. Poros Sulawesi No. 123, Kabupaten Bone, Sulawesi Selatan.' ?></span>
                        </li>
                        <?php if($profil['whatsapp'] ?? false): ?>
                        <li class="flex items-center text-gray-600">
                            <i class="fab fa-whatsapp text-green-500 mr-4 text-xl"></i>
                            <span class="text-xs font-bold tracking-wider"><?= $profil['whatsapp'] ?> (Admin)</span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div>
                    <h5 class="text-sm font-bold text-gray-800 mb-8 tracking-widest uppercase border-l-4 border-green-600 pl-4">
                        <i class="fas fa-chart-line mr-2"></i>Statistik Pengunjung
                    </h5>
                    <?= view_cell('App\Cells\VisitorCell::render') ?>
                </div>                <div>
                    <h5 class="text-sm font-bold text-gray-800 mb-8 tracking-widest uppercase border-l-4 border-green-600 pl-4">Lokasi Masjid</h5>
                    <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.935523907869!2d120.26522747365276!3d-5.114094294862933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbc25e96830e7ed%3A0x96576e91d5c2cdad!2sMasjid%20Jami&#39;%20Nailul%20Maram%20Lappa!5e0!3m2!1sid!2sid!4v1772287149032!5m2!1sid!2sid" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <p class="text-center mt-12 text-gray-400 text-xs font-bold uppercase tracking-widest">&copy; <?= date('Y') ?> Masjid Jami Nailul Maram</p>
        </div>
    </footer>

    <div id="galleryModal" class="fixed inset-0 z-[100] hidden bg-black/95 flex items-center justify-center p-6 backdrop-blur-md transition-all duration-500">
        <button onclick="closeGallery()" class="absolute top-8 right-8 text-white text-5xl font-thin hover:text-green-500 transition-all">&times;</button>
        <button onclick="prevSlide()" class="absolute left-6 top-1/2 -translate-y-1/2 text-white bg-white/10 w-16 h-16 rounded-full hover:bg-green-600 transition-all shadow-2xl"><i class="fas fa-chevron-left text-2xl"></i></button>
        <button onclick="nextSlide()" class="absolute right-6 top-1/2 -translate-y-1/2 text-white bg-white/10 w-16 h-16 rounded-full hover:bg-green-600 transition-all shadow-2xl"><i class="fas fa-chevron-right text-2xl"></i></button>
        <div class="max-w-6xl w-full flex flex-col items-center">
            <h4 id="modalAlbumTitle" class="text-green-400 font-black uppercase tracking-widest text-xl mb-6 text-center"></h4>
            <img id="modalImg" src="" class="max-w-full max-h-[65vh] object-contain rounded-2xl shadow-2xl border-4 border-white/5 transition-all duration-500 shadow-green-900/20">
            <p id="modalCounter" class="text-gray-400 mt-10 text-xs font-bold tracking-[0.3em] uppercase"></p>
        </div>
    </div>

    <script>
        // Data Berita Carousel
        let currentNewsIdx = 0;
        let newsInterval;

        function changeNews(n) {
            const slides = document.querySelectorAll('.news-slide');
            if (slides.length === 0) return;

            slides[currentNewsIdx].classList.replace('opacity-100', 'opacity-0');
            slides[currentNewsIdx].classList.replace('z-10', 'z-0');
            slides[currentNewsIdx].classList.add('pointer-events-none');

            currentNewsIdx = (currentNewsIdx + n + slides.length) % slides.length;

            slides[currentNewsIdx].classList.replace('opacity-0', 'opacity-100');
            slides[currentNewsIdx].classList.replace('z-0', 'z-10');
            slides[currentNewsIdx].classList.remove('pointer-events-none');

            resetNewsInterval();
        }

        function startNewsCarousel() {
            newsInterval = setInterval(() => changeNews(1), 5000);
        }

        function resetNewsInterval() {
            clearInterval(newsInterval);
            startNewsCarousel();
        }

        startNewsCarousel();

        // Data Galeri
        const galleryData = {
            album1: [
                "https://images.pexels.com/photos/337901/pexels-photo-337901.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/2236674/pexels-photo-2236674.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/4344441/pexels-photo-4344441.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/8164567/pexels-photo-8164567.jpeg?auto=compress&cs=tinysrgb&w=1200"
            ],
            album2: [
                "https://images.pexels.com/photos/3621217/pexels-photo-3621217.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/6646917/pexels-photo-6646917.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/5213060/pexels-photo-5213060.jpeg?auto=compress&cs=tinysrgb&w=1200",
                "https://images.pexels.com/photos/5213061/pexels-photo-5213061.jpeg?auto=compress&cs=tinysrgb&w=1200"
            ]
        };

        let currentActiveAlbum = [];
        let currentImgIdx = 0;

        function openGallery(key) {
            currentActiveAlbum = galleryData[key];
            currentImgIdx = 0;
            updateModalUI();
            document.getElementById('galleryModal').classList.remove('hidden', 'opacity-0');
            document.body.style.overflow = 'hidden';
        }

        function closeGallery() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function updateModalUI() {
            const img = document.getElementById('modalImg');
            if (!img) return;
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = currentActiveAlbum[currentImgIdx];
                img.style.opacity = '1';
                const counter = document.getElementById('modalCounter');
                if (counter) {
                    counter.innerText = `FOTO ${currentImgIdx + 1} DARI ${currentActiveAlbum.length}`;
                }
            }, 150);
        }

        function nextSlide() { currentImgIdx = (currentImgIdx + 1) % currentActiveAlbum.length; updateModalUI(); }
        function prevSlide() { currentImgIdx = (currentImgIdx - 1 + currentActiveAlbum.length) % currentActiveAlbum.length; updateModalUI(); }

        document.getElementById('galleryModal').addEventListener('click', function(e) { if(e.target === this) closeGallery(); });

        // Desktop Profil Dropdown
        const desktopProfilToggle = document.getElementById('desktop-profil-toggle');
        const desktopProfilDropdown = document.getElementById('desktop-profil-dropdown');
        const desktopProfilIcon = document.getElementById('desktop-profil-icon');

        if (desktopProfilToggle) {
            desktopProfilToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = desktopProfilDropdown.classList.contains('hidden');
                if (isHidden) {
                    desktopProfilDropdown.classList.remove('hidden');
                    desktopProfilIcon.classList.add('rotate-180');
                } else {
                    desktopProfilDropdown.classList.add('hidden');
                    desktopProfilIcon.classList.remove('rotate-180');
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (desktopProfilDropdown && !desktopProfilDropdown.classList.contains('hidden')) {
                    if (!desktopProfilToggle.contains(e.target) && !desktopProfilDropdown.contains(e.target)) {
                        desktopProfilDropdown.classList.add('hidden');
                        desktopProfilIcon.classList.remove('rotate-180');
                    }
                }
            });
        }

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const menuLinks = document.querySelectorAll('.mobile-menu-link');

        const profilToggle = document.getElementById('mobile-profil-toggle');
        const profilSubmenu = document.getElementById('mobile-profil-submenu');
        const profilIcon = document.getElementById('mobile-profil-icon');

        menuBtn.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.contains('max-h-[500px]');
            if (isOpen) {
                mobileMenu.classList.remove('max-h-[500px]');
                mobileMenu.classList.add('max-h-0');
                menuIcon.classList.replace('fa-times', 'fa-bars');
            } else {
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-[500px]');
                menuIcon.classList.replace('fa-bars', 'fa-times');
            }
        });

        profilToggle.addEventListener('click', (e) => {
            e.preventDefault();
            const isOpen = profilSubmenu.classList.contains('max-h-40');
            if (isOpen) {
                profilSubmenu.classList.remove('max-h-40');
                profilSubmenu.classList.add('max-h-0');
                profilIcon.classList.remove('rotate-180');
            } else {
                profilSubmenu.classList.remove('max-h-0');
                profilSubmenu.classList.add('max-h-40');
                profilIcon.classList.add('rotate-180');
                // Adjust parent menu height if needed
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-[700px]');
            }
        });

        // Close menu when anchor links are clicked
        menuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('max-h-[500px]', 'max-h-[700px]');
                mobileMenu.classList.add('max-h-0');
                menuIcon.classList.replace('fa-times', 'fa-bars');
            });
        });
    </script>
    <?= $this->renderSection('extra_js') ?>
</body>
</html>

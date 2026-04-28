<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= $title ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Lora', serif;
            background-color: #fcfcfc;
            color: #333;
            overflow-x: hidden;
            width: 100%;
        }
        h1, h2, h3, .font-title {
            font-family: 'Playfair Display', serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: #0ea5e9;
            width: 0%;
            z-index: 50;
            transition: width 0.1s;
        }
    </style>
</head>
<body class="antialiased leading-relaxed">

    <!-- Reading Progress Bar -->
    <div class="progress-bar" id="progressBar"></div>

    <!-- Hero Section -->
    <header class="relative w-full h-screen flex items-center justify-center overflow-hidden bg-slate-900 text-white">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="<?= base_url('images/panglima_masjid/1.png') ?>" alt="Masjid Siluet" class="w-full h-full object-cover opacity-30">
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl" data-aos="zoom-in" data-aos-duration="1500">
            <p class="text-sky-400 tracking-widest uppercase text-sm font-semibold mb-4">Kisah Nyata Inspiratif</p>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight shadow-sm">Panglima Masjid:<br><span class="text-sky-300">Langkah Cahaya Abduh</span></h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-10 italic">Karya Takdir Kahar</p>
            <div class="animate-bounce mt-12">
                <i class="fas fa-chevron-down text-2xl text-gray-400"></i>
            </div>
        </div>
    </header>

    <!-- Main Story Content -->
    <main class="max-w-3xl mx-auto px-6 py-20 md:py-32 text-lg md:text-xl text-gray-700 space-y-32">

        <!-- Scene 1: Masa Lalu -->
        <section data-aos="fade-up" data-aos-duration="1000">
            <div class="flex items-center space-x-4 mb-6 text-slate-400">
                <i class="fas fa-clock text-2xl"></i>
                <span class="tracking-widest uppercase text-sm font-bold">Kelurahan Lappa, Masa Lalu</span>
            </div>
            <p class="first-letter:text-7xl first-letter:font-title first-letter:font-bold first-letter:text-sky-900 first-letter:float-left first-letter:mr-3 first-letter:mt-2">
                Dahulu, di Kelurahan Lappa, semua orang mengenal Abduh sebagai pemuda yang sangat kuat namun temperamental. Ia jarang sekali terlihat di masjid dan lebih sering menghabiskan waktunya dengan kegiatan yang meresahkan warga. Kekuatannya digunakan untuk hal-hal yang tidak bermanfaat, membuat orang-orang segan sekaligus khawatir saat ia melintas.
            </p>
            <div class="mt-12" data-aos="zoom-in" data-aos-duration="1000">
                <img src="<?= base_url('images/panglima_masjid/2.png') ?>" alt="Ilustrasi Masa Lalu" class="rounded-2xl shadow-xl w-full h-auto">
            </div>
        </section>

        <!-- Scene 2: Aminah (with Image) -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-duration="1000" class="order-2 md:order-1">
                <p>Perubahan mulai tampak setelah Abduh bertemu dan menikah dengan <strong class="text-slate-900">Aminah</strong>.</p>
                <p class="mt-4">Aminah adalah sosok yang sabar dan selalu mengingatkan Abduh tentang indahnya berbagi kebaikan. Perlahan, hati Abduh yang keras mulai melunak, dan ia mulai belajar untuk menata hidupnya menjadi lebih bermakna demi keluarga kecilnya.</p>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000" class="order-1 md:order-2">
                <img src="<?= base_url('images/panglima_masjid/3.png') ?>" alt="Ilustrasi Pasangan" class="rounded-2xl shadow-2xl object-cover h-80 w-full hover:scale-105 transition-transform duration-500">
            </div>
        </section>

    </main>

    <!-- Scene 3: Ujian Berat (Dark Mode Section) -->
    <section class="bg-slate-900 text-gray-300 py-24 px-6 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
             <img src="<?= base_url('images/panglima_masjid/4.png') ?>" class="w-full h-full object-cover">
        </div>
        <div class="max-w-3xl mx-auto relative z-10" data-aos="fade-up" data-aos-duration="1200">
            <i class="fas fa-hospital-user text-4xl text-red-400 mb-8 opacity-80"></i>
            <h2 class="text-3xl font-title text-white mb-6">Sebuah Ujian Berat</h2>
            <p class="mb-6">Namun, sebuah ujian berat datang menghampiri. Abduh jatuh sakit parah yang menyerang kaki kirinya. Dokter Qasim dengan berat hati menyampaikan bahwa <span class="text-red-400 font-bold">kaki kiri Abduh harus diamputasi</span> agar nyawanya bisa terselamatkan.</p>
            <p class="text-xl italic border-l-4 border-slate-600 pl-6 text-gray-400">"Dunia terasa runtuh seketika bagi Abduh yang terbiasa hidup dengan fisik yang perkasa."</p>
        </div>
    </section>

    <main class="max-w-3xl mx-auto px-6 py-20 md:py-32 text-lg md:text-xl text-gray-700 space-y-32">
        
        <!-- Scene 4: Pemulihan -->
        <section data-aos="fade-up" data-aos-duration="1000">
            <p>Di masa-masa sulit pemulihan, Aminah tetap setia mendampingi. Ia selalu membisikkan doa dan kata-kata penyemangat agar Abduh tidak putus asa.</p>
            <p class="mt-6 font-semibold text-sky-900 text-2xl font-title">
                Saat itulah, Abduh menyadari bahwa meski kehilangan satu kaki, ia masih memiliki hati yang harus ia persembahkan sepenuhnya kepada Allah SWT.
            </p>
            <div class="mt-12" data-aos="zoom-in" data-aos-duration="1000">
                <img src="<?= base_url('images/panglima_masjid/5.png') ?>" alt="Ilustrasi Pemulihan" class="rounded-2xl shadow-xl w-full h-96 object-cover">
            </div>
        </section>

        <!-- Scene 5: Transformasi & Tongkat -->
        <section class="bg-slate-100 p-8 md:p-12 rounded-3xl shadow-sm border border-slate-200" data-aos="zoom-in-up" data-aos-duration="1000">
            <p class="text-center">Kini, di usianya yang ke-55, Abduh telah bertransformasi menjadi sosok yang sangat berbeda. Dengan bantuan sebuah tongkat kayu yang kuat, ia selalu melangkah tegap menuju Masjid Jami Nailul Maram.</p>
            <div class="my-8">
                <img src="<?= base_url('images/panglima_masjid/6.png') ?>" alt="Ilustrasi Tongkat" class="rounded-2xl shadow-lg w-full h-64 object-cover">
            </div>
            <p class="mt-6 text-center italic text-slate-500">
                Suara ketukan tongkatnya di aspal jalanan Kelurahan Lappa seolah menjadi alarm bagi warga bahwa waktu sholat telah tiba.
            </p>
        </section>

        <!-- Scene 6: Panglima Masjid -->
        <section data-aos="fade-right" data-aos-duration="1000">
            <h2 class="text-3xl font-title text-sky-900 mb-6">Sang Panglima Masjid</h2>
            <p>Warga menjulukinya <strong>'Panglima Masjid'</strong>. Bukan karena ia memimpin perang, melainkan karena kedisiplinannya yang luar biasa. Sebelum azan berkumandang, Abduh sudah berada di sana, memastikan kebersihan masjid dan menyapa anak-anak seperti Zaki dengan senyumnya yang penuh karisma.</p>
            <div class="mt-12">
                <img src="<?= base_url('images/panglima_masjid/7.png') ?>" alt="Ilustrasi Masjid" class="rounded-2xl shadow-xl w-full h-96 object-cover">
            </div>
        </section>

        <!-- Scene 7: Pelajaran -->
        <section data-aos="fade-left" data-aos-duration="1000" class="border-l-4 border-sky-400 pl-6">
            <p>Suatu sore, Abduh berbincang dengan Pak RT di serambi masjid. Ia menceritakan masa lalunya yang kelam sebagai pelajaran bagi yang lain. Abduh ingin semua orang tahu bahwa <em>tidak ada kata terlambat untuk kembali ke jalan Allah</em>, dan kekurangan fisik bukanlah penghalang untuk beribadah secara maksimal.</p>
            <div class="mt-8">
                <img src="<?= base_url('images/panglima_masjid/8.png') ?>" alt="Ilustrasi Berbincang" class="rounded-xl shadow-md w-full h-64 object-cover">
            </div>
        </section>

        <!-- Scene 8: Ketaatan -->
        <section data-aos="fade-up" data-aos-duration="1000">
            <p>Masjid Jami Nailul Maram di Sinjai Utara menjadi saksi bisu ketaatan Abduh. Tak peduli hujan deras atau panas menyengat, ia tidak pernah absen sholat lima waktu berjamaah. Baginya, setiap langkah menuju rumah Tuhan adalah bentuk syukur atas kesempatan hidup kedua yang diberikan kepadanya.</p>
            <div class="mt-12">
                <img src="<?= base_url('images/panglima_masjid/9.png') ?>" alt="Ilustrasi Ketaatan" class="rounded-2xl shadow-xl w-full h-96 object-cover">
            </div>
        </section>

        <!-- Scene 9: Kesimpulan (with Image) -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right" data-aos-duration="1000">
                <img src="<?= base_url('images/panglima_masjid/10.png') ?>" alt="Pria berjalan menuju cahaya" class="rounded-2xl shadow-2xl object-cover h-96 w-full hover:scale-105 transition-transform duration-500">
            </div>
            <div data-aos="fade-left" data-aos-duration="1000">
                <h3 class="text-2xl font-title text-slate-900 mb-4">Langkah Cahaya</h3>
                <p>Kisah Abduh menjadi teladan bagi seluruh warga Sinjai Utara. Sang Panglima Masjid telah membuktikan bahwa raga boleh terbatas, namun semangat untuk mengabdi pada Sang Pencipta tidak boleh memiliki batas.</p>
                <p class="mt-4 font-bold text-sky-700">Ia terus melangkah, menebar inspirasi dan cahaya di setiap jejak langkah kakinya yang dibantu tongkat.</p>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 text-center mt-20">
        <div class="max-w-3xl mx-auto px-6">
            <p class="font-title text-xl text-white mb-2">Panglima Masjid: Langkah Cahaya Abduh</p>
            <p class="text-sm">Ditulis oleh Takdir Kahar</p>
            <p class="text-xs mt-8 opacity-50">&copy; <?= date('Y') ?> <?= $profil['nama_masjid'] ?? 'Masjid Jami Nailul Maram' ?>. Diadaptasi ke Web.</p>
            <div class="mt-6">
                <a href="<?= base_url('/') ?>" class="text-sky-400 hover:text-sky-300 transition-colors text-sm">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </footer>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi Animasi AOS
        AOS.init({
            once: true, // animasi hanya diputar sekali saat di-scroll
            offset: 100, // jarak elemen dari bawah sebelum animasi dimulai
        });

        // Script untuk Reading Progress Bar
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progressBar").style.width = scrolled + "%";
        };
    </script>
</body>
</html>

<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('extra_css') ?>
<style>
    /* Menambahkan font kustom yang mirip dengan poster */
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Roboto:wght@700&display=swap');
    
    .qurban-body {
        font-family: 'Roboto', sans-serif;
        background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); /* Background padang rumput */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .title-font {
        font-family: 'Oswald', sans-serif;
    }

    /* Warna & Spasi kustom (Fallback jika Tailwind JIT tidak render) */
    .bg-qurban-dark {
        background-color: #8B2c2c !important;
    }
    .bg-qurban-red {
        background-color: #e62e2d !important;
    }
    .bg-qurban-black {
        background-color: #2a2a2a !important;
    }
    .bg-qurban-white {
        background-color: rgba(255, 255, 255, 0.95) !important;
    }
    .card-qurban-content {
        padding: 1.5rem !important; /* Memberikan ruang lebih luas di dalam card */
    }

    /* Styling untuk background sapi di dalam card */
    .cow-bg {
        background-image: url(<?= base_url('images/sapi_samping.webp') ?>);
        background-size: cover;
        background-position: center;
        position: relative;
        z-index: 1;
    }
    
    .cow-bg::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(255, 255, 255, 0.85); /* Efek pudar agar teks terbaca */
        z-index: -1;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="qurban-body min-h-screen py-10 px-4 md:px-10">
    <div class="max-w-6xl mx-auto bg-black/20 p-4 rounded-xl backdrop-blur-sm mt-10">
        
        <div class="flex flex-col lg:flex-row items-stretch gap-4 mb-6">
            <!-- Left Side: Logo and Title -->
            <div class="flex flex-col md:flex-row items-center gap-6 bg-qurban-dark p-6 rounded-2xl border border-white/10 flex-grow shadow-2xl">
                <div class="w-24 h-24 md:w-32 md:h-32 flex-shrink-0 bg-yellow-500 rounded-full border-4 border-white shadow-xl overflow-hidden flex items-center justify-center group">
                    <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo Masjid" class="w-full h-full object-cover opacity-80 mix-blend-multiply group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-2xl md:text-4xl font-black text-white tracking-tight uppercase leading-tight">
                        Daftar Nama Peserta <br class="hidden md:block">
                        <span class="text-yellow-400">Qurban 1447 H / 2026 M</span>
                    </h1>
                    <p class="text-white/40 text-xs md:text-sm font-bold tracking-[0.3em] uppercase mt-2">Masjid Jami Nailul Maram</p>
                </div>
            </div>

            <!-- Right Side: Contact and Action -->
            <div class="flex flex-col sm:flex-row lg:flex-col gap-3 lg:w-80">
                <!-- WhatsApp Contact -->
                <div class="flex items-center gap-4 bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 flex-1 hover:bg-white/15 transition-all">
                    <div class="w-12 h-12 flex-shrink-0 bg-green-500/20 rounded-xl flex items-center justify-center shadow-inner">
                        <i class="fab fa-whatsapp text-green-400 text-2xl"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[10px] text-white/50 font-bold uppercase tracking-widest mb-1">Contact Person</p>
                        <p class="text-sm font-extrabold text-white truncate">0823-9315-5711</p>
                        <p class="text-[10px] text-white/70 font-medium truncate uppercase">Sanusi Madya MRZZ</p>
                    </div>
                </div>

                <!-- Aduan Button -->
                <div class="flex items-center gap-4 bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/10 flex-1 hover:bg-white/15 transition-all">
                    <div class="w-12 h-12 flex-shrink-0 bg-blue-500/20 rounded-xl flex items-center justify-center shadow-inner">
                        <i class="fas fa-bullhorn text-blue-400 text-xl"></i>
                    </div>
                    <div class="flex-grow min-w-0">
                        <p class="text-[10px] text-white/50 font-bold uppercase tracking-widest mb-2">Layanan Aduan</p>
                        <a href="<?= base_url('aduan/buat?tujuan=17') ?>" 
                           class="flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 px-4 py-2 rounded-xl text-[11px] font-black transition-all shadow-lg uppercase active:scale-95 group">
                            <span>Sampaikan Aduan</span>
                            <i class="fas fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <?php 
            $kelompok = [
                1 => ['H. MUH.SADAR', 'HJ. NIKMA', 'NASRULLAH', 'RATNAWATI', 'RUSTAN', 'NIAR', 'NURLAELA'],
                2 => ['DJUBIRUSMAN MADYA', 'SANUSI MADYA MRZZ', 'MUH. ARSYAD MADYA', 'H. BASRI NURDIN', 'MUH. ISHAK NURDIN', 'ABD. RASID', 'TARMADI'],
                3 => ['ZULFADLI.B', 'HALIQ ABDUL WALID BM.', 'NURTINA', 'SRIBULAN', 'MUHAMMAD IDRIS', 'BAHARUDDIN', 'HJ. FARIDA'],
                4 => ['ROSMAWATI MADYA', 'H. AKBAR', 'AFFZATURRAHMAN AKBAR', 'ILHAM COKRO', 'MUHDAR', 'SYAMSUL BAHRI', 'H. SAFRI'],
                5 => ['H. MAPPASELLE', 'MUH. AMIR', 'HJ. MASWIAH', 'SULTAN', 'RATNA HB', 'ABD. MUZAKKIR', 'HJ. ROHANI'],
                6 => ['MUH. ANIS', 'SUDIRMAN', 'HJ. SYAMSIAH JUNAID', 'MUH. ARIF', 'NUR AKHMAD', 'H. MUH. AMIR SIRI', 'MUNANDAR MUHTI'],
                7 => ['MAKSUM', 'ABD. SAMAD', 'SUKMAN', 'FAUZIAH HUSAIN', 'MUH. REZKY SAKTI HIDAYAT', 'SABRI HIDAYAT', 'AMBO TANG RAUF'],
                8 => ['MUNAWIRUL ALMA', 'RIDWAN H.JUNAID', 'MUSTAMIN BIN POTO', 'RAHMATIA H.P', 'MAPPIARE DG MALOGA', 'MUSTAKIM', 'ALIMUDDIN TAHIR'],
                9 => ['SYAMSUDDIN DAUD', 'HJ. FARIDA', 'AMILUDDIN', 'H. AMIRUDDIN AKIL', 'JAMALUDDIN H. KUNNU', 'HJ. HARSA', 'HJ. ANDI NURMIAH TENRO'],
                10 => ['H. BADRIS SALAM', 'MUSTAKIM', 'MUHAMMAD ALWI', 'IMAM NURSANI, SE', 'AGUNG AYU GITAH, S.Farm', 'FAIZAL AMIN', 'NURFIRAH KASIM'],
                11 => ['H. FIRDAUS SYUAIB', 'AHRIANI AR.', 'NURJANNAH', 'DEDY MUH. ARHAM', 'MUNIR M. NUR', 'HASAN RAJA', 'MUCHDAR RAMADHAN'],
                12 => ['ACHMAD FAUZAN GUNTUR, SE', 'ARDIANSYAH', 'SYUKRI', 'IPTU HERMAN SUDI', 'H. KARDIN', 'HJ. WARDA', 'FARIDA JOHANIS'],
                13 => ['H. NASIR', 'TAKDIR ALI SYAHBANA RIDWAN','A. AMRAN NYONRI','M. TAHANG','MUH. HASYIM','MUKTADIR','HARLINAH ALWI'],
                14 => ['HJ. RAHMATIAH RAZAK GANI', 'NURLAELI RAZAK GANI', 'MUHAMMAD ARDIANSYAH','ASDAR','ALBEK','ASWAR','SURIANI']
            ];
            ?>

            <?php foreach($kelompok as $no => $peserta): ?>
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border-2 border-gray-200">
                <div class="bg-qurban-black text-white text-center py-2 text-2xl font-bold title-font tracking-wide">
                    KELOMPOK <?= $no ?>
                </div>
                <div class="card-qurban-content h-64 cow-bg">
                    <ul class="space-y-1 text-[15px] font-bold text-gray-900 relative z-10 leading-relaxed uppercase pl-2">
                        <?php foreach($peserta as $idx => $nama): ?>
                        <li><?= ($idx+1) ?>. <?= $nama ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?= $this->endSection() ?>

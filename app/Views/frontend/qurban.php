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
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-2 relative">
            
            <div class="w-32 h-32 flex-shrink-0 bg-yellow-500 rounded-full border-4 border-white shadow-lg overflow-hidden flex items-center justify-center">
                <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo Masjid" class="w-full h-full object-cover opacity-80 mix-blend-multiply">
            </div>

            <div class="flex-grow flex flex-col gap-2 w-full">
                <div class="flex flex-col xl:flex-row gap-2">
                    
                    <div class="bg-qurban-white rounded-lg p-2 flex items-center gap-4 shadow-md flex-grow border-b-4 border-green-600">
                        <img src="<?= base_url('images/barcode_daftar.png') ?>" alt="QR Code" class="w-16 h-16 border p-1">
                        <div class="flex flex-col text-sm md:text-base text-gray-800 font-bold w-full">
                            <div class="flex items-center gap-2 border-b border-gray-300 pb-1 mb-1">
                                <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                                <span>CONTAK PERSON : 0823-9315-5711 (SANUSI MADYA MRZZ)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="https://s.id/FormulirPendaftaranQurban"><i class="fas fa-link text-blue-600"></i>
                                <span>https://s.id/FormulirPendaftaranQurban</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-qurban-white rounded-lg p-3 flex flex-col justify-center shadow-md border-b-4 border-blue-600 xl:w-1/3">
                        <div class="flex items-center gap-2 text-blue-800 font-bold mb-1">
                            <img src="<?= base_url('images/bri.png') ?>" alt="Logo BRI" class="h-5 object-contain">
                            <span>BANK BRI</span>
                        </div>
                        <div class="text-sm md:text-base font-bold text-gray-800">
                            NOMOR REKENING : 507001019944536
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-stretch mb-8 mt-4 shadow-lg rounded-lg overflow-hidden border-2 border-white/50">
            <div class="bg-qurban-dark text-white flex-grow flex items-center px-6 py-3">
                <h1 class="text-2xl md:text-3xl font-bold tracking-wide uppercase">Daftar Nama - Nama Peserta Qurban</h1>
            </div>
            <div class="bg-qurban-red text-white px-8 py-3 flex items-center justify-center title-font">
                <span class="text-3xl md:text-4xl font-bold tracking-wider">Rp. 2.600.000 / Orang</span>
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
                11 => ['H. FIRDAUS SYUAIB', 'AHRIANI AR.', 'NURJANNAH', 'DEDY MUH. ARHAM', '', '', ''],
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

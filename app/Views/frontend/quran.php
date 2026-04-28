<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('extra_css') ?>
<link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Lateef&display=swap" rel="stylesheet">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .font-quran {
        font-family: 'Amiri', serif;
        direction: rtl;
        line-height: 2 !important; /* Force very wide line spacing for complex Arabic glyphs */
    }
    .font-ayah-number {
        font-family: 'Lateef', cursive;
    }
    /* Select2 Custom Styling to match Tailwind */
    .select2-container--default .select2-selection--single {
        border-color: #e5e7eb;
        border-radius: 0.75rem;
        height: 46px;
        padding-top: 8px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 44px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
    }
    .select2-dropdown {
        border-radius: 0.75rem;
        border-color: #e5e7eb;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #059669;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<!-- jQuery & Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            placeholder: 'Pilih...',
            allowClear: false
        });
    });

    let baseSize = 100;
    function changeFontSize(delta) {
        baseSize += delta;
        if (baseSize < 60) baseSize = 60;
        if (baseSize > 200) baseSize = 200;
        
        const textElement = document.getElementById('quranText');
        textElement.style.fontSize = (baseSize / 100) * 3 + 'rem'; // 3rem is roughly text-5xl
        
        // On mobile we might want it smaller
        if (window.innerWidth < 768) {
            textElement.style.fontSize = (baseSize / 100) * 2.25 + 'rem'; // 2.25rem is text-4xl
        }

        document.getElementById('fontSizeDisplay').innerText = baseSize + '%';
    }

    function scrollToAyah(number) {
        if (!number) return;
        const element = document.getElementById('ayah-' + number);
        if (element) {
            // Remove previous highlights
            document.querySelectorAll('.ayah-item').forEach(el => {
                el.classList.remove('bg-green-100', 'text-green-900', 'font-bold');
            });
            
            // Add highlight and scroll
            element.classList.add('bg-green-100', 'text-green-900', 'font-bold');
            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Temporary highlight effect
            setTimeout(() => {
                element.classList.remove('bg-green-100');
            }, 3000);
        }
    }
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<div class="relative bg-black py-32 md:py-56 overflow-hidden">
    <!-- Background Image with deep overlay -->
    <div class="absolute inset-0 z-0">
        <img src="<?= base_url('images/background2.jpeg') ?>" alt="Background" class="w-full h-full object-cover scale-105 blur-[3px] opacity-30">
        <!-- Solid to Gradient Overlay for maximum contrast -->
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-black/80"></div>
    </div>
    
    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="inline-block mb-6 px-6 py-2 rounded-full bg-green-600/30 border border-green-500/50 backdrop-blur-md">
            <span class="text-green-300 text-xs md:text-sm font-black uppercase tracking-[0.4em] drop-shadow-md">Mushaf Digital</span>
        </div>
        
        <h1 class="text-5xl md:text-8xl font-black text-white mb-8 tracking-tighter drop-shadow-[0_5px_15px_rgba(0,0,0,0.8)]">
            AL-QUR'AN<br class="md:hidden"> <span class="text-green-500">AL-KARIM</span>
        </h1>
        
        <div class="w-32 h-1.5 bg-green-500 mx-auto mb-10 rounded-full shadow-[0_0_20px_rgba(34,197,94,0.8)]"></div>
        
        <div class="max-w-4xl mx-auto bg-black/20 backdrop-blur-sm p-8 rounded-3xl border border-white/5 shadow-2xl">
            <p class="text-white text-xl md:text-2xl font-medium leading-relaxed italic drop-shadow-lg">
                "Bacalah Al-Qur'an, karena sesungguhnya ia akan datang pada hari kiamat sebagai pemberi syafa'at bagi pembacanya."
            </p>
            <div class="mt-6 flex items-center justify-center space-x-4">
                <div class="h-px w-8 bg-green-500/50"></div>
                <span class="font-bold text-green-400 text-base md:text-lg tracking-widest uppercase">HR. Muslim</span>
                <div class="h-px w-8 bg-green-500/50"></div>
            </div>
        </div>
    </div>

    <!-- Bottom Wave Shape -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <svg class="relative block w-full h-16 text-white" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C58.47,103.49,121,105,182.2,103.11,243.51,101.2,304,89,321.39,56.44Z" fill="currentColor"></path>
        </svg>
    </div>
</div>

<div class="container mx-auto px-6 -mt-10 relative z-20 pb-20">
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
        <!-- Control Bar -->
        <div class="bg-gray-50 p-6 md:p-8 border-b border-gray-100">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="text-2xl font-bold text-green-900">
                        <?php if (isset($currentSurah['nama'])): ?>
                            <?= $currentSurah['nama'] ?> <span class="text-lg font-normal text-gray-500">(<?= $currentSurah['nama_latin'] ?>)</span>
                        <?php endif; ?>
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        <?php if (isset($currentSurah)): ?>
                            <?= $currentSurah['tempat_turun'] ?> &bull; <?= $currentSurah['jumlah_ayat'] ?> Ayat
                        <?php endif; ?>
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-end gap-4">
                    <!-- Font Size Controls -->
                    <div class="flex flex-col">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Ukuran Huruf</label>
                        <div class="flex items-center bg-white border border-gray-200 rounded-xl p-1 shadow-sm">
                            <button onclick="changeFontSize(-4)" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-green-50 hover:text-green-600 rounded-lg transition">
                                <span class="text-xl font-bold">&minus;</span>
                            </button>
                            <span id="fontSizeDisplay" class="px-3 text-sm font-bold text-gray-700 select-none">100%</span>
                            <button onclick="changeFontSize(4)" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-green-50 hover:text-green-600 rounded-lg transition">
                                <i class="fas fa-plus text-lg"></i>
                            </button>
                        </div>
                    </div>

                    <div class="relative min-w-[200px]">
                        <label for="surahSelect" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Cari Surah</label>
                        <select id="surahSelect" class="select2 w-full" onchange="window.location.href='<?= base_url('quran') ?>/' + this.value">
                            <?php foreach ($surahList as $surah): ?>
                                <option value="<?= $surah['nomor'] ?>" <?= $selectedSurah == $surah['nomor'] ? 'selected' : '' ?>>
                                    <?= $surah['nomor'] ?>. <?= $surah['nama_latin'] ?> (<?= $surah['nama'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="relative min-w-[150px]">
                        <label for="ayahSelect" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Cari Ayat</label>
                        <select id="ayahSelect" class="select2 w-full" onchange="scrollToAyah(this.value)">
                            <option value="">Loncati ke...</option>
                            <?php if (isset($currentSurah['jumlah_ayat'])): ?>
                                <?php for ($i = 1; $i <= $currentSurah['jumlah_ayat']; $i++): ?>
                                    <option value="<?= $i ?>">Ayat <?= $i ?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Al-Quran Content -->
        <div class="p-6 md:p-12">
            <?php if (!$currentSurah): ?>
                <div class="text-center py-20">
                    <i class="fas fa-exclamation-triangle text-5xl text-yellow-400 mb-6"></i>
                    <h3 class="text-xl font-bold text-gray-800">Gagal memuat data</h3>
                    <p class="text-gray-500 mt-2">Pastikan koneksi internet stabil atau coba lagi nanti.</p>
                </div>
            <?php else: ?>
                <div class="p-4 md:p-10 bg-white rounded-3xl border border-gray-50 shadow-inner">
                    <!-- Bismillah -->
                    <?php if ($selectedSurah != 1 && $selectedSurah != 9): ?>
                        <div class="text-center mb-12">
                            <h3 class="font-quran text-4xl md:text-5xl text-green-800">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</h3>
                        </div>
                    <?php endif; ?>

                    <div id="quranText" class="font-quran text-right text-4xl md:text-5xl text-gray-800 space-x-reverse space-x-2">
                        <?php foreach ($ayahs as $ayah): ?>
                            <span id="ayah-<?= $ayah['nomor_ayat'] ?>" class="ayah-item inline scroll-mt-32 transition-all duration-500 rounded-lg px-1">
                                <?php 
                                $text = $ayah['teks_arab'];
                                // Hilangkan Bismillah jika ini ayat pertama dan bukan surah Al-Fatihah
                                if ($selectedSurah != 1 && $ayah['nomor_ayat'] == 1) {
                                    $text = str_replace("بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ", "", $text);
                                }
                                echo trim($text);
                                ?>
                                <span class="text-green-600 font-ayah-number text-3xl opacity-50 select-none mx-2">﴿<?= $ayah['nomor_ayat'] ?>﴾</span>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="flex justify-between items-center mt-20 pt-10 border-t border-gray-100">
                    <?php if ($selectedSurah > 1): ?>
                        <a href="<?= base_url('quran/' . ($selectedSurah - 1)) ?>" class="flex items-center space-x-3 text-green-600 font-bold hover:text-green-800 transition">
                            <i class="fas fa-arrow-left"></i>
                            <span>Surah Sebelumnya</span>
                        </a>
                    <?php else: ?>
                        <div></div>
                    <?php endif; ?>

                    <?php if ($selectedSurah < 114): ?>
                        <a href="<?= base_url('quran/' . ($selectedSurah + 1)) ?>" class="flex items-center space-x-3 text-green-600 font-bold hover:text-green-800 transition">
                            <span>Surah Selanjutnya</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


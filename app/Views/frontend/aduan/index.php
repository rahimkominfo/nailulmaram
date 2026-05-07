<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<div class="aduan-scope">
    <!-- ===== HERO SECTION ===== -->
    <section class="relative overflow-hidden bg-primary-900 bg-islamic-pattern">
        <!-- Decorative blobs -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-800 rounded-full mix-blend-soft-light opacity-30 blur-3xl -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-teal-700 rounded-full mix-blend-soft-light opacity-20 blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 lg:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 mb-6 animate-fade-in">
                    <span class="w-2 h-2 rounded-full bg-gold-500 animate-pulse-soft"></span>
                    <span class="text-gold-500 text-xs font-semibold tracking-wider uppercase">Layanan Aduan Online</span>
                </div>
                <h1 class="font-heading text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight animate-fade-in-up">
                    Suara Anda <span class="text-gold-500">Penting</span> Bagi Kami
                </h1>
                <p class="text-gray-300 text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-10 animate-fade-in-up delay-200 leading-relaxed">
                    Sampaikan aspirasi, saran, atau aduan Anda langsung kepada pengurus Masjid Jami Nailul Maram. Transparan, cepat, dan terukur.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up delay-400">
                    <a href="<?= base_url('aduan/buat') ?>" class="btn btn-gold text-base px-8 py-3.5">
                        <i class="fas fa-pen-to-square"></i> Sampaikan Aduan
                    </a>
                    <a href="<?= base_url('aduan/lacak') ?>" class="btn btn-outline text-base px-8 py-3.5">
                        <i class="fas fa-search"></i> Lacak Aduan
                    </a>
                </div>
            </div>
        </div>
        <!-- Wave divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" preserveAspectRatio="none" class="w-full h-10 sm:h-14"><path d="M0,30 C360,60 1080,0 1440,30 L1440,60 L0,60Z" fill="#f9fafb"/></svg>
        </div>
    </section>

    <!-- ===== CARA KERJA ===== -->
    <section class="py-24 md:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 md:mb-20">
                <h2 class="font-heading text-2xl md:text-3xl font-bold text-gray-900 mb-4">Bagaimana Cara Kerjanya?</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Empat langkah mudah untuk menyampaikan aduan Anda kepada pengurus masjid</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-4">
                <!-- Step 1 -->
                <div class="card step-card animate-fade-in-up">
                    <div class="step-number">01</div>
                    <h3 class="font-heading font-bold text-lg text-gray-900 mb-2">Tulis Aduan</h3>
                    <p class="text-gray-500 text-sm">Isi form aduan dengan detail masalah, saran, atau aspirasi Anda.</p>
                    <span class="step-connector hidden lg:block"><i class="fas fa-chevron-right"></i></span>
                </div>
                <!-- Step 2 -->
                <div class="card step-card animate-fade-in-up delay-200">
                    <div class="step-number">02</div>
                    <h3 class="font-heading font-bold text-lg text-gray-900 mb-2">Terima Tiket</h3>
                    <p class="text-gray-500 text-sm">Anda akan mendapatkan kode tiket unik untuk melacak status aduan.</p>
                    <span class="step-connector hidden lg:block"><i class="fas fa-chevron-right"></i></span>
                </div>
                <!-- Step 3 -->
                <div class="card step-card animate-fade-in-up delay-400">
                    <div class="step-number">03</div>
                    <h3 class="font-heading font-bold text-lg text-gray-900 mb-2">Diproses Pengurus</h3>
                    <p class="text-gray-500 text-sm">Pengurus terkait menerima notifikasi dan menindaklanjuti aduan Anda.</p>
                    <span class="step-connector hidden lg:block"><i class="fas fa-chevron-right"></i></span>
                </div>
                <!-- Step 4 -->
                <div class="card step-card animate-fade-in-up delay-600">
                    <div class="step-number">04</div>
                    <h3 class="font-heading font-bold text-lg text-gray-900 mb-2">Terima Jawaban</h3>
                    <p class="text-gray-500 text-sm">Anda dapat melihat respons dan tindakan pengurus melalui website.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATISTIK ===== -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card animate-fade-in-up">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-inbox text-emerald-700 text-lg"></i>
                    </div>
                    <div class="stat-number" data-count="125">0</div>
                    <div class="stat-label text-xs uppercase tracking-wider font-bold">Total Aduan Masuk</div>
                </div>
                <div class="stat-card animate-fade-in-up delay-200">
                    <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-check-circle text-green-600 text-lg"></i>
                    </div>
                    <div class="stat-number" data-count="98">0</div>
                    <div class="stat-label text-xs uppercase tracking-wider font-bold">Aduan Terselesaikan</div>
                </div>
                <div class="stat-card animate-fade-in-up delay-400">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-clock text-blue-600 text-lg"></i>
                    </div>
                    <div class="stat-number" data-count="2" data-suffix=" Hari">0</div>
                    <div class="stat-label text-xs uppercase tracking-wider font-bold">Rata-rata Respons</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TUJUAN ADUAN ===== -->
    <section class="py-24 md:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="font-heading text-2xl md:text-3xl font-bold text-gray-900 mb-4">Sampaikan ke Bidang yang Tepat</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Pilih bidang pengurus yang sesuai dengan aduan Anda agar langsung ditangani oleh pihak yang berkompeten</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <?php
                $bidang = [
                    ['icon' => 'fa-user-tie', 'label' => 'Ketua', 'sub' => 'Umum'],
                    ['icon' => 'fa-clipboard-list', 'label' => 'Sekretaris', 'sub' => 'Administrasi'],
                    ['icon' => 'fa-coins', 'label' => 'Bendahara', 'sub' => 'Keuangan'],
                    ['icon' => 'fa-mosque', 'label' => 'Ibadah & Dakwah', 'sub' => 'Kegiatan keagamaan'],
                    ['icon' => 'fa-building', 'label' => 'Pembangunan', 'sub' => 'Fisik & konstruksi'],
                    ['icon' => 'fa-tools', 'label' => 'Sarana & Prasarana', 'sub' => 'Fasilitas masjid'],
                    ['icon' => 'fa-broadcast-tower', 'label' => 'Humas & IT', 'sub' => 'Informasi publik'],
                    ['icon' => 'fa-book-open', 'label' => 'Pengawas LPQ', 'sub' => 'Pendidikan Quran'],
                    ['icon' => 'fa-users', 'label' => 'Remaja Masjid', 'sub' => 'Pembinaan pemuda'],
                    ['icon' => 'fa-book-reader', 'label' => 'Perpustakaan', 'sub' => 'Pojok baca digital'],
                    ['icon' => 'fa-hand-holding-dollar', 'label' => 'Dana', 'sub' => 'Donasi & infaq'],
                    ['icon' => 'fa-venus', 'label' => 'Muslimah', 'sub' => 'Kegiatan akhwat'],
                ];
                foreach ($bidang as $b):
                ?>
                <a href="<?= base_url('aduan/buat') ?>" class="card p-5 text-center group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:bg-emerald-100 transition">
                        <i class="fas <?= $b['icon'] ?> text-emerald-700"></i>
                    </div>
                    <h4 class="font-heading font-semibold text-sm text-gray-800"><?= $b['label'] ?></h4>
                    <p class="text-xs text-gray-400 mt-1"><?= $b['sub'] ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== CTA SECTION ===== -->
    <section class="py-24 md:py-32 bg-primary-900 bg-islamic-pattern relative overflow-hidden">
        <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-800 rounded-full opacity-20 blur-3xl"></div>
        <div class="relative max-w-3xl mx-auto px-4 text-center">
            <h2 class="font-heading text-2xl md:text-3xl font-bold text-white mb-4">Ada Keluhan atau Saran?</h2>
            <p class="text-gray-300 mb-8 text-base md:text-lg">Jangan ragu untuk menyampaikannya. Setiap aduan akan ditangani dengan serius oleh pengurus masjid.</p>
            <a href="<?= base_url('aduan/buat') ?>" class="btn btn-gold text-base px-10 py-4">
                <i class="fas fa-pen-to-square"></i> Sampaikan Sekarang
            </a>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra_css') ?>
<link rel="stylesheet" href="<?= base_url('css/aduan.css') ?>">
<style>
    /* Add fonts locally if needed, or assume they are in template.php */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&family=JetBrains+Mono:wght@600;700&display=swap');
    
    .aduan-scope {
        font-family: 'Inter', sans-serif;
    }
    .aduan-scope .font-heading {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
  initCounterAnimation();
});

function initCounterAnimation() {
  const counters = document.querySelectorAll('[data-count]');
  if (counters.length === 0) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  counters.forEach(counter => observer.observe(counter));
}

function animateCounter(el) {
  const target = parseInt(el.getAttribute('data-count'));
  const suffix = el.getAttribute('data-suffix') || '';
  const duration = 1500;
  const start = performance.now();

  function update(now) {
    const progress = Math.min((now - start) / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
    const current = Math.floor(eased * target);
    el.textContent = current + suffix;
    if (progress < 1) requestAnimationFrame(update);
    else el.textContent = target + suffix;
  }
  requestAnimationFrame(update);
}
</script>
<?= $this->endSection() ?>

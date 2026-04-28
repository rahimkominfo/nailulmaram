<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('extra_css') ?>
    <style>
        :root {
            --mosque-green: #064e3b;
            --mosque-gold: #fbbf24;
        }
        .text-mosque-green { color: var(--mosque-green); }
        .bg-mosque-green { background-color: var(--mosque-green); }
        .text-mosque-gold { color: var(--mosque-gold); }
        
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <header class="relative py-20 flex items-center justify-center bg-mosque-green text-white bg-pattern overflow-hidden">
        <div class="absolute inset-0 bg-black/30 z-0"></div> 
        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-mosque-gold/20 text-mosque-gold text-sm font-semibold tracking-wider mb-6 border border-mosque-gold/50">
                STRUKTUR ORGANISASI
            </span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight drop-shadow-lg">
                Pengurus <span class="text-mosque-gold">Masjid</span>
            </h1>
            <p class="text-lg text-gray-200 max-w-2xl mx-auto">
                <?= $profil['nama_masjid'] ?? 'Nailul Maram' ?>
            </p>
        </div>
    </header>

    <section class="py-20 bg-white min-h-[40vh] flex items-center justify-center">
        <div class="container mx-auto px-6 text-center">
            <div class="inline-block p-10 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                <i class="fa-solid fa-users-gear text-6xl text-slate-300 mb-6"></i>
                <h2 class="text-2xl font-bold text-slate-400 mb-2">Halaman Sedang Dikembangkan</h2>
                <p class="text-slate-400">Informasi mengenai pengurus masjid akan segera hadir di sini.</p>
                <div class="mt-8">
                    <a href="<?= base_url() ?>" class="inline-flex items-center px-6 py-3 bg-mosque-green text-white rounded-full font-bold hover:bg-emerald-900 transition">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>

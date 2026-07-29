<?php
// Helper untuk badge status
function getStatusBadge($status) {
    switch ($status) {
        case 'Masuk':
            return ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'dot' => 'bg-gray-400'];
        case 'Diproses':
            return ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'dot' => 'bg-blue-500'];
        case 'Diteruskan':
            return ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'dot' => 'bg-amber-500'];
        case 'Selesai':
            return ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'dot' => 'bg-emerald-500'];
        case 'Ditolak':
            return ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'dot' => 'bg-red-500'];
        default:
            return ['bg' => 'bg-gray-50', 'text' => 'text-gray-500', 'dot' => 'bg-gray-300'];
    }
}
$badge = getStatusBadge($aduan['status_aduan']);
?>
<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<div class="aduan-scope">
    <!-- BREADCRUMB -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="<?= base_url('aduan') ?>" class="hover:text-emerald-700 transition"><i class="fas fa-home text-xs"></i></a>
                <i class="fas fa-chevron-right text-[0.6rem] text-gray-300"></i>
                <a href="<?= base_url('aduan/lacak') ?>" class="hover:text-emerald-700 transition">Lacak Aduan</a>
                <i class="fas fa-chevron-right text-[0.6rem] text-gray-300"></i>
                <span class="text-gray-800 font-medium font-mono text-xs"><?= $aduan['kode_tiket'] ?></span>
            </nav>
        </div>
    </div>

    <!-- DETAIL CONTENT -->
    <section class="py-12 md:py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            <!-- Header Card -->
            <div class="card p-6 md:p-8 mb-8 bg-white shadow-sm border border-gray-100 rounded-2xl animate-fade-in-up">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                    <div>
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Kode Tiket</p>
                        <h1 class="font-mono text-2xl font-bold text-emerald-900 tracking-wider"><?= $aduan['kode_tiket'] ?></h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 <?= $badge['bg'] ?> <?= $badge['text'] ?> rounded-full text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 <?= $badge['dot'] ?> rounded-full <?= $aduan['status_aduan'] === 'Diproses' ? 'animate-pulse' : '' ?>"></span>
                            <?= $aduan['status_aduan'] ?>
                        </span>
                        <button onclick="copyTicketCode('<?= $aduan['kode_tiket'] ?>')" class="p-2.5 text-emerald-700 border border-emerald-100 rounded-xl hover:bg-emerald-50 transition" title="Salin Kode">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Detail Aduan -->
            <div class="card p-6 md:p-10 mb-8 bg-white shadow-sm border border-gray-100 rounded-2xl animate-fade-in-up delay-200">
                <h2 class="font-heading font-black text-lg text-gray-900 mb-8 flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                        <i class="fas fa-file-alt text-emerald-600"></i>
                    </div>
                    Detail Aduan
                </h2>
                <div class="space-y-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Tujuan</p>
                            <p class="text-sm font-bold text-gray-800 flex items-center gap-2">
                                <span class="material-symbols-outlined text-emerald-500 text-lg">
                                    <?= $aduan['ikon'] ?: 'help_outline' ?>
                                </span>
                                <?= $aduan['nama_aduan_tujuan'] ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Pengirim</p>
                            <p class="text-sm font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-user-circle text-emerald-500"></i>
                                <?= $aduan['nama_pengirim'] ?>
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Waktu Kirim</p>
                            <p class="text-sm font-bold text-gray-700">
                                <?= date('d M Y, H:i', strtotime($aduan['waktu_dibuat'])) ?> WITA
                            </p>
                        </div>
                    </div>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Subjek</p>
                        <p class="text-lg font-bold text-gray-900"><?= $aduan['judul_aduan'] ?></p>
                    </div>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Isi Aduan</p>
                        <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            <?= nl2br(esc($aduan['isi_aduan'])) ?>
                        </p>
                    </div>
                    <?php if ($aduan['lampiran_file']): ?>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-3">Lampiran</p>
                        <a href="<?= base_url('uploads/aduan/' . $aduan['lampiran_file']) ?>" target="_blank" class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-100 w-fit hover:border-emerald-200 transition group cursor-pointer">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                <img src="<?= base_url('uploads/aduan/' . $aduan['lampiran_file']) ?>" alt="Lampiran Aduan <?= esc($aduan['judul_aduan']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <i class="fas fa-image text-gray-300 text-2xl hidden"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-700"><?= $aduan['lampiran_file'] ?></p>
                                <p class="text-[11px] text-gray-400 uppercase tracking-wider">Klik untuk melihat</p>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Respons Pengurus -->
            <div class="card p-6 md:p-10 bg-white shadow-sm border border-gray-100 rounded-2xl animate-fade-in-up delay-300">
                <h2 class="font-heading font-black text-lg text-gray-900 mb-8 flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                        <i class="fas fa-reply text-emerald-600"></i>
                    </div>
                    Respons Pengurus
                </h2>
                
                <?php if ($aduan['tanggapan_pengurus']): ?>
                    <div class="p-8 bg-emerald-50 rounded-2xl border border-emerald-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-tie text-white text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-emerald-900"><?= $aduan['nama_pengurus'] ?: 'Pengurus Masjid' ?></p>
                                <p class="text-[10px] text-emerald-600 uppercase font-bold tracking-wider">Tanggapan Resmi</p>
                            </div>
                        </div>
                        <div class="text-sm text-emerald-800 leading-relaxed">
                            <?= nl2br(esc($aduan['tanggapan_pengurus'])) ?>
                        </div>
                        <p class="text-[10px] text-emerald-400 mt-6 text-right uppercase font-bold tracking-widest">
                            DIPERBARUI PADA <?= date('d M Y, H:i', strtotime($aduan['waktu_diperbarui'])) ?> WITA
                        </p>
                    </div>
                <?php else: ?>
                    <div class="p-8 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 text-center">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                            <i class="fas fa-hourglass-half text-gray-300 text-xl animate-pulse"></i>
                        </div>
                        <p class="text-sm text-gray-600 font-bold mb-1">Belum ada respons resmi</p>
                        <p class="text-xs text-gray-400 leading-relaxed">Pengurus sedang menindaklanjuti aduan Anda. Jawaban akan muncul di sini setelah proses penanganan selesai.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Back -->
            <div class="mt-12 text-center">
                <a href="<?= base_url('aduan/lacak') ?>" class="inline-flex items-center gap-2 text-sm text-emerald-700 font-bold hover:gap-3 transition-all">
                    <i class="fas fa-arrow-left text-xs"></i> Lacak aduan lain
                </a>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra_css') ?>
<link rel="stylesheet" href="<?= base_url('css/aduan.css') ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap');
    .aduan-scope { font-family: 'Inter', sans-serif; }
    .aduan-scope .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
function copyTicketCode(text) {
  navigator.clipboard.writeText(text).then(() => {
    alert('Kode tiket berhasil disalin!');
  });
}
</script>
<?= $this->endSection() ?>

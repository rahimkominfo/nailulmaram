<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<div class="aduan-scope">
    <!-- SUCCESS CONTENT -->
    <section class="min-h-[75vh] flex items-center justify-center py-16 md:py-24 bg-gray-50">
        <div class="max-w-lg mx-auto px-4 text-center">
            <div class="card p-8 md:p-12 bg-white shadow-sm border border-gray-100 rounded-2xl">
                <!-- Success Icon -->
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-8 animate-success-check">
                    <i class="fas fa-check-circle text-4xl text-emerald-600"></i>
                </div>

                <h1 class="font-heading text-2xl md:text-3xl font-bold text-gray-900 mb-4 animate-fade-in-up">
                    Aduan Berhasil Dikirim!
                </h1>
                <p class="text-gray-500 mb-10 animate-fade-in-up delay-100">
                    Terima kasih atas aduan Anda. Pengurus masjid akan segera menindaklanjutinya. Simpan kode tiket berikut untuk melacak status aduan Anda.
                </p>

                <!-- Ticket Code -->
                <?php $kode_tiket = session()->getFlashdata('kode_tiket') ?: 'UNKNOWN'; ?>
                <div class="animate-fade-in-up delay-200">
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-3">Kode Tiket Anda</p>
                    <div class="flex items-center justify-center gap-3 bg-emerald-50 border-2 border-dashed border-emerald-200 py-4 px-6 rounded-xl w-fit mx-auto">
                        <span class="font-mono text-xl font-bold text-emerald-900 tracking-wider" id="ticketCode"><?= $kode_tiket ?></span>
                        <button onclick="copyTicketCode('<?= $kode_tiket ?>')" aria-label="Salin Kode Tiket" class="text-emerald-600 hover:text-emerald-800 transition p-2" title="Salin kode">
                            <i class="fas fa-copy text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- Info Note -->
                <div class="mt-10 p-5 bg-amber-50 border border-amber-100 rounded-xl text-left animate-fade-in-up delay-300">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-lightbulb text-amber-600"></i>
                        </div>
                        <div class="text-sm">
                            <p class="font-bold text-amber-900 mb-1 text-base">Simpan Kode Tiket!</p>
                            <p class="text-amber-700 leading-relaxed">Anda membutuhkan kode ini untuk melacak status aduan kapan saja melalui halaman <strong>Lacak Aduan</strong>.</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up delay-400">
                    <a href="<?= base_url('aduan/lacak') ?>" class="w-full sm:w-auto bg-emerald-700 text-white font-bold px-8 py-4 rounded-xl hover:bg-emerald-800 transition flex items-center justify-center gap-2 shadow-lg shadow-emerald-900/10">
                        <i class="fas fa-search"></i> Lacak Aduan
                    </a>
                    <a href="<?= base_url('aduan/buat') ?>" class="w-full sm:w-auto bg-white text-emerald-700 border-2 border-emerald-700 font-bold px-8 py-4 rounded-xl hover:bg-emerald-50 transition flex items-center justify-center gap-2">
                        <i class="fas fa-pen-to-square"></i> Kirim Lagi
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra_css') ?>
<link rel="stylesheet" href="<?= base_url('css/aduan.css') ?>">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&family=JetBrains+Mono:wght@600;700&display=swap');
    
    .aduan-scope { font-family: 'Inter', sans-serif; }
    .aduan-scope .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }

    @keyframes successCheck {
        0% { transform: scale(0) rotate(-45deg); opacity: 0; }
        50% { transform: scale(1.15) rotate(0); }
        100% { transform: scale(1) rotate(0); opacity: 1; }
    }
    .animate-success-check { animation: successCheck 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) both; }
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
function copyTicketCode(text) {
  navigator.clipboard.writeText(text).then(() => {
    alert('Kode tiket berhasil disalin ke clipboard!');
  }).catch(() => {
    // Fallback
    const input = document.createElement('input');
    input.value = text;
    document.body.appendChild(input);
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);
    alert('Kode tiket berhasil disalin!');
  });
}
</script>
<?= $this->endSection() ?>

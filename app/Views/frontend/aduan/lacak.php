<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<div class="aduan-scope">
    <!-- BREADCRUMB -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="<?= base_url('aduan') ?>" class="hover:text-emerald-700 transition"><i class="fas fa-home text-xs"></i></a>
                <i class="fas fa-chevron-right text-[0.6rem] text-gray-300"></i>
                <span class="text-gray-800 font-medium">Lacak Aduan</span>
            </nav>
        </div>
    </div>

    <!-- TRACKING FORM -->
    <section class="min-h-[65vh] flex items-center justify-center py-16 md:py-24 bg-gray-50">
        <div class="max-w-lg mx-auto px-4 w-full">
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                    <i class="fas fa-search text-3xl text-emerald-700"></i>
                </div>
                <h1 class="font-heading text-2xl md:text-3xl font-black text-gray-900 mb-3">Lacak Status Aduan</h1>
                <p class="text-gray-500 text-sm md:text-base leading-relaxed">Masukkan kode tiket unik yang Anda terima melalui sistem saat mengirimkan aduan sebelumnya.</p>
            </div>

            <div class="card p-8 md:p-10 bg-white shadow-sm border border-gray-100 rounded-2xl">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-700 text-sm rounded-xl flex items-center gap-3">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form onsubmit="handleLacakAduan(event)">
                    <div class="mb-6">
                        <label class="block text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-3">Kode Tiket <span class="text-red-500">*</span></label>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <input type="text" id="ticketInput" class="flex-1 px-5 py-4 border-2 border-gray-100 rounded-xl focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition font-mono font-bold text-emerald-900 tracking-wider placeholder:text-gray-300 placeholder:font-sans placeholder:font-normal" placeholder="ADU-XXXXXXXX-XXX" required>
                            <button type="submit" class="bg-emerald-700 text-white font-bold px-8 py-4 rounded-xl hover:bg-emerald-800 transition shadow-lg shadow-emerald-900/10 flex items-center justify-center gap-2">
                                <i class="fas fa-search"></i> Lacak
                            </button>
                        </div>
                        <p class="text-[11px] text-gray-400 mt-4 italic font-medium"><i class="fas fa-info-circle mr-1"></i> Format kode tiket: ADU (tahun)(bulan)(tanggal)-(nomor)</p>
                    </div>
                </form>
            </div>

            <!-- Help Card -->
            <div class="mt-8 p-6 bg-blue-50 border border-blue-100 rounded-2xl animate-fade-in-up">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center shrink-0">
                        <i class="fas fa-question-circle text-blue-600"></i>
                    </div>
                    <div class="text-sm">
                        <p class="font-bold text-blue-900 mb-1">Kehilangan kode tiket?</p>
                        <p class="text-blue-700 leading-relaxed">Jika Anda lupa atau kehilangan kode tiket, silakan hubungi Admin melalui WhatsApp masjid atau buat aduan baru <a href="<?= base_url('aduan/buat') ?>" class="font-bold underline hover:no-underline">di sini</a>.</p>
                    </div>
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
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
function handleLacakAduan(e) {
  e.preventDefault();
  const input = document.getElementById('ticketInput');
  if (!input || !input.value.trim()) {
    alert('Silakan masukkan kode tiket Anda.');
    return;
  }
  
  // Simulasi loading
  const btn = e.target.querySelector('button');
  const originalText = btn.innerHTML;
  btn.disabled = true;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';

  setTimeout(() => {
    // Pengalihan ke halaman detail (saat ini statis ke contoh detail)
    window.location.href = '<?= base_url('aduan/detail') ?>?ticket=' + encodeURIComponent(input.value.trim());
  }, 1000);
}
</script>
<?= $this->endSection() ?>

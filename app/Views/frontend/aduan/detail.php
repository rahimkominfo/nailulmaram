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
                <span class="text-gray-800 font-medium font-mono text-xs">ADU-20260506-001</span>
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
                        <h1 class="font-mono text-2xl font-bold text-emerald-900 tracking-wider">ADU-20260506-001</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                            Diproses
                        </span>
                        <button onclick="copyTicketCode('ADU-20260506-001')" class="p-2.5 text-emerald-700 border border-emerald-100 rounded-xl hover:bg-emerald-50 transition" title="Salin Kode">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="card p-6 md:p-10 mb-8 bg-white shadow-sm border border-gray-100 rounded-2xl animate-fade-in-up delay-100">
                <h2 class="font-heading font-black text-lg text-gray-900 mb-8 flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                        <i class="fas fa-list text-emerald-600"></i>
                    </div>
                    Timeline Status
                </h2>
                <div class="timeline space-y-8 relative before:content-[''] before:absolute before:left-[19px] before:top-2 before:bottom-2 before:w-0.5 before:bg-gray-100">
                    <div class="relative pl-12 animate-fade-in-left delay-200">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-white border-4 border-emerald-500 rounded-full z-10 flex items-center justify-center">
                            <i class="fas fa-check text-[10px] text-emerald-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Aduan diterima</p>
                            <p class="text-[11px] text-gray-400 mt-1 uppercase tracking-wider"><i class="far fa-clock mr-1.5"></i>06 Mei 2026, 10:00 WITA</p>
                        </div>
                    </div>
                    <div class="relative pl-12 animate-fade-in-left delay-300">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-white border-4 border-emerald-500 rounded-full z-10 flex items-center justify-center">
                            <i class="fas fa-check text-[10px] text-emerald-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Dibaca oleh Bidang Sarana & Prasarana</p>
                            <p class="text-[11px] text-gray-400 mt-1 uppercase tracking-wider"><i class="far fa-clock mr-1.5"></i>06 Mei 2026, 14:30 WITA</p>
                        </div>
                    </div>
                    <div class="relative pl-12 animate-fade-in-left delay-400">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-blue-500 border-4 border-blue-100 rounded-full z-10 shadow-[0_0_0_4px_rgba(59,130,246,0.1)]"></div>
                        <div>
                            <p class="text-sm font-bold text-blue-700">Sedang diproses</p>
                            <p class="text-[11px] text-gray-400 mt-1 uppercase tracking-wider"><i class="far fa-clock mr-1.5"></i>06 Mei 2026, 15:00 WITA</p>
                            <p class="text-sm text-gray-500 mt-2 leading-relaxed">Pengurus sedang menindaklanjuti laporan Anda di lokasi.</p>
                        </div>
                    </div>
                    <div class="relative pl-12 animate-fade-in-left delay-500">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-gray-50 border-4 border-white rounded-full z-10"></div>
                        <div>
                            <p class="text-sm font-bold text-gray-300">Menunggu penyelesaian...</p>
                        </div>
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
                                <i class="fas fa-wrench text-emerald-500"></i>
                                Bidang Sarana & Prasarana
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Pengirim</p>
                            <p class="text-sm font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-user-circle text-emerald-500"></i>
                                Ahmad Fauzi
                            </p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Waktu Kirim</p>
                            <p class="text-sm font-bold text-gray-700">06 Mei 2026, 10:00 WITA</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Visibilitas</p>
                            <p class="text-sm font-bold text-gray-700 flex items-center gap-2">
                                <i class="fas fa-lock text-gray-300"></i>
                                Privat
                            </p>
                        </div>
                    </div>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Subjek</p>
                        <p class="text-lg font-bold text-gray-900">Keran air wudhu rusak di sisi kanan</p>
                    </div>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-2">Isi Aduan</p>
                        <p class="text-sm text-gray-700 leading-relaxed bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            Assalamu'alaikum. Saya ingin melaporkan bahwa keran air wudhu di sisi kanan masjid (keran nomor 3 dan 4 dari pintu masuk) sudah rusak sejak kurang lebih 2 minggu yang lalu. Air terus menetes meskipun keran sudah ditutup. Hal ini menyebabkan pemborosan air dan lantai menjadi licin. Mohon untuk segera diperbaiki. Terima kasih atas perhatiannya.
                        </p>
                    </div>
                    <div class="pt-8 border-t border-gray-50">
                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.2em] mb-3">Lampiran</p>
                        <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-100 w-fit hover:border-emerald-200 transition group cursor-pointer">
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                <i class="fas fa-image text-gray-300 text-2xl group-hover:scale-110 transition"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">foto_keran_rusak.jpg</p>
                                <p class="text-[11px] text-gray-400 uppercase tracking-wider">245 KB • JPG</p>
                            </div>
                        </div>
                    </div>
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
                <div class="p-8 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 text-center">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-hourglass-half text-gray-300 text-xl animate-pulse"></i>
                    </div>
                    <p class="text-sm text-gray-600 font-bold mb-1">Belum ada respons resmi</p>
                    <p class="text-xs text-gray-400 leading-relaxed">Pengurus sedang menindaklanjuti aduan Anda. Jawaban akan muncul di sini setelah proses penanganan selesai.</p>
                </div>
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

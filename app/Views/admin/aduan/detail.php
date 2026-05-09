<?= $this->extend('admin/layout/template') ?>

<?= $this->section('styles') ?>
<style>
    /* Custom styles for Aduan Detail */
    :root {
        --primary-900: #064E3B;
        --primary-700: #047857;
        --primary-500: #10B981;
        --primary-100: #D1FAE5;
        --primary-50: #ECFDF5;
    }

    .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .form-select, .form-textarea {
        width: 100%;
        padding: 0.625rem 1rem;
        border: 1.5px solid #D1D5DB;
        border-radius: 0.5rem;
        background: #fff;
        color: #111827;
        font-size: 0.875rem;
        transition: all 0.3s;
    }
    .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--primary-500);
        box-shadow: 0 0 0 3px rgba(16,185,129,0.15);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.625rem 1.25rem;
        border-radius: 0.625rem;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s;
    }
    .btn-sm { padding: 0.5rem 1rem; font-size: 0.75rem; }
    
    .btn-primary {
        background: var(--primary-700);
        color: #fff;
    }
    .btn-primary:hover {
        background: var(--primary-900);
        transform: translateY(-1px);
    }

    .btn-outline {
        background: transparent;
        color: var(--primary-700);
        border: 2px solid var(--primary-700);
    }
    .btn-outline:hover {
        background: var(--primary-700);
        color: #fff;
        transform: translateY(-1px);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 0.5s ease-out both; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="animate-fade-in max-w-4xl mx-auto">
    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900"><i class="fas fa-times"></i></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900"><i class="fas fa-times"></i></button>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider font-medium mb-1">Kode Tiket</p>
                <h1 class="font-mono text-xl font-bold text-green-900 tracking-wider"><?= $aduan['kode_tiket'] ?></h1>
            </div>
            <div class="flex items-center gap-3">
                <label class="text-xs font-semibold text-gray-500 uppercase">Status Saat Ini:</label>
                <?php 
                $statusIcons = [
                    'Menunggu' => '⏳',
                    'Diproses' => '🔄',
                    'Diteruskan' => '↗️',
                    'Selesai' => '✅',
                    'Ditolak' => '❌'
                ];
                ?>
                <span class="px-4 py-1.5 bg-gray-100 rounded-full text-sm font-bold text-gray-700">
                    <?= $statusIcons[$aduan['status_aduan']] ?? '' ?> <?= $aduan['status_aduan'] ?>
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <!-- Left Column (3/5) -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Pengirim Info -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="font-heading font-bold text-sm text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-user text-green-600"></i> Informasi Pengirim
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Nama</p>
                        <p class="text-sm font-semibold text-gray-800"><?= $aduan['nama_pengirim'] ?? '<span class="italic text-gray-400">Anonim</span>' ?></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Kontak</p>
                        <p class="text-sm font-semibold text-gray-800">
                            <?php if ($aduan['kontak_pengirim']): ?>
                                <i class="fab fa-whatsapp text-green-500 mr-1"></i><?= $aduan['kontak_pengirim'] ?>
                            <?php else: ?>
                                <span class="text-gray-400">-</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Waktu Kirim</p>
                        <p class="text-sm text-gray-700"><?= date('d M Y, H:i', strtotime($aduan['waktu_dibuat'])) ?> WITA</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-0.5">Tujuan</p>
                        <p class="text-sm font-semibold text-gray-800">
                            <i class="fas fa-wrench text-green-600 mr-1"></i><?= $aduan['nama_aduan_tujuan'] ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Isi Aduan -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="font-heading font-bold text-sm text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-file-lines text-green-600"></i> Isi Aduan
                </h2>
                <div class="mb-3">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Subjek</p>
                    <p class="text-base font-semibold text-gray-900"><?= $aduan['judul_aduan'] ?></p>
                </div>
                <div class="mb-4">
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Pesan</p>
                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 text-sm text-gray-700 leading-relaxed">
                        <?= nl2br(esc($aduan['isi_aduan'])) ?>
                    </div>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Lampiran</p>
                    <?php if ($aduan['lampiran_file']): ?>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100 w-fit">
                        <div class="w-14 h-14 bg-gray-200 rounded-lg flex items-center justify-center"><i class="fas fa-image text-gray-400"></i></div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700"><?= $aduan['lampiran_file'] ?></p>
                            <p class="text-xs text-gray-400">File Lampiran</p>
                        </div>
                        <a href="<?= base_url('uploads/aduan/' . $aduan['lampiran_file']) ?>" target="_blank" class="text-green-700 hover:text-green-900 text-sm ml-2"><i class="fas fa-download"></i></a>
                    </div>
                    <?php else: ?>
                        <p class="text-sm text-gray-400 italic">Tidak ada lampiran</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right Column (2/5) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Catatan Internal -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="font-heading font-bold text-sm text-gray-900 mb-3 flex items-center gap-2">
                    <i class="fas fa-lock text-amber-500"></i> Catatan Internal (Fitur Mendatang)
                </h2>
                <p class="text-xs text-gray-400 mb-3">Hanya terlihat oleh sesama pengurus.</p>
                <textarea class="form-textarea text-sm" rows="3" placeholder="Tulis catatan internal..." readonly></textarea>
                <button type="button" class="btn btn-sm btn-outline mt-3 w-full opacity-50 cursor-not-allowed" disabled>
                    <i class="fas fa-save"></i> Simpan Catatan
                </button>
            </div>

            <!-- Teruskan -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h2 class="font-heading font-bold text-sm text-gray-900 mb-3 flex items-center gap-2">
                    <i class="fas fa-share text-violet-500"></i> Teruskan ke Bidang Lain
                </h2>
                <form action="<?= base_url('admin/aduan/forward') ?>" method="POST" id="forwardForm">
                    <?= csrf_field() ?>
                    <input type="hidden" name="aduan_id" value="<?= $aduan['aduan_id'] ?>">
                    <select name="aduan_tujuan_id" class="form-select text-sm mb-3" required>
                        <option disabled selected value="">Pilih bidang tujuan...</option>
                        <?php foreach ($tujuan_list as $t): ?>
                            <option value="<?= $t['aduan_tujuan_id'] ?>" <?= $t['aduan_tujuan_id'] == $aduan['aduan_tujuan_id'] ? 'disabled' : '' ?>>
                                <?= $t['nama_aduan_tujuan'] ?> (<?= $t['nama_pengurus'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-sm w-full bg-violet-600 text-white hover:bg-violet-700">
                        <i class="fas fa-share"></i> Teruskan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Respons Section (full width) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mt-6">
        <h2 class="font-heading font-bold text-sm text-gray-900 mb-4 flex items-center gap-2">
            <i class="fas fa-reply text-green-600"></i> Respons untuk Jamaah
        </h2>
        <p class="text-xs text-gray-400 mb-3">Jawaban ini akan terlihat oleh jamaah saat mereka melacak aduan.</p>
        
        <form action="<?= base_url('admin/aduan/update-response') ?>" method="POST" id="responseForm">
            <?= csrf_field() ?>
            <input type="hidden" name="aduan_id" value="<?= $aduan['aduan_id'] ?>">
            
            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">Ubah Status Menjadi:</label>
                <select class="form-select py-2 text-sm font-semibold w-full sm:w-64 rounded-lg" name="status_aduan" id="statusSelect">
                    <option value="Menunggu" <?= $aduan['status_aduan'] == 'Menunggu' ? 'selected' : '' ?>>⏳ Menunggu</option>
                    <option value="Diproses" <?= $aduan['status_aduan'] == 'Diproses' ? 'selected' : '' ?>>🔄 Diproses</option>
                    <option value="Diteruskan" <?= $aduan['status_aduan'] == 'Diteruskan' ? 'selected' : '' ?>>↗️ Diteruskan</option>
                    <option value="Selesai" <?= $aduan['status_aduan'] == 'Selesai' ? 'selected' : '' ?>>✅ Selesai</option>
                    <option value="Ditolak" <?= $aduan['status_aduan'] == 'Ditolak' ? 'selected' : '' ?>>❌ Ditolak</option>
                </select>
            </div>

            <textarea name="tanggapan_pengurus" id="tanggapanInput" class="form-textarea text-sm" rows="4" placeholder="Tulis respons atau jawaban untuk jamaah..." required><?= $aduan['tanggapan_pengurus'] ?></textarea>
            
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary flex-1" id="submitBtn">
                    <i class="fas fa-paper-plane"></i> Kirim Respons & Selesaikan
                </button>
                <a href="<?= base_url('admin/aduan') ?>" class="btn btn-outline text-center">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('statusSelect');
        const tanggapanInput = document.getElementById('tanggapanInput');
        const submitBtn = document.getElementById('submitBtn');

        // Logic to automatically change status to 'Selesai' when writing response if still 'Menunggu'
        tanggapanInput.addEventListener('input', function() {
            if (this.value.trim().length > 10 && statusSelect.value === 'Menunggu') {
                statusSelect.value = 'Selesai';
                // Trigger animation/feedback
                statusSelect.classList.add('ring-2', 'ring-green-500');
                setTimeout(() => statusSelect.classList.remove('ring-2', 'ring-green-500'), 1000);
            }
        });

        // Simple confirmation before submit
        const responseForm = document.getElementById('responseForm');
        responseForm.addEventListener('submit', function(e) {
            const status = statusSelect.value;
            if (status === 'Selesai' && tanggapanInput.value.trim() === '') {
                e.preventDefault();
                alert('Mohon berikan respons sebelum menyelesaikan aduan.');
                tanggapanInput.focus();
                return;
            }
            
            submitBtn.innerHTML = '<i class="fas fa-spinner animate-spin"></i> Memproses...';
            submitBtn.disabled = true;
        });

        // Forward form confirmation
        const forwardForm = document.getElementById('forwardForm');
        forwardForm.addEventListener('submit', function(e) {
            const select = this.querySelector('select');
            const selectedText = select.options[select.selectedIndex].text;
            
            if (!confirm(`Apakah Anda yakin ingin meneruskan aduan ini ke bidang: ${selectedText}?`)) {
                e.preventDefault();
            } else {
                const btn = this.querySelector('button[type="submit"]');
                btn.innerHTML = '<i class="fas fa-spinner animate-spin"></i> Meneruskan...';
                btn.disabled = true;
            }
        });
    });
</script>
<?= $this->endSection() ?>

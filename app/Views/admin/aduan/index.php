<?= $this->extend('admin/layout/template') ?>

<?= $this->section('styles') ?>
<style>
    /* Custom styles for Aduan module extracted from aduan assets */
    :root {
        --primary-900: #064E3B;
        --primary-700: #047857;
        --primary-500: #10B981;
        --primary-100: #D1FAE5;
        --primary-50: #ECFDF5;
        --status-pending: #F59E0B;
        --status-process: #3B82F6;
        --status-forward: #8B5CF6;
        --status-resolved: #10B981;
        --status-rejected: #EF4444;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.02em;
    }
    .badge-pending { background: #FEF3C7; color: #92400E; }
    .badge-process { background: #DBEAFE; color: #1E40AF; }
    .badge-forward { background: #EDE9FE; color: #5B21B6; }
    .badge-resolved { background: #D1FAE5; color: #065F46; }
    .badge-rejected { background: #FEE2E2; color: #991B1B; }
    .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        display: inline-block;
    }
    .badge-pending .badge-dot   { background: var(--status-pending); }
    .badge-process .badge-dot   { background: var(--status-process); }
    .badge-forward .badge-dot   { background: var(--status-forward); }
    .badge-resolved .badge-dot  { background: var(--status-resolved); }
    .badge-rejected .badge-dot  { background: var(--status-rejected); }

    .data-table { width: 100%; border-collapse: separate; border-spacing: 0; }
    .data-table th {
        text-align: left;
        padding: 0.75rem 1rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6B7280;
        background: #F9FAFB;
        border-bottom: 1px solid #E5E7EB;
    }
    .data-table td {
        padding: 0.875rem 1rem;
        font-size: 0.875rem;
        color: #374151;
        border-bottom: 1px solid #F3F4F6;
        vertical-align: middle;
    }
    .data-table tr:hover td { background: #F9FAFB; }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        white-space: nowrap;
        background: transparent;
        color: var(--primary-700);
        border: 2px solid var(--primary-700);
        padding: 0.25rem 0.6rem;
        font-size: 0.7rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-outline:hover {
        background: var(--primary-700);
        color: #fff;
    }

    .form-input, .form-select {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1.5px solid #D1D5DB;
        border-radius: 0.5rem;
        background: #fff;
        color: #111827;
        font-size: 0.875rem;
    }
    .form-input:focus, .form-select:focus {
        outline: none;
        border-color: var(--primary-500);
        box-shadow: 0 0 0 3px rgba(16,185,129,0.15);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    .animate-fade-in { animation: fadeIn 0.5s ease-out both; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="animate-fade-in">
    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <div class="flex items-center gap-2 flex-1">
                <div class="relative flex-1">
                    <!-- <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i> -->
                    <input type="text" class="form-input pl-9" placeholder="Cari tiket, subjek, atau pengirim...">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <select class="form-select w-auto">
                    <option>Semua Status</option>
                    <option>Menunggu</option>
                    <option>Diproses</option>
                    <option>Diteruskan</option>
                    <option>Selesai</option>
                    <option>Ditolak</option>
                </select>
                <select class="form-select w-auto">
                    <option>Semua Bidang</option>
                    <?php foreach ($tujuan_list as $t): ?>
                        <option value="<?= $t['aduan_tujuan_id'] ?>"><?= $t['nama_aduan_tujuan'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="w-10"><input type="checkbox" class="w-4 h-4 rounded"></th>
                        <th>Tiket</th>
                        <th>Pengirim</th>
                        <th>Subjek</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($aduan)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-10 text-gray-500">Tidak ada data aduan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($aduan as $item): ?>
                        <tr>
                            <td><input type="checkbox" class="w-4 h-4 rounded"></td>
                            <td class="font-mono text-xs font-semibold text-green-700"><?= $item['kode_tiket'] ?></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-green-100 rounded-full flex items-center justify-center text-green-700 text-[0.6rem] font-bold">
                                        <?= $item['nama_pengirim'] ? strtoupper(substr($item['nama_pengirim'], 0, 2)) : 'AN' ?>
                                    </div>
                                    <span class="text-sm <?= !$item['nama_pengirim'] ? 'italic text-gray-400' : '' ?>">
                                        <?= $item['nama_pengirim'] ?? 'Anonim' ?>
                                    </span>
                                </div>
                            </td>
                            <td class="font-medium text-sm"><?= $item['judul_aduan'] ?></td>
                            <td class="text-xs text-gray-500"><?= $item['nama_aduan_tujuan'] ?></td>
                            <td>
                                <?php 
                                $statusClass = [
                                    'Menunggu' => 'badge-pending',
                                    'Diproses' => 'badge-process',
                                    'Diteruskan' => 'badge-forward',
                                    'Selesai' => 'badge-resolved',
                                    'Ditolak' => 'badge-rejected'
                                ];
                                $badgeClass = $statusClass[$item['status_aduan']] ?? 'badge-pending';
                                ?>
                                <span class="badge <?= $badgeClass ?>"><span class="badge-dot"></span><?= $item['status_aduan'] ?></span>
                            </td>
                            <td class="text-xs text-gray-400"><?= date('d M Y', strtotime($item['waktu_dibuat'])) ?></td>
                            <td><a href="<?= base_url('admin/aduan/detail/' . $item['aduan_id']) ?>" class="btn-outline"><i class="fas fa-eye"></i> Lihat</a></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="flex items-center justify-between px-5 py-4 border-t border-gray-100">
            <p class="text-xs text-gray-500">Menampilkan 1-6 dari 17 aduan</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs hover:bg-gray-50"><i class="fas fa-chevron-left"></i></button>
                <button class="w-8 h-8 rounded-lg bg-green-700 text-white flex items-center justify-center text-xs font-bold">1</button>
                <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 text-xs hover:bg-gray-50 font-medium">2</button>
                <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 text-xs hover:bg-gray-50 font-medium">3</button>
                <button class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs hover:bg-gray-50"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

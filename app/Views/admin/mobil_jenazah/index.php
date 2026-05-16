<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-1">Layanan Mobil Jenazah</h2>
            <p class="text-gray-500 text-sm font-bold uppercase tracking-widest">Kelola riwayat dan laporan penggunaan mobil jenazah.</p>
        </div>
        <a href="<?= base_url('admin/mobil-jenazah/tambah') ?>" class="inline-flex items-center px-6 py-4 bg-green-600 hover:bg-green-700 text-white font-black rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest text-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Layanan
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl font-bold text-sm uppercase tracking-widest">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl font-bold text-sm uppercase tracking-widest">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-[10px] md:text-sm">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Tanggal</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Layanan & Almarhum</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Rute</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Status</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($layanan)): ?>
                        <tr>
                            <td colspan="5" class="px-8 py-10 text-center text-gray-400 font-bold italic text-base">Belum ada data layanan mobil jenazah.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($layanan as $l): ?>
                            <tr class="hover:bg-gray-50 transition border-b border-gray-50">
                                <td class="px-8 py-5 font-black text-gray-500">
                                    <?= date('d/m/Y', strtotime($l['tanggal'])) ?>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="font-black text-gray-800 uppercase tracking-tighter"><?= $l['jenis_layanan'] ?></div>
                                    <div class="text-[10px] text-gray-400 font-bold italic uppercase tracking-widest"><?= $l['nama_almarhum'] ?: '-' ?></div>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Ke: <?= $l['lokasi_tujuan'] ?></div>
                                    <div class="text-[9px] text-gray-400 italic">Dari: <?= $l['lokasi_penjemputan'] ?: '-' ?></div>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <?php 
                                        $statusClass = 'bg-gray-50 text-gray-600 ring-gray-100';
                                        if($l['status'] === 'published') $statusClass = 'bg-green-50 text-green-600 ring-green-100';
                                        if($l['status'] === 'archived') $statusClass = 'bg-red-50 text-red-600 ring-red-100';
                                    ?>
                                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest ring-1 <?= $statusClass ?>">
                                        <?= strtoupper($l['status']) ?>
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="<?= base_url('admin/mobil-jenazah/edit/'.$l['id']) ?>" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/mobil-jenazah/delete/'.$l['id']) ?>" onclick="return confirm('Hapus data ini?')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>

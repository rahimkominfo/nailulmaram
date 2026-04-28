<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-1">Manajemen Flayer</h2>
            <p class="text-gray-500 text-sm font-bold uppercase tracking-widest">Kelola flayer promosi atau pengumuman di halaman depan.</p>
        </div>
        <a href="<?= base_url('admin/flayer/tambah') ?>" class="inline-flex items-center px-6 py-4 bg-green-600 hover:bg-green-700 text-white font-black rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest text-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Flayer
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto text-[10px] md:text-sm">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Urutan</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Gambar</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Info Flayer</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Status</th>
                        <th class="px-8 py-5 font-black text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($flayers)): ?>
                        <tr>
                            <td colspan="5" class="px-8 py-10 text-center text-gray-400 font-bold italic text-base">Belum ada data flayer.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($flayers as $f): ?>
                            <tr class="hover:bg-gray-50 transition border-b border-gray-50">
                                <td class="px-8 py-5 font-black text-gray-500 text-center md:text-left">
                                    <span class="bg-gray-100 px-3 py-1 rounded-lg">#<?= $f['urutan'] ?></span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="w-24 h-16 rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                                        <img src="<?= $f['gambar_url'] ?>" alt="<?= $f['judul'] ?>" class="w-full h-full object-cover" onerror="this.src='https://placehold.co/100x100?text=Error'">
                                    </div>
                                </td>
                                <td class="px-8 py-5 font-black text-gray-800 uppercase tracking-tighter">
                                    <?= $f['judul'] ?>
                                    <?php if($f['label']): ?>
                                        <div class="text-[10px] font-medium text-gray-400 italic mt-1 bg-gray-50 px-2 py-0.5 rounded inline-block">Label: <?= $f['label'] ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <?php if($f['status'] === 'Aktif'): ?>
                                        <span class="px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest ring-1 ring-green-100">AKTIF</span>
                                    <?php else: ?>
                                        <span class="px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest ring-1 ring-red-100">TIDAK AKTIF</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-8 py-5 text-center">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="<?= base_url('admin/flayer/edit/'.$f['flayer_id']) ?>" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/flayer/delete/'.$f['flayer_id']) ?>" onclick="return confirm('Hapus flayer ini?')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
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

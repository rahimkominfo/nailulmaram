<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <h3 class="text-2xl md:text-3xl font-black text-gray-800 tracking-tighter uppercase border-l-8 border-green-600 pl-6">Daftar Berita</h3>
        
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
            <form action="<?= base_url('admin/artikel') ?>" method="get" class="flex gap-2">
                <div class="relative">
                    <input type="text" name="q" value="<?= esc($searchTerm ?? '') ?>" placeholder="Cari berita..." class="pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 transition font-bold text-sm w-full md:w-64">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="bg-gray-800 text-white px-6 py-3 rounded-xl font-black uppercase tracking-widest text-xs hover:bg-black transition">Cari</button>
            </form>

            <a href="<?= base_url('admin/artikel/tambah') ?>" class="bg-green-600 hover:bg-green-700 text-white font-black py-3 px-6 rounded-xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest flex items-center justify-center text-xs">
                <i class="fas fa-plus mr-2"></i> Tulis Berita Baru
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-xs font-black text-gray-400 uppercase tracking-widest">
                    <tr>
                        <th class="px-8 py-5 border-b border-gray-100">Gambar</th>
                        <th class="px-8 py-5 border-b border-gray-100">Judul Berita</th>
                        <th class="px-8 py-5 border-b border-gray-100">Penulis</th>
                        <th class="px-8 py-5 border-b border-gray-100">Status</th>
                        <th class="px-8 py-5 border-b border-gray-100">Tanggal</th>
                        <th class="px-8 py-5 border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-bold">
                    <?php if(empty($artikel)): ?>
                        <tr>
                            <td colspan="6" class="px-8 py-10 text-center text-gray-400 font-bold italic">Belum ada artikel yang dibuat.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($artikel as $a): ?>
                            <tr class="hover:bg-gray-50 transition border-b border-gray-50">
                                <td class="px-8 py-4">
                                    <div class="w-20 h-14 rounded-xl overflow-hidden shadow-sm border border-gray-100">
                                        <img src="<?= $a['gambar_utama'] ? base_url('uploads/artikel/'.$a['gambar_utama']) : 'https://via.placeholder.com/200x150?text=No+Image' ?>" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-gray-800 uppercase tracking-tighter max-w-xs truncate">
                                    <?= $a['judul'] ?>
                                </td>
                                <td class="px-8 py-4 text-gray-500 italic text-xs">
                                    <?= $a['nama_publik'] ?>
                                </td>
                                <td class="px-8 py-4">
                                    <?php if($a['status'] == 'Ditayangkan'): ?>
                                        <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-widest border border-green-200">Ditayangkan</span>
                                    <?php elseif($a['status'] == 'Draf'): ?>
                                        <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-widest border border-gray-200">Draf</span>
                                    <?php else: ?>
                                        <span class="bg-orange-50 text-orange-600 px-3 py-1 rounded-full text-[10px] uppercase font-black tracking-widest border border-orange-200">Diarsipkan</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-8 py-4 text-gray-400 text-xs">
                                    <?= date('d M Y', strtotime($a['tanggal_publikasi'])) ?>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="<?= base_url('admin/artikel/edit/'.$a['artikel_id']) ?>" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/artikel/delete/'.$a['artikel_id']) ?>" onclick="return confirm('Hapus berita ini?')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
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

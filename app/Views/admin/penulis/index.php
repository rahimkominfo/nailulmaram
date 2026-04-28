<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10 flex justify-between items-center">
        <div>
            <h3 class="text-2xl font-black text-gray-800 tracking-tighter uppercase border-b-8 border-green-600 w-fit pb-2">Manajemen Penulis</h3>
            <p class="text-gray-400 text-sm font-bold uppercase tracking-widest mt-2">Kelola akun admin, editor, dan kontributor</p>
        </div>
        <a href="<?= base_url('admin/penulis/tambah') ?>" class="bg-green-600 hover:bg-green-700 text-white font-black px-8 py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest flex items-center">
            <i class="fas fa-plus-circle mr-3 text-xl"></i> Tambah Penulis
        </a>
    </div>

    <div class="bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">No</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">Penulis</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">Kontak</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100 text-center">Peran</th>
                    <th class="px-8 py-6 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php if(empty($penulis)): ?>
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center text-gray-400 font-bold italic">Belum ada data penulis.</td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; foreach($penulis as $p): ?>
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-6 font-bold text-gray-400 text-sm"><?= $i++ ?></td>
                            <td class="px-8 py-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center font-black text-lg">
                                        <?= substr($p['nama_publik'], 0, 1) ?>
                                    </div>
                                    <div>
                                        <h4 class="font-black text-gray-800 uppercase tracking-tighter"><?= $p['nama_publik'] ?></h4>
                                        <p class="text-xs text-gray-400 font-bold italic lowercase">@<?= $p['username'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-gray-600"><?= $p['email'] ?></p>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mt-1">Terdaftar: <?= date('d/m/Y', strtotime($p['tanggal_daftar'])) ?></p>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <?php 
                                    $badgeClass = 'bg-gray-100 text-gray-600';
                                    if($p['peran'] == 'Admin') $badgeClass = 'bg-red-100 text-red-600';
                                    if($p['peran'] == 'Editor') $badgeClass = 'bg-blue-100 text-blue-600';
                                    if($p['peran'] == 'Kontributor') $badgeClass = 'bg-green-100 text-green-600';
                                ?>
                                <span class="px-4 py-1.5 <?= $badgeClass ?> rounded-full text-[10px] font-black uppercase tracking-widest inline-block shadow-sm">
                                    <?= $p['peran'] ?>
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <div class="flex items-center justify-center space-x-3">
                                    <a href="<?= base_url('admin/penulis/edit/'.$p['penulis_id']) ?>" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if(session()->get('penulis_id') != $p['penulis_id']): ?>
                                        <a href="<?= base_url('admin/penulis/delete/'.$p['penulis_id']) ?>" onclick="return confirm('Hapus penulis ini? Semua artikel miliknya akan tetap ada namun tanpa penulis.')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php else: ?>
                                        <button disabled class="w-10 h-10 bg-gray-50 text-gray-300 rounded-xl cursor-not-allowed flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    <?php endif; ?>
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

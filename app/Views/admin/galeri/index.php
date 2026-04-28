<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <h3 class="text-3xl font-black text-gray-800 tracking-tighter uppercase border-l-8 border-green-600 pl-6">Galeri Album</h3>
        <a href="<?= base_url('admin/galeri/tambah') ?>" class="bg-green-600 hover:bg-green-700 text-white font-black py-4 px-8 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest flex items-center">
            <i class="fas fa-plus mr-3"></i> Buat Album Baru
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if(empty($galeri)): ?>
            <div class="md:col-span-2 lg:col-span-3 bg-white p-20 rounded-3xl shadow-sm border border-gray-100 text-center">
                <i class="fas fa-images text-6xl text-gray-100 mb-6"></i>
                <p class="text-gray-400 font-bold italic">Belum ada album galeri yang dibuat.</p>
            </div>
        <?php else: ?>
            <?php foreach($galeri as $g): ?>
                <div class="bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="h-56 relative overflow-hidden">
                        <img src="<?= base_url('uploads/galeri/'.$g['sampul_url']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                            <h4 class="text-white font-black uppercase tracking-tighter text-lg truncate w-full"><?= $g['judul'] ?></h4>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-500 text-sm italic font-light line-clamp-2 mb-6"><?= $g['deskripsi'] ?: 'Tidak ada deskripsi.' ?></p>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-6">
                            <div class="flex space-x-2">
                                <a href="<?= base_url('admin/galeri/view/'.$g['galeri_id']) ?>" class="w-10 h-10 bg-green-50 text-green-600 rounded-xl hover:bg-green-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                    <i class="fas fa-images"></i>
                                </a>
                                <a href="<?= base_url('admin/galeri/edit/'.$g['galeri_id']) ?>" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <a href="<?= base_url('admin/galeri/delete/'.$g['galeri_id']) ?>" onclick="return confirm('Hapus album ini beserta seluruh foto di dalamnya?')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?= $this->endSection() ?>

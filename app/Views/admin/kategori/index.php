<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Form Tambah -->
        <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase mb-6 border-b-4 border-green-600 w-fit pb-2">Tambah Kategori</h3>
                <form action="<?= base_url('admin/kategori/store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="nama">Nama Kategori</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="nama" name="nama" type="text" placeholder="Contoh: Kajian" required>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="kategori_induk_id">Kategori Induk (Opsional)</label>
                        <select class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="kategori_induk_id" name="kategori_induk_id">
                            <option value="">-- Tanpa Induk --</option>
                            <?php foreach($induk as $i): ?>
                                <option value="<?= $i['kategori_id'] ?>"><?= $i['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                        Simpan Kategori
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">No</th>
                            <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Nama Kategori</th>
                            <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">Kategori Induk</th>
                            <th class="px-8 py-5 text-xs font-black text-gray-400 uppercase tracking-widest border-b border-gray-100 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($kategori)): ?>
                            <tr>
                                <td colspan="4" class="px-8 py-10 text-center text-gray-400 font-bold italic">Belum ada kategori data.</td>
                            </tr>
                        <?php else: ?>
                            <?php $i = 1; foreach($kategori as $k): ?>
                                <tr class="hover:bg-gray-50 transition border-b border-gray-50">
                                    <td class="px-8 py-5 font-bold text-gray-500"><?= $i++ ?></td>
                                    <td class="px-8 py-5 font-black text-gray-800 uppercase tracking-tighter">
                                        <?= $k['nama'] ?>
                                        <div class="text-xs font-medium text-gray-400 italic mt-1">/<?= $k['slug'] ?></div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <?php if($k['nama_induk']): ?>
                                            <span class="px-4 py-1.5 bg-gray-100 text-gray-600 rounded-full text-xs font-black uppercase tracking-widest"><?= $k['nama_induk'] ?></span>
                                        <?php else: ?>
                                            <span class="text-gray-300 italic text-sm font-bold">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <button onclick="editKategori(<?= $k['kategori_id'] ?>, '<?= $k['nama'] ?>', '<?= $k['kategori_induk_id'] ?>')" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition flex items-center justify-center shadow-sm">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url('admin/kategori/delete/'.$k['kategori_id']) ?>" onclick="return confirm('Hapus kategori ini?')" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition flex items-center justify-center shadow-sm">
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
    </div>

    <!-- Modal Edit (Simple implementation) -->
    <div id="modalEdit" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 backdrop-blur-sm p-6">
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md">
            <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase mb-6 border-b-4 border-blue-600 w-fit pb-2">Edit Kategori</h3>
            <form action="<?= base_url('admin/kategori/update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="kategori_id" id="edit_id">
                <div class="mb-4">
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="edit_nama">Nama Kategori</label>
                    <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="edit_nama" name="nama" type="text" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="edit_induk">Kategori Induk (Opsional)</label>
                    <select class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="edit_induk" name="kategori_induk_id">
                        <option value="">-- Tanpa Induk --</option>
                        <?php foreach($induk as $i): ?>
                            <option value="<?= $i['kategori_id'] ?>"><?= $i['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-500 font-black py-4 rounded-2xl transition duration-300 uppercase tracking-widest">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 transition duration-300 uppercase tracking-widest">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editKategori(id, nama, indukId) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_induk').value = indukId || '';
            document.getElementById('modalEdit').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalEdit').classList.add('hidden');
        }
    </script>
<?= $this->endSection() ?>

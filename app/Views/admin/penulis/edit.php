<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="max-w-4xl mx-auto">
        <div class="mb-10 flex items-center justify-between">
            <div>
                <a href="<?= base_url('admin/penulis') ?>" class="text-xs font-black text-gray-400 hover:text-green-600 transition uppercase tracking-[0.2em] flex items-center mb-4">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                </a>
                <h3 class="text-3xl font-black text-gray-800 tracking-tighter uppercase border-b-8 border-blue-600 w-fit pb-2">Edit Data Penulis</h3>
            </div>
        </div>

        <div class="bg-white p-10 md:p-16 rounded-[40px] shadow-sm border border-gray-100">
            <form action="<?= base_url('admin/penulis/update/'.$penulis['penulis_id']) ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <label class="block text-gray-700 text-[10px] font-black mb-3 uppercase tracking-[0.2em]" for="nama_publik">Nama Publik (Ditampilkan)</label>
                        <input class="w-full px-8 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="nama_publik" name="nama_publik" type="text" placeholder="Nama Lengkap / Nama Pena" required value="<?= old('nama_publik', $penulis['nama_publik']) ?>">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-[10px] font-black mb-3 uppercase tracking-[0.2em]" for="peran">Hak Akses / Peran</label>
                        <select class="w-full px-8 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="peran" name="peran" required>
                            <option value="Kontributor" <?= old('peran', $penulis['peran']) == 'Kontributor' ? 'selected' : '' ?>>Kontributor (Hanya Tulis Berita)</option>
                            <option value="Editor" <?= old('peran', $penulis['peran']) == 'Editor' ? 'selected' : '' ?>>Editor (Tulis & Edit Semua Berita)</option>
                            <option value="Admin" <?= old('peran', $penulis['peran']) == 'Admin' ? 'selected' : '' ?>>Admin (Akses Penuh Sistem)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 border-t border-gray-50 pt-8">
                    <div>
                        <label class="block text-gray-700 text-[10px] font-black mb-3 uppercase tracking-[0.2em]" for="username">Username</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-400 font-bold">@</span>
                            <input class="w-full pl-12 pr-8 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="username" name="username" type="text" placeholder="username" required value="<?= old('username', $penulis['username']) ?>">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-[10px] font-black mb-3 uppercase tracking-[0.2em]" for="email">Alamat Email</label>
                        <input class="w-full px-8 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="email" name="email" type="email" placeholder="email@masjid.com" required value="<?= old('email', $penulis['email']) ?>">
                    </div>
                </div>

                <div class="mb-12">
                    <label class="block text-gray-700 text-[10px] font-black mb-3 uppercase tracking-[0.2em]" for="password">Ubah Password</label>
                    <input class="w-full px-8 py-5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="password" name="password" type="password" placeholder="Biarkan kosong jika tidak ingin mengubah password">
                    <p class="text-[10px] text-gray-400 mt-3 italic font-bold">Minimal 8 karakter jika ingin diubah.</p>
                </div>

                <div class="flex justify-end pt-8 border-t border-gray-50">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-black px-12 py-5 rounded-2xl shadow-xl shadow-blue-100 transition duration-300 uppercase tracking-widest flex items-center">
                        Simpan Perubahan <i class="fas fa-save ml-3"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

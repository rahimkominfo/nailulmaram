<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-gray-100">
        <form action="<?= base_url('admin/profil/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="profil_masjid_id" value="<?= $profil['profil_masjid_id'] ?? '' ?>">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
                <div class="space-y-6">
                    <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase border-b-4 border-green-600 w-fit pb-2">Informasi Umum</h3>
                    
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="nama_masjid">Nama Masjid</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="nama_masjid" name="nama_masjid" type="text" placeholder="Masukkan nama masjid" value="<?= old('nama_masjid', $profil['nama_masjid'] ?? '') ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="alamat_lengkap">Alamat Lengkap</label>
                        <textarea class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold h-32" id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan alamat lengkap" required><?= old('alamat_lengkap', $profil['alamat_lengkap'] ?? '') ?></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="latitude">Latitude</label>
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="latitude" name="latitude" type="text" value="<?= old('latitude', $profil['latitude'] ?? '') ?>">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="longitude">Longitude</label>
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="longitude" name="longitude" type="text" value="<?= old('longitude', $profil['longitude'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase border-b-4 border-blue-600 w-fit pb-2">Kontak & Sosial Media</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="telepon">Telepon</label>
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition duration-300 font-bold" id="telepon" name="telepon" type="text" value="<?= old('telepon', $profil['telepon'] ?? '') ?>">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="whatsapp">WhatsApp</label>
                            <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold" id="whatsapp" name="whatsapp" type="text" value="<?= old('whatsapp', $profil['whatsapp'] ?? '') ?>">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="instagram">Instagram (URL)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:bg-white transition duration-300 font-bold" id="instagram" name="instagram" type="text" value="<?= old('instagram', $profil['instagram'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="youtube">YouTube (URL)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition duration-300 font-bold" id="youtube" name="youtube" type="text" value="<?= old('youtube', $profil['youtube'] ?? '') ?>">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="facebook">Facebook (URL)</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-700 focus:bg-white transition duration-300 font-bold" id="facebook" name="facebook" type="text" value="<?= old('facebook', $profil['facebook'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 border-t border-gray-100 pt-8">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-black py-4 px-10 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>
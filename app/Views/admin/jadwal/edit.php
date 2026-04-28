<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="mb-10 flex items-center gap-4">
        <a href="<?= base_url('admin/jadwal') ?>" class="bg-white hover:bg-gray-50 text-gray-800 font-black p-4 rounded-2xl shadow-sm border border-gray-100 transition duration-300">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h3 class="text-3xl font-black text-gray-800 tracking-tighter uppercase border-l-8 border-green-600 pl-6">Edit Jadwal Sholat</h3>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden max-w-2xl">
        <form action="<?= base_url('admin/jadwal/update/' . $jadwal['tanggal']) ?>" method="post" class="p-8">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-2 bg-gray-50 p-6 rounded-2xl mb-4 border border-gray-100">
                    <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Tanggal</p>
                    <p class="text-xl font-black text-gray-800 uppercase tracking-tighter"><?= date('d F Y', strtotime($jadwal['tanggal'])) ?></p>
                    <p class="text-sm font-bold text-green-600 mt-1"><?= $jadwal['h_hari'] ?> <?= $jadwal['h_bulan'] ?> <?= $jadwal['h_tahun'] ?> H</p>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Imsak</label>
                    <input type="text" name="imsak" value="<?= $jadwal['imsak'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Subuh</label>
                    <input type="text" name="subuh" value="<?= $jadwal['subuh'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Terbit</label>
                    <input type="text" name="terbit" value="<?= $jadwal['terbit'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Dzuhur</label>
                    <input type="text" name="dzuhur" value="<?= $jadwal['dzuhur'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Ashar</label>
                    <input type="text" name="ashar" value="<?= $jadwal['ashar'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Maghrib</label>
                    <input type="text" name="maghrib" value="<?= $jadwal['maghrib'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest block pl-1">Isya</label>
                    <input type="text" name="isya" value="<?= $jadwal['isya'] ?>" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 font-bold text-gray-700 focus:ring-2 focus:ring-green-500 transition duration-300" required>
                </div>
            </div>

            <div class="mt-10">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-5 rounded-2xl shadow-lg shadow-green-100 transition duration-300 uppercase tracking-widest">
                    <i class="fas fa-save mr-3"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

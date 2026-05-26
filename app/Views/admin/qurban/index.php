<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <h3 class="text-3xl font-black text-gray-800 tracking-tighter uppercase border-l-8 border-green-600 pl-6">Manajemen Qurban</h3>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Update/Add -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sticky top-8">
                <h4 class="text-xl font-black text-gray-800 uppercase tracking-tighter mb-6">Atur Waktu Pemotongan</h4>
                
                <form action="<?= base_url('admin/qurban/save') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Pilih Kelompok</label>
                            <select name="kelompok" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-green-500 transition" required>
                                <option value="">-- Pilih Kelompok --</option>
                                <?php for($i=1; $i<=$max_kelompok; $i++): ?>
                                    <option value="<?= $i ?>">Kelompok <?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Tanggal & Waktu Pemotongan</label>
                            <input type="datetime-local" name="waktu_pemotongan" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-green-500 transition" required>
                        </div>

                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest">
                            Simpan Waktu
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table List -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                            <tr>
                                <th class="px-6 py-5 border-b border-gray-100">Kelompok</th>
                                <th class="px-6 py-5 border-b border-gray-100">Waktu Pemotongan</th>
                                <th class="px-6 py-5 border-b border-gray-100 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-bold">
                            <?php if(empty($qurbanTimes)): ?>
                                <tr>
                                    <td colspan="3" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <i class="fas fa-clock text-6xl text-gray-100 mb-6"></i>
                                            <p class="text-gray-400 font-bold italic">Belum ada waktu pemotongan yang diatur.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php ksort($qurbanTimes); ?>
                                <?php foreach($qurbanTimes as $kel => $waktu): ?>
                                    <tr class="hover:bg-gray-50 transition border-b border-gray-50">
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-lg text-xs uppercase font-black">Kelompok <?= $kel ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-700 uppercase tracking-tighter">
                                            <?= date('d M Y - H:i', strtotime($waktu)) ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="<?= base_url('admin/qurban/delete/' . $kel) ?>" onclick="return confirm('Hapus waktu pemotongan untuk kelompok ini?')" class="bg-gray-100 hover:bg-red-600 text-gray-400 hover:text-white w-10 h-10 rounded-xl flex items-center justify-center mx-auto transition duration-300">
                                                <i class="fas fa-trash text-xs"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

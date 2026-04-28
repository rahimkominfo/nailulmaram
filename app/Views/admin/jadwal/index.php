<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
        <h3 class="text-3xl font-black text-gray-800 tracking-tighter uppercase border-l-8 border-green-600 pl-6">Jadwal Sholat</h3>
        <form action="<?= base_url('admin/jadwal/sync') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 px-8 rounded-2xl shadow-lg shadow-blue-200 transition duration-300 uppercase tracking-widest flex items-center">
                <i class="fas fa-sync mr-3"></i> Sinkronisasi Bulan Ini
            </button>
        </form>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-[10px] font-black text-gray-400 uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-5 border-b border-gray-100">Tanggal</th>
                        <th class="px-6 py-5 border-b border-gray-100">Imsak</th>
                        <th class="px-6 py-5 border-b border-gray-100">Subuh</th>
                        <th class="px-6 py-5 border-b border-gray-100">Terbit</th>
                        <th class="px-6 py-5 border-b border-gray-100">Dzuhur</th>
                        <th class="px-6 py-5 border-b border-gray-100">Ashar</th>
                        <th class="px-6 py-5 border-b border-gray-100 text-orange-600">Maghrib</th>
                        <th class="px-6 py-5 border-b border-gray-100">Isya</th>
                        <th class="px-6 py-5 border-b border-gray-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-bold">
                    <?php if(empty($jadwal)): ?>
                        <tr>
                            <td colspan="9" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-calendar-times text-6xl text-gray-100 mb-6"></i>
                                    <p class="text-gray-400 font-bold italic">Belum ada data jadwal sholat. Klik tombol sinkronisasi di atas.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($jadwal as $j): ?>
                            <tr class="hover:bg-gray-50 transition border-b border-gray-50 <?= $j['tanggal'] == date('Y-m-d') ? 'bg-green-50/50' : '' ?>">
                                <td class="px-6 py-4">
                                    <p class="text-gray-800 uppercase tracking-tighter"><?= date('d M Y', strtotime($j['tanggal'])) ?></p>
                                    <?php if($j['tanggal'] == date('Y-m-d')): ?>
                                        <span class="text-[8px] bg-green-600 text-white px-2 py-0.5 rounded-full uppercase">Hari Ini</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-gray-500"><?= $j['imsak'] ?></td>
                                <td class="px-6 py-4 text-green-700"><?= $j['subuh'] ?></td>
                                <td class="px-6 py-4 text-gray-500"><?= $j['terbit'] ?></td>
                                <td class="px-6 py-4 text-gray-700"><?= $j['dzuhur'] ?></td>
                                <td class="px-6 py-4 text-gray-700"><?= $j['ashar'] ?></td>
                                <td class="px-6 py-4 text-orange-700 font-black"><?= $j['maghrib'] ?></td>
                                <td class="px-6 py-4 text-gray-700"><?= $j['isya'] ?></td>
                                <td class="px-6 py-4 text-center">
                                    <a href="<?= base_url('admin/jadwal/edit/' . $j['tanggal']) ?>" class="bg-gray-100 hover:bg-green-600 text-gray-400 hover:text-white w-10 h-10 rounded-xl flex items-center justify-center mx-auto transition duration-300">
                                        <i class="fas fa-edit text-xs"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>

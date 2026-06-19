<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-lg font-bold text-gray-800">Daftar Video Dokumentasi</h3>
        <a href="<?= base_url('admin/video-dokumentasi/tambah') ?>" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i> Tambah Video
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="p-4 font-bold border-b">No</th>
                    <th class="p-4 font-bold border-b">Judul</th>
                    <th class="p-4 font-bold border-b">URL YouTube</th>
                    <th class="p-4 font-bold border-b">Urutan</th>
                    <th class="p-4 font-bold border-b">Status</th>
                    <th class="p-4 font-bold border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-100">
                <?php $no = 1; foreach($videos as $v): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4"><?= $no++ ?></td>
                    <td class="p-4 font-semibold text-gray-800"><?= esc($v['judul']) ?></td>
                    <td class="p-4 text-blue-600"><a href="<?= esc($v['url_youtube']) ?>" target="_blank"><?= esc($v['url_youtube']) ?></a></td>
                    <td class="p-4 text-center"><?= esc($v['urutan']) ?></td>
                    <td class="p-4">
                        <?php if($v['status'] === 'Aktif'): ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Aktif</span>
                        <?php else: ?>
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">Tidak Aktif</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="<?= base_url('admin/video-dokumentasi/edit/' . $v['video_dokumentasi_id']) ?>" class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white flex items-center justify-center transition">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/video-dokumentasi/delete/' . $v['video_dokumentasi_id']) ?>" onclick="return confirm('Yakin ingin menghapus video ini?')" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white flex items-center justify-center transition">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($videos)): ?>
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-500">
                        <i class="fas fa-video text-4xl mb-3 text-gray-300"></i>
                        <p>Belum ada data video dokumentasi.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-gray-800"><?= $title ?></h1>
    <a href="<?= base_url('admin/running-text/tambah') ?>" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
        <i class="fas fa-plus mr-2"></i> Tambah Text
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
    <p><?= session()->getFlashdata('success') ?></p>
</div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="p-4 font-semibold text-gray-600">Urutan</th>
                    <th class="p-4 font-semibold text-gray-600">Teks</th>
                    <th class="p-4 font-semibold text-gray-600">Status</th>
                    <th class="p-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if(empty($texts)): ?>
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500 italic">Belum ada running text.</td>
                </tr>
                <?php else: ?>
                    <?php foreach($texts as $text): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-4 font-semibold text-gray-800"><?= esc($text['urutan']) ?></td>
                        <td class="p-4 text-gray-600 max-w-xl truncate">
                            <?= esc($text['teks']) ?>
                            <?php if(!empty($text['tautan'])): ?>
                                <a href="<?= esc($text['tautan']) ?>" target="_blank" class="ml-2 text-blue-500 hover:text-blue-700" title="<?= esc($text['tautan']) ?>">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="p-4">
                            <?php if($text['status'] == 'Aktif'): ?>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold uppercase">Aktif</span>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-bold uppercase">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 text-right space-x-2 flex justify-end">
                            <a href="<?= base_url('admin/running-text/edit/'.$text['running_text_id']) ?>" class="px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 transition" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/running-text/delete/'.$text['running_text_id']) ?>" onclick="return confirm('Yakin ingin menghapus teks ini?')" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 transition" title="Hapus">
                                <i class="fas fa-trash"></i>
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

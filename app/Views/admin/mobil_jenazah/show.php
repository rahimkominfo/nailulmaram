<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
        <div>
            <h2 class="text-2xl font-black text-gray-800 tracking-tighter uppercase mb-1">Detail Layanan</h2>
            <p class="text-gray-500 text-sm font-bold uppercase tracking-widest">Informasi lengkap penggunaan mobil jenazah.</p>
        </div>
        <div class="flex space-x-3">
            <a href="<?= base_url('admin/mobil-jenazah') ?>" class="inline-flex items-center px-6 py-4 bg-gray-100 hover:bg-gray-200 text-gray-600 font-black rounded-2xl transition duration-300 uppercase tracking-widest text-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <a href="<?= base_url('admin/mobil-jenazah/edit/'.$layanan['mobil_jenazah_id']) ?>" class="inline-flex items-center px-6 py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-2xl shadow-lg shadow-blue-200 transition duration-300 uppercase tracking-widest text-sm">
                <i class="fas fa-edit mr-2"></i> Edit Data
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <!-- Informasi Utama -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center mb-8 pb-4 border-b border-gray-50">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-info text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-gray-800 uppercase tracking-tighter">Informasi Layanan</h3>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Detail data layanan yang tercatat</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Tanggal Layanan</label>
                        <p class="font-black text-gray-700"><?= date('d F Y', strtotime($layanan['tanggal'])) ?></p>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Jenis Layanan</label>
                        <p class="font-black text-gray-700 uppercase tracking-tighter"><?= $layanan['jenis_layanan'] ?></p>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Nama Almarhum</label>
                        <p class="font-black text-gray-700 uppercase tracking-tighter"><?= $layanan['nama_almarhum'] ?: '-' ?></p>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Status</label>
                        <?php 
                            $statusClass = 'bg-gray-50 text-gray-600 ring-gray-100';
                            if($layanan['status'] === 'published') $statusClass = 'bg-green-50 text-green-600 ring-green-100';
                            if($layanan['status'] === 'archived') $statusClass = 'bg-red-50 text-red-600 ring-red-100';
                        ?>
                        <span class="inline-block px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest ring-1 <?= $statusClass ?>">
                            <?= strtoupper($layanan['status']) ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Rute Perjalanan -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center mb-8 pb-4 border-b border-gray-50">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-gray-800 uppercase tracking-tighter">Rute Perjalanan</h3>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Detail lokasi penjemputan dan tujuan</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <i class="fas fa-circle text-[8px] text-gray-400"></i>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Lokasi Penjemputan</label>
                            <p class="font-bold text-gray-700"><?= $layanan['lokasi_penjemputan'] ?: '-' ?></p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <i class="fas fa-mosque text-[10px] text-gray-400"></i>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Lokasi Disalatkan</label>
                            <p class="font-bold text-gray-700"><?= $layanan['lokasi_disalatkan'] ?: '-' ?></p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <i class="fas fa-map-pin text-[10px] text-green-600"></i>
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 block">Lokasi Tujuan</label>
                            <p class="font-bold text-gray-700"><?= $layanan['lokasi_tujuan'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keterangan Tambahan -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center mb-6 pb-4 border-b border-gray-50">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-align-left text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-gray-800 uppercase tracking-tighter">Keterangan Tambahan</h3>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Catatan atau informasi pendukung lainnya</p>
                    </div>
                </div>
                <div class="text-gray-600 leading-relaxed font-medium bg-gray-50 p-6 rounded-2xl italic">
                    <?= $layanan['keterangan'] ?: 'Tidak ada keterangan tambahan.' ?>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <!-- Foto Dokumentasi -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-full">
                <div class="flex items-center mb-8 pb-4 border-b border-gray-50">
                    <div class="w-12 h-12 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mr-4">
                        <i class="fas fa-camera text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-black text-gray-800 uppercase tracking-tighter">Dokumentasi</h3>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Foto bukti layanan</p>
                    </div>
                </div>

                <?php if ($layanan['foto_dokumentasi']) : ?>
                    <div class="rounded-2xl overflow-hidden shadow-md">
                        <img src="<?= $layanan['foto_dokumentasi'] ?>" alt="Dokumentasi" class="w-full h-auto object-cover">
                    </div>
                <?php else : ?>
                    <div class="bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 p-10 text-center">
                        <i class="fas fa-image text-4xl text-gray-200 mb-4 block"></i>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">Tidak ada foto dokumentasi</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

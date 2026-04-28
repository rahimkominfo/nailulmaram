<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
            <h3 class="text-xl font-black text-gray-800 tracking-tighter uppercase border-b-4 border-green-600 w-fit pb-2">Media Library</h3>
            
            <form action="<?= base_url('admin/media/store') ?>" method="post" enctype="multipart/form-data" class="flex flex-wrap items-center gap-4">
                <?= csrf_field() ?>
                <div class="relative group">
                    <input type="file" name="files[]" id="file_input" multiple required class="hidden" onchange="updateFileName(this)">
                    <label for="file_input" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-2xl cursor-pointer transition flex items-center gap-3">
                        <i class="fas fa-cloud-upload-alt text-xl"></i>
                        <span id="file_label">Pilih File...</span>
                    </label>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-black py-3 px-8 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest text-sm">
                    Unggah
                </button>
            </form>
        </div>

        <?php if(empty($media)): ?>
            <div class="text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                <i class="fas fa-photo-video text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-400 font-bold">Belum ada media yang diunggah.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <?php foreach($media as $m): ?>
                    <div class="group relative bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 aspect-square flex items-center justify-center">
                        <?php if(strpos($m['tipe_file'], 'image') !== false): ?>
                            <img src="<?= base_url('uploads/media/' . $m['url_file']) ?>" alt="<?= $m['nama_file'] ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <?php else: ?>
                            <div class="flex flex-col items-center p-4">
                                <i class="fas fa-file-alt text-4xl text-gray-300 mb-2"></i>
                                <span class="text-[10px] font-bold text-gray-400 break-all text-center"><?= $m['nama_file'] ?></span>
                            </div>
                        <?php endif; ?>

                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center gap-3 p-4">
                            <button onclick="copyToClipboard('<?= base_url('uploads/media/' . $m['url_file']) ?>')" class="w-10 h-10 bg-white/20 hover:bg-white text-white hover:text-green-600 rounded-xl transition flex items-center justify-center backdrop-blur-sm" title="Copy URL">
                                <i class="fas fa-link"></i>
                            </button>
                            <a href="<?= base_url('admin/media/delete/'.$m['media_id']) ?>" onclick="return confirm('Hapus file ini permanen?')" class="w-10 h-10 bg-white/20 hover:bg-red-600 text-white rounded-xl transition flex items-center justify-center backdrop-blur-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function updateFileName(input) {
            const label = document.getElementById('file_label');
            const files = input.files;
            if (files.length > 0) {
                label.innerText = files.length > 1 ? files.length + ' file terpilih' : files[0].name.substring(0, 15) + '...';
            } else {
                label.innerText = 'Pilih File...';
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('URL berhasil disalin ke clipboard!');
            });
        }
    </script>
<?= $this->endSection() ?>

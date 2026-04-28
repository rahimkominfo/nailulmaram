<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
    <section class="bg-gray-950 py-24">
        <div class="container mx-auto px-6">
            <a href="<?= base_url('galeri') ?>" class="text-sm font-bold text-gray-500 hover:text-green-400 transition uppercase tracking-widest block mb-8">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Galeri
            </a>
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tighter mb-4"><?= $album['judul'] ?></h1>
            <p class="text-green-400 italic font-medium max-w-2xl"><?= $album['deskripsi'] ?></p>
        </div>
    </section>

    <section class="py-24 container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php if(empty($gambar)): ?>
                <div class="col-span-full text-center py-20 text-gray-400 italic">Album ini belum memiliki foto.</div>
            <?php else: ?>
                <?php foreach($gambar as $idx => $img): ?>
                    <div onclick="openLightbox(<?= $idx ?>)" class="cursor-pointer group relative h-72 rounded-[30px] overflow-hidden shadow-lg">
                        <img src="<?= base_url('uploads/galeri/'.$img['gambar_url']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-green-600/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <i class="fas fa-search-plus text-white text-3xl"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <script>
        // Use the already defined openGallery logic from template or create a simple one here
        // For simplicity, we can reuse the modal in template.php
        const currentAlbumImages = [
            <?php foreach($gambar as $img): ?>
                "<?= base_url('uploads/galeri/'.$img['gambar_url']) ?>",
            <?php endforeach; ?>
        ];

        function openLightbox(idx) {
            // Need to set currentActiveAlbum in template.php scope or redefine
            // Let's just use the modal defined in template.php
            currentActiveAlbum = currentAlbumImages;
            currentImgIdx = idx;
            updateModalUI();
            document.getElementById('galleryModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    </script>
<?= $this->endSection() ?>

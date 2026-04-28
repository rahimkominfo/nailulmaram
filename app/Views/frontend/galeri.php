<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
    <section class="bg-gray-950 py-24 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-5xl font-black text-green-400 uppercase tracking-tighter mb-4">Galeri Dokumentasi</h1>
            <p class="text-gray-400 font-medium italic">Momen-momen berharga dan kegiatan jamaah Masjid Jami Nailul Maram.</p>
        </div>
    </section>

    <section class="py-24 container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            <?php if(empty($galeri)): ?>
                <div class="col-span-full text-center py-20 text-gray-400 italic">Belum ada album galeri.</div>
            <?php else: ?>
                <?php foreach($galeri as $g): ?>
                    <div onclick="openGalleryAlbum(<?= $g['galeri_id'] ?>)" class="group relative h-[450px] rounded-[40px] overflow-hidden shadow-2xl transition-all duration-500 hover:-translate-y-2 cursor-pointer">
                        <img src="<?= base_url('uploads/galeri/'.$g['sampul_url']) ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-125">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent p-12 flex flex-col justify-end group-hover:via-black/60 transition-colors duration-500">
                            <span class="bg-green-600 w-fit text-xs px-4 py-1.5 rounded-full font-black mb-4 shadow-lg tracking-widest uppercase">Lihat Koleksi</span>
                            <h4 class="text-3xl font-black mb-2 leading-tight text-white uppercase tracking-tighter"><?= $g['judul'] ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <script>
        // Data Galeri dari PHP ke JavaScript
        const galleryAlbums = {
            <?php foreach($galeri as $g): ?>
                "<?= $g['galeri_id'] ?>": {
                    title: "<?= addslashes($g['judul']) ?>",
                    images: [
                        <?php foreach($g['images'] as $img): ?>
                            "<?= base_url('uploads/galeri/'.$img['gambar_url']) ?>",
                        <?php endforeach; ?>
                    ]
                },
            <?php endforeach; ?>
        };

        function openGalleryAlbum(id) {
            const album = galleryAlbums[id];
            if (album && album.images.length > 0) {
                currentActiveAlbum = album.images;
                currentImgIdx = 0;
                
                // Set Title di Modal
                const titleElem = document.getElementById('modalAlbumTitle');
                if (titleElem) titleElem.innerText = album.title;
                
                updateModalUI();
                document.getElementById('galleryModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                alert('Album ini belum memiliki foto.');
            }
        }
    </script>
<?= $this->endSection() ?>

<?= $this->extend('admin/layout/template') ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/ckeditor5-47.5.0/ckeditor5/ckeditor5.css') ?>">
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
            padding: 0 2rem !important;
        }
        .ck-editor {
            border-radius: 1rem !important;
            overflow: hidden;
            border: 1px solid #e5e7eb !important;
        }
        .ck.ck-editor__main>.ck-editor__editable {
            background: white !important;
        }
        .ck.ck-toolbar {
            background: #f9fafb !important;
            border-bottom: 1px solid #e5e7eb !important;
            padding: 0.5rem !important;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="mb-10">
        <a href="<?= base_url('admin/artikel') ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
        <form action="<?= base_url('admin/artikel/update/'.$artikel['artikel_id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest" for="judul">Judul Berita</label>
                        <input class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-bold text-lg" id="judul" name="judul" type="text" value="<?= old('judul', $artikel['judul']) ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-widest">Konten Berita</label>
                        <textarea id="editor" class="w-full" name="konten"><?= old('konten', $artikel['konten']) ?></textarea>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100">
                        <h4 class="text-sm font-black text-gray-800 uppercase tracking-widest mb-6 border-b-2 border-gray-200 pb-2">Pengaturan</h4>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-[10px] font-black mb-2 uppercase tracking-widest" for="kategori_id">Kategori</label>
                            <select class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 transition font-bold text-sm" name="kategori_id" id="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                <?php foreach($kategori as $k): ?>
                                    <option value="<?= $k['kategori_id'] ?>" <?= (old('kategori_id', $currentKategori) == $k['kategori_id']) ? 'selected' : '' ?>><?= strtoupper($k['nama']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-[10px] font-black mb-2 uppercase tracking-widest" for="status">Status Penerbitan</label>
                            <select class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 transition font-bold text-sm" name="status" id="status" required>
                                <option value="Draf" <?= old('status', $artikel['status']) == 'Draf' ? 'selected' : '' ?>>DRAF (SIMPAN)</option>
                                <option value="Ditayangkan" <?= old('status', $artikel['status']) == 'Ditayangkan' ? 'selected' : '' ?>>TAYANGKAN (PUBLIK)</option>
                                <option value="Diarsipkan" <?= old('status', $artikel['status']) == 'Diarsipkan' ? 'selected' : '' ?>>ARSIPKAN</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-[10px] font-black mb-2 uppercase tracking-widest">Gambar Utama</label>
                            <div class="mt-2 flex flex-col items-center">
                                <div id="previewContainer" class="mb-4 w-full h-40 rounded-xl overflow-hidden border-2 border-dashed border-gray-200 <?= $artikel['gambar_utama'] ? '' : 'hidden' ?>">
                                    <img id="imagePreview" src="<?= $artikel['gambar_utama'] ? base_url('uploads/artikel/'.$artikel['gambar_utama']) : '' ?>" class="w-full h-full object-cover">
                                </div>
                                <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-green-600 rounded-xl border border-gray-200 tracking-wide uppercase font-black cursor-pointer hover:bg-green-600 hover:text-white transition duration-300 text-[10px]">
                                    <i class="fas fa-sync-alt text-2xl mb-2"></i>
                                    <span>Ganti Gambar</span>
                                    <input type='file' class="hidden" name="gambar_utama" onchange="previewImage(this)" accept="image/*" />
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-200 transition duration-300 uppercase tracking-widest mt-4">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "<?= base_url('assets/ckeditor5-47.5.0/ckeditor5/ckeditor5.js') ?>",
                "ckeditor5/": "<?= base_url('assets/ckeditor5-47.5.0/ckeditor5/') ?>"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            Heading,
            List,
            Link,
            Table,
            TableToolbar,
            Alignment,
            BlockQuote,
            MediaEmbed,
            Image,
            ImageToolbar,
            ImageCaption,
            ImageStyle,
            ImageUpload
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [
                    Essentials, Paragraph, Bold, Italic, Font, Heading, List, Link, 
                    Table, TableToolbar, Alignment, BlockQuote, MediaEmbed,
                    Image, ImageToolbar, ImageCaption, ImageStyle, ImageUpload
                ],
                toolbar: [
                    'undo', 'redo', '|', 'heading', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', 'bulletedList', 'numberedList', '|',
                    'link', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'outdent', 'indent'
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                },
                licenseKey: 'GPL'
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const container = document.getElementById('previewContainer');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        window.previewImage = previewImage;
    </script>
<?= $this->endSection() ?>


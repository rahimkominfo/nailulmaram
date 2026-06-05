<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('content') ?>
<div class="aduan-scope">
    <!-- BREADCRUMB -->
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <nav class="flex items-center gap-2 text-sm text-gray-500">
                <a href="<?= base_url('aduan') ?>" class="hover:text-primary-700 transition"><i class="fas fa-home text-xs"></i></a>
                <i class="fas fa-chevron-right text-[0.6rem] text-gray-300"></i>
                <span class="text-gray-800 font-medium">Sampaikan Aduan</span>
            </nav>
        </div>
    </div>

    <!-- FORM SECTION -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-12">
                <h1 class="font-heading text-2xl md:text-3xl font-bold text-gray-900 mb-3">Sampaikan Aduan Anda</h1>
                <p class="text-gray-500 text-sm md:text-base">Isi form berikut dengan lengkap. Aduan Anda akan diteruskan ke pengurus yang bersangkutan.</p>
            </div>

            <div class="card p-6 md:p-10 bg-white shadow-sm border border-gray-100 rounded-2xl">
                <form id="formAduan" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <!-- Privasi Identitas -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Privasi Identitas</label>
                        <div class="flex items-center gap-6 mt-1">
                            <label class="flex items-center gap-2 cursor-pointer text-sm">
                                <input type="radio" name="privacy" value="named" checked onchange="toggleAnonim(false)"
                                    class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                                <span>Dengan Nama</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-sm">
                                <input type="radio" name="privacy" value="anonymous" onchange="toggleAnonim(true)"
                                    class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
                                <span>Anonim</span>
                            </label>
                        </div>
                    </div>

                    <!-- Nama -->
                    <div class="mb-6" id="nameGroup" style="transition: all 0.3s ease; max-height:200px; opacity:1;">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" id="namaPengirim" name="nama_pengirim" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" placeholder="Masukkan nama lengkap Anda" required>
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-nama_pengirim"></div>
                    </div>

                    <!-- Kontak -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kontak WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" id="kontakPengirim" name="kontak_pengirim" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" placeholder="Contoh: 081234567890" required>
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-kontak_pengirim"></div>
                        <p class="text-xs text-gray-400 mt-2 italic">Digunakan untuk menghubungi Anda terkait aduan ini.</p>
                    </div>

                    <!-- Tujuan Aduan -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tujuan Aduan <span class="text-red-500">*</span></label>
                        <select id="aduanTujuan" name="aduan_tujuan_id" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition bg-white" required>
                            <option value="" disabled <?= !request()->getGet('tujuan') ? 'selected' : '' ?>>Pilih bidang pengurus...</option>
                            <?php foreach ($tujuan as $t): ?>
                                <option value="<?= $t['aduan_tujuan_id'] ?>" <?= request()->getGet('tujuan') == $t['aduan_tujuan_id'] ? 'selected' : '' ?>>
                                    <?= $t['nama_aduan_tujuan'] ?> (<?= $t['dekripsi'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-aduan_tujuan_id"></div>
                    </div>



                    <!-- Subjek -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Subjek / Judul Aduan <span class="text-red-500">*</span></label>
                        <input type="text" id="judulAduan" name="judul_aduan" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" placeholder="Contoh: Keran air wudhu rusak" required>
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-judul_aduan"></div>
                    </div>

                    <!-- Isi Aduan -->
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Aduan <span class="text-red-500">*</span></label>
                        <textarea id="isiAduan" name="isi_aduan" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition" rows="5" placeholder="Jelaskan detail aduan, saran, atau aspirasi Anda..." required></textarea>
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-isi_aduan"></div>
                    </div>

                    <!-- Upload Lampiran -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Lampiran Foto <span class="text-gray-400 font-normal">(opsional)</span></label>
                        <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center cursor-pointer hover:bg-emerald-50 hover:border-emerald-200 transition group" id="uploadZone">
                            <i class="fas fa-upload text-3xl text-gray-300 mb-3 group-hover:text-emerald-50 transition"></i>
                            <p class="text-sm text-gray-500">Seret file ke sini atau <span class="text-emerald-700 font-bold">klik untuk upload</span></p>
                            <p class="text-xs text-gray-400 mt-1">Maks. 8MB — Format: JPG, PNG</p>
                        </div>
                        <input type="file" name="lampiran_file" id="fileInput" accept="image/jpeg,image/png" class="hidden">
                        <div class="error-msg text-red-500 text-xs mt-1" id="error-lampiran_file"></div>
                        <div id="filePreview" class="mt-4"></div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-6 border-t border-gray-100">
                        <button type="submit" id="submitBtn" class="w-full bg-emerald-700 text-white font-bold py-4 rounded-xl hover:bg-emerald-800 transition shadow-lg shadow-emerald-900/10 flex items-center justify-center gap-3">
                            <i class="fas fa-paper-plane"></i> Kirim Aduan
                        </button>
                        <p class="text-center text-xs text-gray-400 mt-4 uppercase tracking-widest font-bold">Aman & Terpercaya</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra_css') ?>
<link rel="stylesheet" href="<?= base_url('css/aduan.css') ?>">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap');
    .aduan-scope { font-family: 'Inter', sans-serif; }
    .aduan-scope .font-heading { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
<?= $this->endSection() ?>

<?= $this->section('extra_js') ?>
<script>
document.addEventListener('DOMContentLoaded', () => { 
    initFileUpload(); 
});

function toggleAnonim(isAnonim) {
  const nameGroup = document.getElementById('nameGroup');
  if (!nameGroup) return;
  if (isAnonim) {
    nameGroup.style.maxHeight = '0';
    nameGroup.style.opacity = '0';
    nameGroup.style.overflow = 'hidden';
    nameGroup.style.marginBottom = '0';
    nameGroup.querySelector('input')?.removeAttribute('required');
  } else {
    nameGroup.style.maxHeight = '200px';
    nameGroup.style.opacity = '1';
    nameGroup.style.overflow = 'visible';
    nameGroup.style.marginBottom = '1.5rem';
    nameGroup.querySelector('input')?.setAttribute('required', '');
  }
}

function initFileUpload() {
  const zone = document.getElementById('uploadZone');
  const input = document.getElementById('fileInput');
  const preview = document.getElementById('filePreview');
  if (!zone || !input) return;

  zone.addEventListener('click', () => input.click());

  zone.addEventListener('dragover', (e) => {
    e.preventDefault();
    zone.classList.add('bg-emerald-50', 'border-emerald-500');
  });
  zone.addEventListener('dragleave', () => zone.classList.remove('bg-emerald-50', 'border-emerald-500'));
  zone.addEventListener('drop', (e) => {
    e.preventDefault();
    zone.classList.remove('bg-emerald-50', 'border-emerald-500');
    if (e.dataTransfer.files.length) {
      input.files = e.dataTransfer.files;
      showFilePreview(e.dataTransfer.files[0]);
    }
  });

  input.addEventListener('change', () => {
    if (input.files.length) showFilePreview(input.files[0]);
  });

  function showFilePreview(file) {
    if (!preview) return;
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = (e) => {
        preview.innerHTML = `
          <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
            <img src="${e.target.result}" class="w-16 h-16 object-cover rounded-lg border border-white shadow-sm" />
            <div class="flex-1 min-width-0">
              <p class="text-sm font-bold text-gray-800 truncate">${file.name}</p>
              <p class="text-xs text-gray-500">${(file.size / 1024).toFixed(1)} KB</p>
            </div>
            <button type="button" onclick="clearUpload()" class="text-red-500 hover:text-red-700 p-2"><i class="fas fa-trash-alt"></i></button>
          </div>
        `;
      };
      reader.readAsDataURL(file);
    } else {
      alert('Hanya file gambar (JPG/PNG) yang diperbolehkan.');
      input.value = '';
    }
  }
}

function clearUpload() {
  const input = document.getElementById('fileInput');
  const preview = document.getElementById('filePreview');
  if (input) input.value = '';
  if (preview) preview.innerHTML = '';
}

// Data Mapping untuk WhatsApp
const tujuanMapping = {
    <?php foreach ($tujuan as $t): ?>
    "<?= $t['aduan_tujuan_id'] ?>": {
        "nama": "<?= esc($t['nama_aduan_tujuan']) ?>",
        "no_hp": "<?= esc($t['no_hp']) ?>"
    },
    <?php endforeach; ?>
};

document.getElementById('formAduan').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const form = e.target;
    const btn = document.getElementById('submitBtn');
    const originalContent = btn.innerHTML;
    
    // Reset error messages
    document.querySelectorAll('.error-msg').forEach(el => el.innerText = '');

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';

    const formData = new FormData(form);

    try {
        const response = await fetch('<?= base_url('aduan/simpan') ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        if (result.status === 'success') {
            // Ambil data untuk WhatsApp
            const nama = document.getElementById('namaPengirim').value || 'Anonim';
            const kontak = document.getElementById('kontakPengirim').value;
            const tujuanId = document.getElementById('aduanTujuan').value;
            const judul = document.getElementById('judulAduan').value;
            const isi = document.getElementById('isiAduan').value;
            
            const infoTujuan = tujuanMapping[tujuanId];
            const waNumber = infoTujuan.no_hp.replace(/[^0-9]/g, ''); // Bersihkan karakter non-angka
            
            // Format Pesan
            let message = "*PENGADUAN BARU*\n\n";
            message += `Nama: ${nama}\n`;
            message += `Judul Aduan: ${judul}\n\n`;
            message += `Isi Aduan:\n${isi}`;

            const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
            
            // Buka WhatsApp di tab baru
            window.open(waUrl, '_blank');

            // Redirect ke halaman berhasil
            window.location.href = result.redirect;
        } else if (result.status === 'error' && result.errors) {
            // Tampilkan error validasi
            for (const field in result.errors) {
                const errorEl = document.getElementById(`error-${field}`);
                if (errorEl) {
                    errorEl.innerText = result.errors[field];
                }
            }
            btn.disabled = false;
            btn.innerHTML = originalContent;
            
            // Scroll ke error pertama
            const firstError = document.querySelector('.error-msg:not(:empty)');
            if (firstError) {
                firstError.parentElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } else {
            alert(result.message || 'Terjadi kesalahan saat mengirim aduan.');
            btn.disabled = false;
            btn.innerHTML = originalContent;
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Gagal terhubung ke server. Silakan coba lagi.');
        btn.disabled = false;
        btn.innerHTML = originalContent;
    }
});
</script>
<?= $this->endSection() ?>

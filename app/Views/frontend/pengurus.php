<?= $this->extend('frontend/layout/template') ?>

<?= $this->section('extra_css') ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    <style>
        :root {
            --mosque-green: #064e3b;
            --mosque-gold: #fbbf24;
        }
        .text-mosque-green { color: var(--mosque-green); }
        .bg-mosque-green { background-color: var(--mosque-green); }
        .text-mosque-gold { color: var(--mosque-gold); }
        
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .font-h3-dept { font-family: 'Manrope', sans-serif; font-weight: 600; font-size: 18px; }
        .font-label-caps { font-family: 'Inter', sans-serif; font-weight: 700; font-size: 12px; letter-spacing: 0.05em; }
        .font-body-strong { font-family: 'Inter', sans-serif; font-weight: 600; font-size: 16px; }
        .font-caption { font-family: 'Inter', sans-serif; font-weight: 400; font-size: 13px; }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <header class="relative py-20 flex items-center justify-center bg-mosque-green text-white bg-pattern overflow-hidden">
        <div class="absolute inset-0 bg-black/30 z-0"></div> 
        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-mosque-gold/20 text-mosque-gold text-sm font-semibold tracking-wider mb-6 border border-mosque-gold/50">
                STRUKTUR ORGANISASI
            </span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight drop-shadow-lg">
                Pengurus <span class="text-mosque-gold">Masjid</span>
            </h1>
            <p class="text-lg text-gray-200 max-w-2xl mx-auto">
                <?= $profil['nama_masjid'] ?? 'Nailul Maram' ?>
            </p>
        </div>
    </header>

    <div class="max-w-screen-2xl mx-auto px-6 py-24 overflow-x-hidden md:overflow-x-auto">
        <div class="w-full md:min-w-[1000px] flex flex-col items-center gap-12 relative">
          <!-- Pembina Level -->
          <div class="relative w-full flex justify-center">
            <div
              class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)] transition-all duration-200 hover:scale-[1.02] border-l-[4px] border-amber-600 border-y border-r border-gray-100 w-full max-w-4xl relative z-10 overflow-hidden"
            >
              <div class="flex items-center gap-3 p-4 border-b border-gray-100" style="background-color: #fffbeb;">
                <span class="material-symbols-outlined text-amber-700">admin_panel_settings</span>
                <h4 class="font-bold text-gray-900">Dewan Pembina</h4>
              </div>
              <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-amber-700 font-bold flex-shrink-0">KK</div>
                  <div>
                    <span class="font-semibold text-gray-800">Kepala Kelurahan Lappa</span>
                  </div>
                </div>
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-amber-700 font-bold flex-shrink-0">IK</div>
                  <div>
                    <span class="font-semibold text-gray-800">Imam Kelurahan Lappa</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Penasehat Level -->
          <div class="relative mt-6 w-full flex justify-center">
            <div
              class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)] transition-all duration-200 hover:scale-[1.02] border-l-[4px] border-amber-600 border-y border-r border-gray-100 w-full max-w-4xl relative z-10 overflow-hidden"
            >
              <div class="flex items-center gap-3 p-4 border-b border-gray-100" style="background-color: #fffbeb;">
                <span class="material-symbols-outlined text-amber-700">supervised_user_circle</span>
                <h4 class="font-bold text-gray-900">Dewan Penasehat</h4>
              </div>
              <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach(['H. Amiruddin Akil', 'Muh. Nasran HL.', 'Drs. H. Arifuddin Muin', 'H. Alwi Nammang'] as $name): ?>
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-amber-700 font-bold flex-shrink-0">
                    <?= substr($name, 0, 1) ?>
                  </div>
                  <div>
                    <span class="font-semibold text-gray-800"><?= $name ?></span>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Pengurus Harian Level -->
          <div class="relative mt-6 z-10">
            <div
              class="bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.04)] hover:shadow-[0_10px_30px_rgba(0,0,0,0.08)] transition-all duration-200 hover:scale-[1.02] border-l-[4px] border-emerald-800 border-y border-r border-gray-100 w-full max-w-4xl relative bg-white overflow-hidden"
            >
              <div class="flex items-center gap-3 p-4 border-b border-gray-100" style="background-color: #ecfdf5;">
                <span class="material-symbols-outlined text-emerald-800">groups</span>
                <h4 class="font-bold text-gray-900">Pengurus Harian</h4>
              </div>
              <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                $harian = [
                  ['name' => 'Muzawwir, S.Pd.I, M.Pd', 'role' => 'Ketua'],
                  ['name' => 'H. Safri, B.Sc', 'role' => 'Wakil Ketua'],
                  ['name' => 'Takdir Kahar, S.Pd, M.Pd', 'role' => 'Sekretaris'],
                  ['name' => 'H. Basri Nurdin', 'role' => 'Bendahara'],
                  ['name' => 'Abd. Samad', 'role' => 'Wakil Bendahara'],
                ];
                foreach ($harian as $h): ?>
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-900 flex items-center justify-center font-bold overflow-hidden flex-shrink-0">
                    <img src="https://lh3.googleusercontent.com/a/default-user" class="w-full h-full object-cover" />
                  </div>
                  <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-tight"><?= $h['name'] ?></h3>
                    <span class="text-[10px] text-gray-500 uppercase font-bold"><?= $h['role'] ?></span>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Departments Level Grid -->
          <div class="relative w-full mt-6 pt-6 z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full">
              <?php 
              $bidang = [
                ['title' => 'Bidang Ibadah & Dakwah', 'sub' => 'Sub Bidang Dakwah & Hari Besar Islam', 'name' => 'Abduh Isra Madya', 'icon' => 'mosque'],
                ['title' => 'Bidang Ibadah & Dakwah', 'sub' => 'Sub Imam Masjid Jami Nailul Maram', 'name' => 'Ust. Ishak Amir, S.Pd.I, M.Pd', 'icon' => 'mosque'],
                ['title' => 'Bidang Pembangunan', 'sub' => null, 'name' => 'Djubirusman Madya', 'icon' => 'construction'],
                ['title' => 'Bidang Sarana & Prasarana', 'sub' => null, 'name' => 'Sanusi Madya MRzz', 'icon' => 'inventory_2'],
                ['title' => 'Bidang Humas & IT', 'sub' => null, 'name' => 'Abdul Rahman', 'icon' => 'groups'],
                ['title' => 'Bidang Pengawas LPQ', 'sub' => null, 'name' => 'Nasrullah', 'icon' => 'menu_book'],
                ['title' => 'Bidang Remaja Masjid', 'sub' => null, 'name' => 'Sabri Hidayat', 'icon' => 'diversity_3'],
                ['title' => 'Bidang Perpustakaan', 'sub' => null, 'name' => 'Zakaria Amiruddin Akil', 'icon' => 'local_library'],
                ['title' => 'Bidang Dana', 'sub' => null, 'name' => 'H. Mappaselle', 'icon' => 'volunteer_activism'],
                ['title' => 'Bidang Muslimah', 'sub' => 'Sub Bidang Kajian & Dakwah Muslimah', 'name' => 'Dra. Hj. Haerati', 'icon' => 'face_4'],
                ['title' => 'Bidang Muslimah', 'sub' => 'Sub Bidang Kesehatan, Sosial & Ekonomi Muslimah', 'name' => 'Hj. Hilda Ismail, S.Pd, M.M.', 'icon' => 'face_4'],
                ['title' => 'Bidang Muslimah', 'sub' => 'Sub Bidang Kreativitas & Keterampilan Muslimah', 'name' => 'Hj. Nurlina', 'icon' => 'face_4'],
                ['title' => 'Bidang Keamanan', 'sub' => null, 'name' => 'AKP. Mukhsin Sirajuddin, S.Sos, M.Si', 'icon' => 'security'],
              ];

              foreach ($bidang as $b): ?>
              <div class="bg-white rounded-xl shadow-[0_2px_15px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_25px_rgba(0,0,0,0.08)] transition-all border-l-[4px] border-emerald-600 border-y border-r border-gray-100 overflow-hidden">
                <div class="flex items-center gap-2 p-3 border-b border-gray-50" style="background-color: #f0fdf4;">
                  <span class="material-symbols-outlined text-emerald-700 text-sm flex-shrink-0"><?= $b['icon'] ?></span>
                  <div class="overflow-hidden">
                    <h4 class="text-[12px] font-bold text-emerald-900 uppercase tracking-tight leading-tight truncate"><?= $b['title'] ?></h4>
                    <?php if($b['sub']): ?>
                      <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-tight mt-0.5"><?= $b['sub'] ?></p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="p-4">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex-shrink-0 overflow-hidden">
                      <img src="https://lh3.googleusercontent.com/a/default-user" class="w-full h-full object-cover">
                    </div>
                    <div>
                      <p class="text-[11px] font-bold text-gray-800 leading-tight"><?= $b['name'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
    </div>
<?= $this->endSection() ?>

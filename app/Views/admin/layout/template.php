<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?> | Masjid Jami Nailul Maram</title>
    <link rel="icon" type="image/jpeg" href="<?= base_url('images/logo_masjid.jpeg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-gray-50 text-gray-900">

    <div class="flex h-screen overflow-hidden relative">
        <!-- Sidebar Backdrop (Mobile Only) -->
        <div id="sidebarBackdrop" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity duration-300 opacity-0" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="adminSidebar" class="fixed md:static inset-y-0 left-0 w-64 bg-green-900 text-white flex-shrink-0 flex flex-col z-50 transition-all duration-300 transform -translate-x-full md:translate-x-0">
            <div class="p-6 overflow-y-auto flex-1">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white p-1 rounded-lg shadow-lg overflow-hidden">
                            <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo" class="h-8 w-8 object-contain">
                        </div>
                        <span class="text-xl font-black tracking-tighter uppercase">Admin Panel</span>
                    </div>
                    <button onclick="toggleSidebar()" class="md:hidden text-white/50 hover:text-white transition">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <nav class="space-y-2">
                    <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/dashboard')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-th-large w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <?php if(session()->get('peran') === 'Admin'): ?>
                    <a href="<?= base_url('admin/profil') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/profil')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-id-card w-5"></i>
                        <span>Profil Masjid</span>
                    </a>
                    <?php endif; ?>

                    <a href="<?= base_url('admin/kategori') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/kategori')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-list w-5"></i>
                        <span>Kategori Berita</span>
                    </a>
                    <a href="<?= base_url('admin/artikel') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/artikel')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-newspaper w-5"></i>
                        <span>Berita</span>
                    </a>

                    <?php if(session()->get('peran') !== 'Kontributor'): ?>
                    <a href="<?= base_url('admin/galeri') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/galeri')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-images w-5"></i>
                        <span>Galeri</span>
                    </a>
                    <a href="<?= base_url('admin/media') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/media')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-photo-video w-5"></i>
                        <span>Media Manager</span>
                    </a>
                    <a href="<?= base_url('admin/jadwal') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/jadwal')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-calendar-alt w-5"></i>
                        <span>Jadwal Sholat</span>
                    </a>
                    <a href="<?= base_url('admin/flayer') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/flayer')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-layer-group w-5"></i>
                        <span>Flayer Depan</span>
                    </a>
                    <?php endif; ?>

                    <?php if(session()->get('peran') === 'Admin'): ?>
                    <a href="<?= base_url('admin/penulis') ?>" class="flex items-center space-x-3 p-3 rounded-xl transition <?= (current_url() == base_url('admin/penulis')) ? 'bg-green-700 font-bold' : 'hover:bg-green-800' ?>">
                        <i class="fas fa-users w-5"></i>
                        <span>Manajemen Penulis</span>
                    </a>
                    <?php endif; ?>
                </nav>
            </div>

            <div class="p-6 border-t border-green-800 bg-green-950/30">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 bg-green-700 rounded-full flex items-center justify-center font-bold shadow-inner">
                        <?= substr(session()->get('nama'), 0, 1) ?>
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-[10px] font-black uppercase tracking-widest text-green-500"><?= session()->get('peran') ?></p>
                        <p class="text-sm font-bold truncate"><?= session()->get('nama') ?></p>
                    </div>
                </div>
                <a href="<?= base_url('admin/logout') ?>" class="flex items-center space-x-3 p-3 rounded-xl bg-red-600/10 text-red-400 hover:bg-red-600 hover:text-white transition group">
                    <i class="fas fa-sign-out-alt w-5 group-hover:rotate-12 transition"></i>
                    <span class="font-bold">Keluar</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden w-full">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-4 md:px-8 flex-shrink-0">
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" class="md:hidden w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-100 rounded-xl mr-2 transition">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-sm md:text-lg font-black text-gray-800 uppercase tracking-widest truncate max-w-[200px] md:max-w-none"><?= $title ?? 'Dashboard' ?></h2>
                </div>
                <div class="flex items-center space-x-2 md:space-x-4">
                    <a href="<?= base_url() ?>" target="_blank" class="w-10 h-10 md:w-auto md:px-4 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded-xl flex items-center justify-center transition shadow-sm overflow-hidden">
                        <i class="fas fa-external-link-alt md:mr-2"></i>
                        <span class="hidden md:inline text-xs font-bold uppercase tracking-widest">Lihat Web</span>
                    </a>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-4 md:p-8">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-xl text-xs md:text-sm font-bold flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-3 text-lg"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-xl text-xs md:text-sm font-bold flex items-center shadow-sm">
                        <i class="fas fa-exclamation-circle mr-3 text-lg"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.add('opacity-100');
                }, 10);
                document.body.style.overflow = 'hidden';
            } else {
                // Close
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                setTimeout(() => {
                    backdrop.classList.add('hidden');
                }, 300);
                document.body.style.overflow = 'auto';
            }
        }
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>

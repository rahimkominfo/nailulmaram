<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengelola | Masjid Jami Nailul Maram</title>
    <link rel="icon" type="image/jpeg" href="<?= base_url('images/logo_masjid.jpeg') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-10">
            <div class="bg-white w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl shadow-green-100 border border-gray-100 overflow-hidden">
                <img src="<?= base_url('images/logo_masjid.jpeg') ?>" alt="Logo Masjid" class="h-20 w-20 object-contain">
            </div>
            <h1 class="text-3xl font-black text-gray-800 tracking-tighter uppercase">Panel Pengelola</h1>
            <p class="text-gray-500 font-medium">Masuk untuk mengelola konten masjid</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-xl text-sm font-bold flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login/attempt') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-black mb-2 uppercase tracking-widest" for="login">Username atau Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-medium" id="login" name="login" type="text" placeholder="Masukkan username/email" value="<?= old('login') ?>" required>
                </div>
            </div>
            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-black mb-2 uppercase tracking-widest" for="password">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:bg-white transition duration-300 font-medium" id="password" name="password" type="password" placeholder="••••••••" required>
                </div>
            </div>
            <button class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-4 rounded-2xl shadow-lg shadow-green-200 transition duration-300 uppercase tracking-widest" type="submit">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-10 text-center">
            <a href="<?= base_url() ?>" class="text-sm font-bold text-gray-400 hover:text-green-600 transition uppercase tracking-widest">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>

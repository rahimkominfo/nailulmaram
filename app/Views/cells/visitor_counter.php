<div class="space-y-4">
    <!-- Hari Ini -->
    <div class="flex justify-between items-center bg-green-50/50 p-4 rounded-2xl border border-green-100 group transition-all duration-300 hover:bg-green-50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div>
                <span class="block text-[10px] font-black uppercase tracking-widest text-green-800 opacity-60">Hari Ini</span>
                <span class="block text-sm font-bold text-green-900">Pengunjung</span>
            </div>
        </div>
        <span class="font-mono text-xl font-black text-green-600"><?= number_format($today, 0, ',', '.') ?></span>
    </div>

    <!-- Kemarin -->
    <div class="flex justify-between items-center bg-blue-50/50 p-4 rounded-2xl border border-blue-100 group transition-all duration-300 hover:bg-blue-50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <i class="fas fa-clock"></i>
            </div>
            <div>
                <span class="block text-[10px] font-black uppercase tracking-widest text-blue-800 opacity-60">Kemarin</span>
                <span class="block text-sm font-bold text-blue-900">Pengunjung</span>
            </div>
        </div>
        <span class="font-mono text-xl font-black text-blue-600"><?= number_format($yesterday, 0, ',', '.') ?></span>
    </div>

    <!-- Total -->
    <div class="flex justify-between items-center bg-gray-50/50 p-4 rounded-2xl border border-gray-100 group transition-all duration-300 hover:bg-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gray-200 flex items-center justify-center text-gray-600 group-hover:bg-gray-800 group-hover:text-white transition-all duration-300">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <span class="block text-[10px] font-black uppercase tracking-widest text-gray-800 opacity-60">Total Keseluruhan</span>
                <span class="block text-sm font-bold text-gray-900">Pengunjung</span>
            </div>
        </div>
        <span class="font-mono text-xl font-black text-gray-800"><?= number_format($total, 0, ',', '.') ?></span>
    </div>
</div>

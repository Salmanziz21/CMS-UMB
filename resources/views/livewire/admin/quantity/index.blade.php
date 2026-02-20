<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Data Statistik</h1>
        <p class="text-secondary mt-1">Kelola data numerik yang ditampilkan pada statistik website.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-2xl">
        <div class="bg-white rounded-3xl p-8 border border-border shadow-sm relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="users" class="size-32"></i>
            </div>

            <form wire:submit.prevent="update" class="space-y-8 relative">
                <div class="space-y-4">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Jumlah Mahasiswa Aktif</label>
                    <div class="relative group">
                        <i data-lucide="users-2" class="absolute left-4 top-1/2 -translate-y-1/2 size-6 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <input 
                            type="number" 
                            wire:model.defer="number_students"
                            placeholder="Contoh: 1500" 
                            class="w-full h-16 pl-14 pr-6 rounded-2xl border border-border bg-muted/30 focus:bg-white text-2xl font-black focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all duration-300"
                            required
                            min="0"
                        >
                    </div>
                    <p class="text-xs text-secondary italic">Data ini akan muncul pada counter statistik di halaman beranda.</p>
                </div>
                
                <div class="flex items-center justify-end pt-6 border-t border-border mt-8">
                    <button type="submit" class="w-full h-14 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                        <i data-lucide="save" class="size-5"></i>
                        <span>Simpan Data</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Metric Preview -->
        <div class="mt-8 p-8 rounded-3xl bg-primary/5 border border-primary/10 flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-sm font-bold text-primary/60 uppercase tracking-widest">Saat Ini Terdata</span>
                <span class="text-4xl font-black text-foreground mt-1">{{ number_format($number_students ?: 0, 0, ',', '.') }}</span>
                <span class="text-sm text-secondary font-medium">Mahasiswa Aktif</span>
            </div>
            <div class="size-16 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary">
                <i data-lucide="trending-up" class="size-8"></i>
            </div>
        </div>
    </div>
</div>


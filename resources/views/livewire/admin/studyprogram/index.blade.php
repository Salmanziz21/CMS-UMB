<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Data Program Studi</h1>
        <p class="text-secondary mt-1">Kelola informasi mendasar dan profil akademik program studi.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-5xl">
        <form wire:submit.prevent="update" class="space-y-8">
            <!-- Informasi Dasar -->
            <div class="bg-white rounded-3xl p-8 border border-border shadow-sm">
                <div class="flex items-center gap-3 mb-8 border-b border-border pb-4">
                    <div class="size-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                        <i data-lucide="info" class="size-5"></i>
                    </div>
                    <h2 class="text-xl font-bold text-foreground">Informasi Dasar</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Nama Program Studi</label>
                        <input type="text" wire:model.defer="name" class="w-full h-14 px-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Akreditasi</label>
                        <select wire:model.defer="accreditation" class="w-full h-14 px-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 appearance-none cursor-pointer" required>
                            <option value="">Pilih Akreditasi</option>
                            <option value="Unggul">Unggul</option>
                            <option value="Baik Sekali">Baik Sekali</option>
                            <option value="Baik">Baik</option>
                        </select>
                    </div>

                    <div class="md:col-span-3 space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Deskripsi Singkat</label>
                        <textarea wire:model.defer="description" rows="3" class="w-full px-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi -->
            <div class="bg-white rounded-3xl p-8 border border-border shadow-sm">
                <div class="flex items-center gap-3 mb-8 border-b border-border pb-4">
                    <div class="size-10 rounded-xl bg-warning/10 flex items-center justify-center text-warning">
                        <i data-lucide="target" class="size-5"></i>
                    </div>
                    <h2 class="text-xl font-bold text-foreground">Visi & Misi</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Visi</label>
                        <textarea wire:model.defer="vision" rows="6" class="w-full px-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none" required></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Misi</label>
                        <textarea wire:model.defer="mission" rows="6" class="w-full px-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Profil & Sejarah -->
            <div class="bg-white rounded-3xl p-8 border border-border shadow-sm">
                <div class="flex items-center gap-3 mb-8 border-b border-border pb-4">
                    <div class="size-10 rounded-xl bg-success/10 flex items-center justify-center text-success">
                        <i data-lucide="book-open" class="size-5"></i>
                    </div>
                    <h2 class="text-xl font-bold text-foreground">Profil & Sejarah</h2>
                </div>

                <div class="space-y-8">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Profil Program Studi</label>
                        <textarea wire:model.defer="profilestudy" rows="4" class="w-full px-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none" required></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Sejarah</label>
                        <textarea wire:model.defer="history" rows="6" class="w-full px-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none" required></textarea>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end py-8 border-t border-border">
                <button type="submit" class="w-full md:w-auto px-12 h-16 bg-primary hover:bg-primary-hover text-white rounded-full font-black shadow-xl shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer text-lg">
                    <i data-lucide="save" class="size-6"></i>
                    <span>Simpan Seluruh Data</span>
                </button>
            </div>
        </form>
    </div>
</div>


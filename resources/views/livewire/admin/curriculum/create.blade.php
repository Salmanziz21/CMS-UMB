<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Tambah Kurikulum Baru</h1>
        <p class="text-secondary mt-1">Susun struktur mata kuliah dan beban SKS untuk setiap semester.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif
    
    <div class="max-w-4xl">
        <x-form wire:submit.prevent="save" class="relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="book-open" class="size-32"></i>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                <div class="space-y-2">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Semester</label>
                    <div class="relative group">
                        <i data-lucide="layers" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <input 
                            type="text" 
                            wire:model.defer="semester"
                            placeholder="Contoh: Semester 1" 
                            class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                            required
                        >
                    </div>
                    @error('semester') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Beban SKS</label>
                    <div class="relative group">
                        <i data-lucide="file-text" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <input 
                            type="number" 
                            wire:model.defer="number_sks"
                            placeholder="Contoh: 3" 
                            class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                            required
                        >
                    </div>
                    @error('number_sks') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-full space-y-2">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Nama Mata Kuliah</label>
                    <div class="relative group">
                        <i data-lucide="book" class="absolute left-4 top-5 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <textarea 
                            wire:model.defer="subject"
                            placeholder="Masukkan nama mata kuliah..." 
                            rows="4"
                            class="w-full pl-12 pr-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none"
                            required
                        ></textarea>
                    </div>
                    @error('subject') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-10 pt-8 border-t border-border">
                <a href="{{ route('admin.curriculum.index') }}" wire:navigate class="h-14 px-8 rounded-full border border-border hover:bg-muted text-secondary font-bold text-sm transition-all duration-300 flex items-center justify-center gap-2">
                    <i data-lucide="x" class="size-4"></i>
                    Batal
                </a>
                <button type="submit" class="h-14 px-10 bg-primary hover:bg-primary-hover text-white rounded-full font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                    <i data-lucide="save" class="size-5"></i>
                    <span>Simpan Kurikulum</span>
                </button>
            </div>
        </x-form>
    </div>
</div>
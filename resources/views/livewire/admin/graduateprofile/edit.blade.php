<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Edit Profil Lulusan</h1>
        <p class="text-secondary mt-1">Perbarui standar kualitas dan kompetensi lulusan program studi.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif
    
    <div class="max-w-4xl">
        <x-form wire:submit.prevent="update" class="relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="edit-3" class="size-32"></i>
            </div>

            <div class="space-y-6 relative">
                <div class="space-y-2">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Profil Khusus Lulusan</label>
                    <div class="relative group">
                        <i data-lucide="award" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <input 
                            type="text" 
                            wire:model.defer="title"
                            placeholder="Contoh: Software Developer Profesional" 
                            class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                            required
                        >
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Deskripsi Kompetensi</label>
                    <div class="relative group">
                        <i data-lucide="align-left" class="absolute left-4 top-5 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                        <textarea 
                            wire:model.defer="description"
                            placeholder="Jelaskan peran dan kemampuan yang diharapkan dari profil ini..." 
                            rows="6"
                            class="w-full pl-12 pr-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none"
                            required
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-10 pt-8 border-t border-border">
                <a href="{{ route('admin.graduateprofile.index') }}" wire:navigate class="h-14 px-8 rounded-full border border-border hover:bg-muted text-secondary font-bold text-sm transition-all duration-300 flex items-center justify-center gap-2">
                    <i data-lucide="x" class="size-4"></i>
                    Batal
                </a>
                <button type="submit" class="h-14 px-10 bg-primary hover:bg-primary-hover text-white rounded-full font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                    <i data-lucide="save" class="size-5"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </x-form>
    </div>
</div>
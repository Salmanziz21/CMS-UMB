<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Tambah Karya & Prestasi</h1>
        <p class="text-secondary mt-1">Abadikan pencapaian gemilang mahasiswa dan dosen di sini.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif
    
    <div class="max-w-5xl">
        <x-form wire:submit.prevent="save" class="relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="award" class="size-32"></i>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative">
                <!-- Main Info Section -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Judul Prestasi / Karya</label>
                        <div class="relative group">
                            <i data-lucide="award" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="text" 
                                wire:model.defer="title"
                                placeholder="Masukkan judul..." 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                        @error('title') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Deskripsi Lengkap</label>
                        <div class="relative group">
                            <i data-lucide="align-left" class="absolute left-4 top-5 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <textarea 
                                wire:model.defer="description"
                                placeholder="Jelaskan detail pencapaian ini..." 
                                rows="8"
                                class="w-full pl-12 pr-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none"
                                required
                            ></textarea>
                        </div>
                        @error('description') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Sidebar Info Section -->
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Kategori</label>
                        <div class="relative group">
                            <i data-lucide="tag" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <select 
                                wire:model.defer="category"
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 cursor-pointer appearance-none"
                                required
                            >
                                <option value="">Pilih Kategori</option>
                                <option value="Prestasi">Prestasi</option>
                                <option value="Karya">Karya</option>
                            </select>
                        </div>
                        @error('category') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Tanggal</label>
                        <div class="relative group">
                            <i data-lucide="calendar" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="date" 
                                wire:model.defer="date"
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 cursor-pointer"
                                required
                            >
                        </div>
                        @error('date') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Thumbnail / Gambar</label>
                        <div class="relative group">
                            <label class="flex flex-col items-center justify-center w-full h-40 rounded-3xl border-2 border-dashed border-border bg-muted/20 hover:bg-muted/30 hover:border-primary/50 transition-all duration-300 cursor-pointer overflow-hidden relative">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="absolute inset-0 w-full h-full object-cover opacity-20" />
                                @endif
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10">
                                    <i data-lucide="image" class="size-10 text-secondary group-hover:text-primary mb-2 transition-colors"></i>
                                    <p class="text-[10px] text-foreground font-black uppercase tracking-widest">Pilih Gambar</p>
                                </div>
                                <input wire:model="image" type="file" class="hidden" accept="image/*" />
                            </label>
                            @error('image') <p class="text-xs text-error font-bold mt-1 ml-1 text-center">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Photo Preview & Loading -->
                    <div class="relative">
                        <div wire:loading wire:target="image" class="p-4 rounded-2xl bg-primary/5 border border-primary/10 flex items-center justify-center gap-3">
                            <div class="size-4 border-2 border-primary border-t-transparent rounded-full animate-spin"></div>
                            <span class="text-xs font-bold text-primary">Mengunggah...</span>
                        </div>
                        
                        @if ($image && !is_string($image))
                        <div wire:loading.remove wire:target="image" class="p-4 rounded-2xl bg-muted/30 border border-border flex items-center gap-4">
                            <div class="size-16 rounded-xl bg-white border border-border overflow-hidden shadow-sm">
                                <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-foreground truncate">{{ $image->getClientOriginalName() }}</p>
                                <p class="text-[10px] text-secondary">Siap untuk digunakan</p>
                            </div>
                            <button type="button" wire:click="$set('image', null)" class="size-8 rounded-lg hover:bg-error/10 text-error transition-colors flex items-center justify-center">
                                <i data-lucide="trash-2" class="size-4"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-10 pt-8 border-t border-border">
                <a href="{{ route('admin.achievement.index') }}" wire:navigate class="h-14 px-8 rounded-full border border-border hover:bg-muted text-secondary font-bold text-sm transition-all duration-300 flex items-center justify-center gap-2">
                    <i data-lucide="x" class="size-4"></i>
                    Batal
                </a>
                <button type="submit" class="h-14 px-10 bg-primary hover:bg-primary-hover text-white rounded-full font-black shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                    <i data-lucide="save" class="size-5"></i>
                    <span>Simpan Prestasi</span>
                </button>
            </div>
        </x-form>
    </div>
</div>
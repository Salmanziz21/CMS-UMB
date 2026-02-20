<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Edit Data Kegiatan</h1>
        <p class="text-secondary mt-1">Perbarui informasi kegiatan atau berita yang sudah dipublikasikan.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif
    
    <div class="max-w-5xl">
        <x-form wire:submit.prevent="update" class="relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="edit-3" class="size-32"></i>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative">
                <!-- Main Info Section -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Judul Kegiatan</label>
                        <div class="relative group">
                            <i data-lucide="type" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="text" 
                                wire:model.defer="title"
                                placeholder="Masukkan judul kegiatan..." 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Deskripsi & Detail</label>
                        <div class="relative group">
                            <i data-lucide="align-left" class="absolute left-4 top-5 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <textarea 
                                wire:model.defer="description"
                                placeholder="Jelaskan detail kegiatan di sini..." 
                                rows="8"
                                class="w-full pl-12 pr-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none"
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info Section -->
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Tanggal Pelaksanaan</label>
                        <div class="relative group">
                            <i data-lucide="calendar" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="date" 
                                wire:model.defer="date"
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 cursor-pointer"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Ganti Dokumentasi (Opsional)</label>
                        <div class="relative group">
                            <label class="flex flex-col items-center justify-center w-full h-40 rounded-3xl border-2 border-dashed border-border bg-muted/20 hover:bg-muted/30 hover:border-primary/50 transition-all duration-300 cursor-pointer overflow-hidden relative">
                                @if ($newDocumentation)
                                    <img src="{{ $newDocumentation->temporaryUrl() }}" class="absolute inset-0 w-full h-full object-cover opacity-20" />
                                @elseif($documentation)
                                    <img src="{{ asset('storage/' . $documentation) }}" class="absolute inset-0 w-full h-full object-cover opacity-10" />
                                @endif
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 relative z-10">
                                    <i data-lucide="upload-cloud" class="size-10 text-secondary group-hover:text-primary mb-2 transition-colors"></i>
                                    <p class="text-[10px] text-foreground font-black uppercase tracking-widest">Pilih Gambar Baru</p>
                                </div>
                                <input wire:model.live="newDocumentation" type="file" class="hidden" accept="image/*" />
                            </label>
                            @error('newDocumentation')
                                <p class="text-xs text-error font-bold mt-2 ml-1 flex items-center gap-1.5">
                                    <i data-lucide="alert-circle" class="size-3"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Photo Preview Section -->
                    <div class="p-4 rounded-2xl bg-muted/30 border border-border flex items-center gap-4 relative">
                        <span class="absolute -top-3 left-4 px-2 bg-white text-[10px] font-black uppercase tracking-widest text-secondary border border-border rounded-full">Preview</span>
                        
                        <div class="size-20 rounded-xl bg-white border border-border overflow-hidden flex items-center justify-center shadow-sm">
                            @if ($newDocumentation)
                                <img src="{{ $newDocumentation->temporaryUrl() }}" alt="Preview baru" class="w-full h-full object-cover" />
                            @elseif ($documentation)
                                <img src="{{ asset('storage/' . $documentation) }}" alt="Dokumentasi saat ini" class="w-full h-full object-cover" />
                            @else
                                <i data-lucide="image" class="size-10 text-secondary/30"></i>
                            @endif
                        </div>
                        
                        <div class="flex-1">
                            <div wire:loading wire:target="newDocumentation" class="flex items-center gap-2 text-xs font-bold text-primary">
                                <div class="size-3 border-2 border-primary border-t-transparent rounded-full animate-spin"></div>
                                <span>Mengunggah...</span>
                            </div>
                            <div wire:loading.remove wire:target="newDocumentation">
                                @if($newDocumentation)
                                    <p class="text-xs font-bold text-foreground">Gambar Baru</p>
                                    <p class="text-[10px] text-primary">Akan menggantikan yang lama</p>
                                @elseif($documentation)
                                    <p class="text-xs font-bold text-foreground">Dokumentasi Aktif</p>
                                    <p class="text-[10px] text-secondary">Unggah baru untuk mengganti</p>
                                @else
                                    <p class="text-[10px] text-secondary italic">Belum ada media.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-10 pt-8 border-t border-border">
                <a href="{{ route('admin.event.index') }}" wire:navigate class="h-14 px-8 rounded-full border border-border hover:bg-muted text-secondary font-bold text-sm transition-all duration-300 flex items-center justify-center gap-2">
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
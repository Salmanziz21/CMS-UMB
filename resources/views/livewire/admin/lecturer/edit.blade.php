<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Edit Data Dosen</h1>
        <p class="text-secondary mt-1">Perbarui informasi dosen pada formulir di bawah ini.</p>
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
                <i data-lucide="user-cog" class="size-32"></i>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
                <!-- Inputs Section -->
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Nama Lengkap</label>
                        <div class="relative group">
                            <i data-lucide="user" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="text" 
                                wire:model.defer="name"
                                placeholder="Contoh: Dr. John Doe, M.Kom." 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Bidang Keahlian</label>
                        <div class="relative group">
                            <i data-lucide="briefcase" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="text" 
                                wire:model.defer="major"
                                placeholder="Contoh: Artificial Intelligence" 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- Photo Section -->
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Ganti Foto (Opsional)</label>
                        <div class="relative group">
                            <label class="flex flex-col items-center justify-center w-full h-32 rounded-2xl border-2 border-dashed border-border bg-muted/20 hover:bg-muted/30 hover:border-primary/50 transition-all duration-300 cursor-pointer overflow-hidden">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i data-lucide="upload" class="size-8 text-secondary group-hover:text-primary mb-2 transition-colors"></i>
                                    <p class="text-xs text-foreground font-bold">Pilih Foto Baru</p>
                                </div>
                                <input wire:model.live="newPhoto" type="file" class="hidden" accept="image/*" />
                            </label>
                            @error('newPhoto')
                                <p class="text-xs text-error font-bold mt-2 ml-1 flex items-center gap-1.5">
                                    <i data-lucide="alert-circle" class="size-3"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Photo Preview -->
                    <div class="p-4 rounded-2xl bg-muted/30 border border-border flex items-center gap-4 relative">
                        <span class="absolute -top-3 left-4 px-2 bg-white text-[10px] font-black uppercase tracking-widest text-secondary border border-border rounded-full">Preview Foto</span>
                        
                        <div class="size-20 rounded-xl bg-white border border-border overflow-hidden flex items-center justify-center">
                            @if ($newPhoto)
                                <img src="{{ $newPhoto->temporaryUrl() }}" alt="Preview baru" class="w-full h-full object-cover" />
                            @elseif ($photo && $photoExists)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Foto saat ini" class="w-full h-full object-cover" />
                            @else
                                <i data-lucide="user-circle" class="size-10 text-secondary/30"></i>
                            @endif
                        </div>
                        
                        <div class="flex-1">
                            <div wire:loading wire:target="newPhoto" class="flex items-center gap-2 text-xs font-bold text-primary">
                                <div class="size-3 border-2 border-primary border-t-transparent rounded-full animate-spin"></div>
                                <span>Mengunggah...</span>
                            </div>
                            <div wire:loading.remove wire:target="newPhoto">
                                @if($newPhoto)
                                    <p class="text-xs font-bold text-foreground truncate max-w-[150px]">{{ $newPhoto->getClientOriginalName() }}</p>
                                    <p class="text-[10px] text-primary">Foto baru akan disimpan</p>
                                @elseif($photo)
                                    <p class="text-xs font-bold text-foreground">Foto Saat Ini</p>
                                    <p class="text-[10px] text-secondary">Unggah baru untuk mengganti</p>
                                @else
                                    <p class="text-[10px] text-secondary italic">Belum ada foto.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 mt-10 pt-8 border-t border-border">
                <a href="{{ route('admin.lecturer.index') }}" wire:navigate class="h-14 px-8 rounded-full border border-border hover:bg-muted text-secondary font-bold text-sm transition-all duration-300 flex items-center justify-center gap-2">
                    <i data-lucide="x" class="size-4"></i>
                    Batal
                </a>
                <button type="submit" class="h-14 px-10 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                    <i data-lucide="save" class="size-5"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </x-form>
    </div>
</div>
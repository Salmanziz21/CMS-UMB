<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Tampilan Visual</h1>
        <p class="text-secondary mt-1">Kelola identitas visual dan branding utama website Anda.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Logo Section -->
            <div class="bg-white rounded-3xl p-8 border border-border shadow-sm flex flex-col h-full">
                <div class="flex items-center gap-3 mb-8 border-b border-border pb-4">
                    <div class="size-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                        <i data-lucide="image" class="size-5"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-foreground leading-tight">Logo Website</h2>
                        <p class="text-xs text-secondary mt-0.5">Format: PNG atau SVG disarankan</p>
                    </div>
                </div>

                <div class="flex-1 space-y-8">
                    <!-- Upload Box -->
                    <div class="relative group">
                        <label class="flex flex-col items-center justify-center w-full h-48 rounded-2xl border-2 border-dashed border-border bg-muted/20 group-hover:bg-muted/30 group-hover:border-primary/50 transition-all duration-300 cursor-pointer overflow-hidden">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i data-lucide="upload-cloud" class="size-10 text-secondary group-hover:text-primary mb-3 transition-colors"></i>
                                <p class="mb-1 text-sm text-foreground font-bold">Klik untuk unggah logo</p>
                                <p class="text-xs text-secondary">Maksimal 2 MB</p>
                            </div>
                            <input wire:model.live="image_logo" type="file" class="hidden" accept="image/*" />
                        </label>
                        @error('image_logo')
                            <p class="text-xs text-error font-bold mt-2 ml-1 flex items-center gap-1.5">
                                <i data-lucide="alert-circle" class="size-3"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Preview Section -->
                    <div class="p-6 rounded-2xl bg-muted/30 border border-border flex items-center justify-center relative">
                        <span class="absolute top-4 left-4 text-[10px] font-black uppercase tracking-widest text-secondary">Preview Saat Ini</span>
                        
                        <div class="flex items-center justify-center min-h-[120px]">
                            @if ($image_logo && is_object($image_logo) && method_exists($image_logo, 'temporaryUrl'))
                                {{-- New file staged for upload --}}
                                <img src="{{ $image_logo->temporaryUrl() }}" alt="Preview logo baru" class="max-h-24 w-auto object-contain filter drop-shadow-md" />
                            @elseif ($userinterface && $userinterface->image_logo && $logoExists)
                                {{-- Existing saved logo --}}
                                <img src="{{ asset('storage/' . $userinterface->image_logo) }}" alt="Logo saat ini" class="max-h-24 w-auto object-contain filter drop-shadow-md" />
                            @elseif ($userinterface && $userinterface->image_logo)
                                {{-- Path exists in DB but file not found via Storage check — try rendering anyway --}}
                                <img src="{{ asset('storage/' . $userinterface->image_logo) }}" alt="Logo saat ini" class="max-h-24 w-auto object-contain filter drop-shadow-md" />
                            @else
                                <div class="flex flex-col items-center text-secondary opacity-40">
                                    <i data-lucide="image-off" class="size-12 mb-2"></i>
                                    <p class="text-xs font-bold">Belum ada logo</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Background Section -->
            <div class="bg-white rounded-3xl p-8 border border-border shadow-sm flex flex-col h-full">
                <div class="flex items-center gap-3 mb-8 border-b border-border pb-4">
                    <div class="size-10 rounded-xl bg-warning/10 flex items-center justify-center text-warning">
                        <i data-lucide="monitor" class="size-5"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-foreground leading-tight">Hero Background</h2>
                        <p class="text-xs text-secondary mt-0.5">Ukuran ideal: 1920 × 1080 px</p>
                    </div>
                </div>

                <div class="flex-1 space-y-8">
                    <!-- Upload Box -->
                    <div class="relative group">
                        <label class="flex flex-col items-center justify-center w-full h-48 rounded-2xl border-2 border-dashed border-border bg-muted/20 group-hover:bg-muted/30 group-hover:border-primary/50 transition-all duration-300 cursor-pointer overflow-hidden">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                <i data-lucide="image-plus" class="size-10 text-secondary group-hover:text-warning mb-3 transition-colors"></i>
                                <p class="mb-1 text-sm text-foreground font-bold">Pilih gambar latar belakang</p>
                                <p class="text-[10px] text-secondary">JPG, PNG, WebP (Maks 10 MB)</p>
                            </div>
                            <input wire:model.live="image_background" type="file" class="hidden" accept="image/*" />
                        </label>
                        @error('image_background')
                            <p class="text-xs text-error font-bold mt-2 ml-1 flex items-center gap-1.5">
                                <i data-lucide="alert-circle" class="size-3"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Preview Section -->
                    <div class="rounded-2xl border border-border overflow-hidden relative group">
                        <span class="absolute top-4 left-4 z-10 text-[10px] font-black uppercase tracking-widest text-white drop-shadow-lg">Preview Visual</span>
                        
                        <div class="aspect-video w-full bg-muted flex items-center justify-center overflow-hidden">
                            @if ($image_background && is_object($image_background) && method_exists($image_background, 'temporaryUrl'))
                                {{-- New file staged for upload --}}
                                <img src="{{ $image_background->temporaryUrl() }}" alt="Preview baru" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                            @elseif ($userinterface && $userinterface->image_background)
                                {{-- Existing saved background --}}
                                <img src="{{ asset('storage/' . $userinterface->image_background) }}" alt="Background saat ini" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                            @else
                                <div class="flex flex-col items-center text-secondary opacity-40">
                                    <i data-lucide="panorama" class="size-16 mb-2"></i>
                                    <p class="text-xs font-bold">Belum ada background</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-end py-10 border-t border-border mt-8">
            <button type="submit" class="w-full md:w-auto px-12 h-16 bg-primary hover:bg-primary-hover text-white rounded-full font-black shadow-xl shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer text-lg">
                <i data-lucide="save" class="size-6"></i>
                <span>Terapkan Visual Baru</span>
            </button>
        </div>
    </form>
</div>


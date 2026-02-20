<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Media Sosial</h1>
        <p class="text-secondary mt-1">Kelola tautan media sosial resmi program studi.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Instagram -->
            <div class="bg-white rounded-3xl p-6 border border-border hover:border-pink-500/30 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute -top-6 -right-6 size-24 bg-pink-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] flex items-center justify-center text-white shadow-lg">
                        <i data-lucide="instagram" class="size-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-foreground">Instagram</h3>
                </div>
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">Username / Nama</label>
                        <input type="text" wire:model.defer="instagram_name" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition-all duration-300" required>
                        @error('instagram_name') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">URL Profil</label>
                        <input type="url" wire:model.defer="instagram_url" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-pink-500 focus:border-transparent outline-none transition-all duration-300" placeholder="https://instagram.com/..." required>
                        @error('instagram_url') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Facebook -->
            <div class="bg-white rounded-3xl p-6 border border-border hover:border-blue-600/30 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute -top-6 -right-6 size-24 bg-blue-600/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-[#1877F2] flex items-center justify-center text-white shadow-lg">
                        <i data-lucide="facebook" class="size-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-foreground">Facebook</h3>
                </div>
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">Nama Halaman</label>
                        <input type="text" wire:model.defer="facebook_name" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all duration-300" required>
                        @error('facebook_name') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">URL Halaman</label>
                        <input type="url" wire:model.defer="facebook_url" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition-all duration-300" placeholder="https://facebook.com/..." required>
                        @error('facebook_url') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- X (Twitter) -->
            <div class="bg-white rounded-3xl p-6 border border-border hover:border-black/30 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute -top-6 -right-6 size-24 bg-black/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-black flex items-center justify-center text-white shadow-lg">
                        <i data-lucide="twitter" class="size-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-foreground">X (Twitter)</h3>
                </div>
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">Username / Nama</label>
                        <input type="text" wire:model.defer="twitter_name" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-black focus:border-transparent outline-none transition-all duration-300" required>
                        @error('twitter_name') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">URL Profil</label>
                        <input type="url" wire:model.defer="twitter_url" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-black focus:border-transparent outline-none transition-all duration-300" placeholder="https://x.com/..." required>
                        @error('twitter_url') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- YouTube -->
            <div class="bg-white rounded-3xl p-6 border border-border hover:border-red-600/30 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute -top-6 -right-6 size-24 bg-red-600/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-[#FF0000] flex items-center justify-center text-white shadow-lg">
                        <i data-lucide="youtube" class="size-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-foreground">YouTube</h3>
                </div>
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">Nama Channel</label>
                        <input type="text" wire:model.defer="youtube_name" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all duration-300" required>
                        @error('youtube_name') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">URL Channel</label>
                        <input type="url" wire:model.defer="youtube_url" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-red-600 focus:border-transparent outline-none transition-all duration-300" placeholder="https://youtube.com/..." required>
                        @error('youtube_url') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- WhatsApp -->
            <div class="bg-white rounded-3xl p-6 border border-border hover:border-green-500/30 transition-all duration-300 relative group overflow-hidden">
                <div class="absolute -top-6 -right-6 size-24 bg-green-500/5 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="size-12 rounded-2xl bg-[#25D366] flex items-center justify-center text-white shadow-lg">
                        <i data-lucide="phone" class="size-6"></i>
                    </div>
                    <h3 class="font-bold text-lg text-foreground">WhatsApp</h3>
                </div>
                <div class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">Nama / Label</label>
                        <input type="text" wire:model.defer="whatsapp_name" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all duration-300" required>
                        @error('whatsapp_name') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-black uppercase tracking-widest text-secondary ml-1">URL / Link WA</label>
                        <input type="url" wire:model.defer="whatsapp_url" class="w-full h-11 px-4 rounded-xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none transition-all duration-300" placeholder="https://wa.me/..." required>
                        @error('whatsapp_url') <p class="text-xs text-error font-bold mt-1 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
        </div>
        
        <div class="flex items-center justify-end py-8 border-t border-border mt-12">
            <button type="submit" class="w-full md:w-auto px-10 h-14 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                <i data-lucide="save" class="size-5"></i>
                <span>Simpan Perubahan</span>
            </button>
        </div>
    </form>
</div>
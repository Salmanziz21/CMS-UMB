<div>
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-foreground">Informasi Kontak</h1>
        <p class="text-secondary mt-1">Kelola data kontak yang akan ditampilkan pada website publik.</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-4xl">
        <div class="bg-white rounded-3xl p-8 border border-border shadow-sm relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
                <i data-lucide="phone-call" class="size-32"></i>
            </div>

            <form wire:submit.prevent="update" class="space-y-8 relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Email Resmi</label>
                        <div class="relative group">
                            <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="email" 
                                wire:model.defer="email"
                                placeholder="nama@univ.ac.id" 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Nomor Telepon</label>
                        <div class="relative group">
                            <i data-lucide="phone" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <input 
                                type="text" 
                                wire:model.defer="phone"
                                placeholder="+62 812 XXXX XXXX" 
                                class="w-full h-14 pl-12 pr-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                                required
                            >
                        </div>
                    </div>

                    <div class="md:col-span-2 space-y-2">
                        <label class="text-sm font-black uppercase tracking-widest text-secondary ml-1">Alamat Lengkap</label>
                        <div class="relative group">
                            <i data-lucide="map-pin" class="absolute left-4 top-5 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                            <textarea 
                                wire:model.defer="address"
                                placeholder="Masukkan alamat lengkap instansi..." 
                                rows="4"
                                class="w-full pl-12 pr-4 py-4 rounded-2xl border border-border bg-muted/30 focus:bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 resize-none"
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-end pt-4 border-t border-border">
                    <button type="submit" class="h-14 px-10 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-3 transition-all duration-300 cursor-pointer">
                        <i data-lucide="save" class="size-5"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Card -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="p-6 rounded-3xl bg-primary/5 border border-primary/10 flex flex-col items-center text-center">
                <div class="size-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-primary mb-4">
                    <i data-lucide="mail" class="size-6"></i>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-primary/60 mb-1">Email</p>
                <p class="text-sm font-bold text-foreground break-all">{{ $email ?: '-' }}</p>
            </div>
            
            <div class="p-6 rounded-3xl bg-warning/5 border border-warning/10 flex flex-col items-center text-center">
                <div class="size-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-warning mb-4">
                    <i data-lucide="phone" class="size-6"></i>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-warning/60 mb-1">Telepon</p>
                <p class="text-sm font-bold text-foreground">{{ $phone ?: '-' }}</p>
            </div>

            <div class="p-6 rounded-3xl bg-success/5 border border-success/10 flex flex-col items-center text-center">
                <div class="size-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-success mb-4">
                    <i data-lucide="map-pin" class="size-6"></i>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-success/60 mb-1">Alamat</p>
                <p class="text-sm font-bold text-foreground line-clamp-2">{{ $address ?: '-' }}</p>
            </div>
        </div>
    </div>
</div>


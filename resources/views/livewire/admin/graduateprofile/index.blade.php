<div x-data="{ showDeleteModal: false, deleteId: null }">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="flex items-center gap-4 p-5 rounded-2xl bg-white border border-border shadow-sm">
            <div class="size-12 rounded-xl bg-success/10 flex items-center justify-center text-success">
                <i data-lucide="graduation-cap" class="size-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-secondary">Profil Lulusan</p>
                <p class="text-2xl font-bold text-foreground">{{ $graduateprofiles->total() }}</p>
            </div>
        </div>
    </div>

    <!-- Actions Toolbar -->
    <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-6">
        <!-- Search -->
        <div class="relative flex-1 max-w-2xl group">
            <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
            <input 
                type="text" 
                wire:model.live.debounce.400ms="search"
                placeholder="Cari profil lulusan..." 
                class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
            >
        </div>

        <!-- Add Button -->
        <a href="{{ route('admin.graduateprofile.create') }}" wire:navigate class="w-full md:w-auto px-6 h-12 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-2 transition-all duration-300 cursor-pointer shrink-0">
            <i data-lucide="plus" class="size-5"></i>
            <span>Tambah Profil</span>
        </a>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <!-- Data Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        @forelse ($graduateprofiles as $profile)
        <div class="group bg-white rounded-3xl p-6 border border-border hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-500 relative flex flex-col gap-4">
            <div class="flex items-start gap-4">
                <div class="size-14 rounded-2xl bg-muted flex items-center justify-center text-secondary group-hover:bg-primary group-hover:text-white transition-all duration-300 shrink-0">
                    <i data-lucide="file-text" class="size-7"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-bold text-foreground text-xl leading-tight group-hover:text-primary transition-colors mb-1 truncate">{{ $profile->title }}</h3>
                    <p class="text-xs text-secondary flex items-center gap-1.5 font-medium uppercase tracking-wider">
                        <i data-lucide="clock" class="size-3"></i>
                        Diperbarui: {{ \Carbon\Carbon::parse($profile->updated_at)->diffForHumans() }}
                    </p>
                </div>
            </div>
            
            <div class="py-4 border-y border-dashed border-border flex-1">
                <p class="text-sm text-secondary leading-relaxed line-clamp-4">
                    {{ $profile->description ?: 'Tidak ada deskripsi untuk profil ini.' }}
                </p>
            </div>

            <div class="flex items-center gap-3 mt-2">
                <a href="{{ route('admin.graduateprofile.edit', $profile->id) }}" wire:navigate class="flex-1 h-11 flex items-center justify-center rounded-xl border border-border hover:border-primary text-secondary hover:text-primary font-bold text-sm transition-all duration-300 cursor-pointer">
                    <i data-lucide="edit-3" class="size-4 mr-2"></i>
                    Edit
                </a>
                <button 
                    @click="deleteId = {{ $profile->id }}; showDeleteModal = true"
                    class="h-11 px-4 flex items-center justify-center rounded-xl bg-error/10 text-error hover:bg-error hover:text-white transition-all duration-300 cursor-pointer"
                    title="Hapus"
                >
                    <i data-lucide="trash-2" class="size-4"></i>
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 bg-white rounded-3xl border border-dashed border-border flex flex-col items-center justify-center text-center">
            <div class="size-20 rounded-full bg-muted flex items-center justify-center text-secondary mb-4">
                <i data-lucide="info" class="size-10"></i>
            </div>
            <h3 class="text-xl font-bold text-foreground">Belum ada data profil lulusan</h3>
            <p class="text-secondary mt-1">Silakan tambah profil baru untuk memulai.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8 pb-8">
        {{ $graduateprofiles->links() }}
    </div>
    <!-- Delete Confirmation Modal -->
    <div
        x-show="showDeleteModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center px-4 sm:px-0"
        style="display: none;"
    >
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="showDeleteModal = false"></div>

        <div 
            class="relative bg-white dark:bg-zinc-900 rounded-3xl max-w-md w-full p-6 shadow-2xl transform transition-all border border-border"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <div class="flex flex-col items-center text-center">
                <div class="size-14 rounded-full bg-error/10 flex items-center justify-center text-error mb-4">
                    <i data-lucide="alert-triangle" class="size-7"></i>
                </div>
                
                <h3 class="text-xl font-bold text-foreground mb-2">Hapus Profil?</h3>
                <p class="text-secondary text-sm mb-6">
                    Apakah Anda yakin ingin menghapus data profil ini? Tindakan ini tidak dapat dibatalkan.
                </p>

                <div class="flex gap-3 w-full">
                    <button 
                        @click="showDeleteModal = false"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-border text-foreground font-semibold hover:bg-muted transition-colors"
                    >
                        Batal
                    </button>
                    <button 
                        @click="$wire.delete(deleteId); showDeleteModal = false"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-error text-white font-semibold hover:bg-error-hover shadow-lg shadow-error/20 transition-all hover:scale-[1.02]"
                    >
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


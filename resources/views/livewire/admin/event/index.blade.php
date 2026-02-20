<div x-data="{ showDeleteModal: false, deleteId: null }">
    <!-- Stats Overview (Optional for this page, but matches the style) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="flex items-center gap-4 p-5 rounded-2xl bg-white border border-border shadow-sm">
            <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                <i data-lucide="calendar" class="size-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-secondary">Total Kegiatan</p>
                <p class="text-2xl font-bold text-foreground">{{ $events->total() }}</p>
            </div>
        </div>
    </div>

    <!-- Actions Toolbar -->
    <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-6">
        <!-- Search & Filter -->
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto flex-1 max-w-2xl">
            <div class="relative flex-1 group">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                <input 
                    type="text" 
                    wire:model.live.debounce.400ms="search"
                    placeholder="Cari judul atau deskripsi kegiatan..." 
                    class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                >
            </div>
            
            <div class="flex gap-2">
                <button 
                    wire:click="resetFilters"
                    class="size-12 flex items-center justify-center rounded-xl bg-white border border-border hover:border-primary text-secondary hover:text-primary transition-all duration-300 cursor-pointer"
                    title="Reset Filter"
                >
                    <i data-lucide="refresh-cw" class="size-5"></i>
                </button>
            </div>
        </div>

        <!-- Add Button -->
        <a href="{{ route('admin.event.create') }}" wire:navigate class="w-full md:w-auto px-6 h-12 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-2 transition-all duration-300 cursor-pointer shrink-0">
            <i data-lucide="plus" class="size-5"></i>
            <span>Tambah Kegiatan</span>
        </a>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <!-- Data Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        @forelse ($events as $event)
        <div class="group bg-white rounded-3xl p-5 border border-border hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-500 flex flex-col gap-5 relative">
            <div class="flex items-start justify-between">
                <div class="flex gap-4">
                    <div class="relative">
                        @if($event->documentation)
                            <img src="{{ asset('storage/' . $event->documentation) }}" alt="{{ $event->title }}" class="size-20 rounded-2xl object-cover ring-2 ring-border group-hover:ring-primary transition-all duration-300">
                        @else
                            <div class="size-20 rounded-2xl bg-muted flex items-center justify-center text-secondary ring-2 ring-border group-hover:ring-primary transition-all duration-300">
                                <i data-lucide="image" class="size-8"></i>
                            </div>
                        @endif
                        <span class="absolute -bottom-1 -right-1 size-6 {{ \Carbon\Carbon::parse($event->date)->isPast() ? 'bg-secondary' : 'bg-success' }} border-4 border-white rounded-full flex items-center justify-center">
                            <i data-lucide="{{ \Carbon\Carbon::parse($event->date)->isPast() ? 'clock' : 'check' }}" class="size-3 text-white"></i>
                        </span>
                    </div>
                    <div class="flex-1 flex flex-col pt-1 min-w-0">
                        <h3 class="font-bold text-foreground text-lg leading-tight truncate group-hover:text-primary transition-colors">{{ $event->title }}</h3>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold w-fit mt-1.5 uppercase tracking-wider">
                            <i data-lucide="calendar" class="size-3"></i>
                            {{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMMM YYYY') }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="py-4 border-y border-dashed border-border min-h-[80px]">
                <p class="text-sm text-secondary line-clamp-3 leading-relaxed">
                    {{ $event->description ?: 'Tidak ada deskripsi untuk kegiatan ini.' }}
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.event.edit', $event->id) }}" wire:navigate class="flex-1 h-11 flex items-center justify-center rounded-xl border border-border hover:border-primary text-secondary hover:text-primary font-bold text-sm transition-all duration-300 cursor-pointer">
                    <i data-lucide="edit-3" class="size-4 mr-2"></i>
                    Edit
                </a>
                <button 
                    @click="deleteId = {{ $event->id }}; showDeleteModal = true"
                    class="flex-1 h-11 flex items-center justify-center rounded-xl bg-error/10 text-error hover:bg-error hover:text-white font-bold text-sm transition-all duration-300 cursor-pointer shadow-sm"
                >
                    <i data-lucide="trash-2" class="size-4 mr-2"></i>
                    Hapus
                </button>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 bg-white rounded-3xl border border-dashed border-border flex flex-col items-center justify-center text-center">
            <div class="size-20 rounded-full bg-muted flex items-center justify-center text-secondary mb-4">
                <i data-lucide="info" class="size-10"></i>
            </div>
            <h3 class="text-xl font-bold text-foreground">Belum ada data kegiatan</h3>
            <p class="text-secondary mt-1">Silakan tambah kegiatan baru untuk memulai.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12 pb-8">
        {{ $events->links() }}
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
                
                <h3 class="text-xl font-bold text-foreground mb-2">Hapus Kegiatan?</h3>
                <p class="text-secondary text-sm mb-6">
                    Apakah Anda yakin ingin menghapus data kegiatan ini? Tindakan ini tidak dapat dibatalkan.
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
</div>


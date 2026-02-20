<div x-data="{ showDeleteModal: false, deleteId: null }">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="flex items-center gap-4 p-5 rounded-2xl bg-white border border-border shadow-sm">
            <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                <i data-lucide="award" class="size-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-secondary">Total Prestasi</p>
                <p class="text-2xl font-bold text-foreground">{{ $achievements->total() }}</p>
            </div>
        </div>
    </div>

    <!-- Actions Toolbar -->
    <div class="flex flex-col xl:flex-row gap-4 justify-between items-center mb-6">
        <!-- Search & Filter -->
        <div class="flex flex-col sm:flex-row gap-3 w-full xl:w-auto flex-1 max-w-4xl">
            <div class="relative flex-1 group">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                <input 
                    type="text" 
                    wire:model.live.debounce.400ms="search"
                    placeholder="Cari judul atau deskripsi prestasi..." 
                    class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                >
            </div>
            
            <div class="flex gap-2 min-w-[200px]">
                <select 
                    wire:model.live="category"
                    class="w-full h-12 px-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 appearance-none cursor-pointer"
                >
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $categoryOption)
                        <option value="{{ $categoryOption }}">{{ $categoryOption }}</option>
                    @endforeach
                </select>
                
                <button 
                    wire:click="reset(['search','category'])"
                    class="size-12 flex items-center justify-center rounded-xl bg-white border border-border hover:border-primary text-secondary hover:text-primary transition-all duration-300 cursor-pointer shrink-0"
                    title="Reset Filter"
                >
                    <i data-lucide="refresh-cw" class="size-5"></i>
                </button>
            </div>
        </div>

        <!-- Add Button -->
        <a href="{{ route('admin.achievement.create') }}" wire:navigate class="w-full xl:w-auto px-6 h-12 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-2 transition-all duration-300 cursor-pointer shrink-0">
            <i data-lucide="plus" class="size-5"></i>
            <span>Tambah Prestasi</span>
        </a>
    </div>

    <!-- Active Filters Badge -->
    @if($search || $category)
    <div class="flex flex-wrap gap-2 mb-6">
        @if($search)
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold border border-primary/20">
            Search: {{ $search }}
            <button wire:click="$set('search', '')" class="hover:text-primary-hover"><i data-lucide="x" class="size-3"></i></button>
        </span>
        @endif
        @if($category)
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-warning/10 text-warning text-xs font-bold border border-warning/20">
            Category: {{ $category }}
            <button wire:click="$set('category', '')" class="hover:text-warning-hover"><i data-lucide="x" class="size-3"></i></button>
        </span>
        @endif
    </div>
    @endif

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <!-- Data Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        @forelse ($achievements as $achievement)
        <div class="group bg-white rounded-3xl p-5 border border-border hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-500 flex flex-col gap-5 relative">
            <div class="flex items-start justify-between">
                <div class="flex gap-4">
                    <div class="relative">
                        @if($achievement->image)
                            <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="size-20 rounded-2xl object-cover ring-2 ring-border group-hover:ring-primary transition-all duration-300">
                        @else
                            <div class="size-20 rounded-2xl bg-muted flex items-center justify-center text-secondary ring-2 ring-border group-hover:ring-primary transition-all duration-300">
                                <i data-lucide="award" class="size-8"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 flex flex-col pt-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1.5 flex-wrap">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-muted text-secondary text-[10px] font-black uppercase tracking-widest border border-border group-hover:border-primary/30 transition-colors">
                                {{ $achievement->category }}
                            </span>
                        </div>
                        <h3 class="font-bold text-foreground text-lg leading-tight truncate group-hover:text-primary transition-colors">{{ $achievement->title }}</h3>
                        <p class="text-xs text-secondary mt-1 flex items-center gap-1.5">
                            <i data-lucide="calendar" class="size-3"></i>
                            {{ \Carbon\Carbon::parse($achievement->date)->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="py-4 border-y border-dashed border-border min-h-[80px]">
                <p class="text-sm text-secondary line-clamp-3 leading-relaxed">
                    {{ $achievement->description ?: 'Tidak ada deskripsi untuk prestasi ini.' }}
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.achievement.edit', $achievement->id) }}" wire:navigate class="flex-1 h-11 flex items-center justify-center rounded-xl border border-border hover:border-primary text-secondary hover:text-primary font-bold text-sm transition-all duration-300 cursor-pointer">
                    <i data-lucide="edit-3" class="size-4 mr-2"></i>
                    Edit
                </a>
                <button 
                    @click="deleteId = {{ $achievement->id }}; showDeleteModal = true"
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
            <h3 class="text-xl font-bold text-foreground">Belum ada data prestasi</h3>
            <p class="text-secondary mt-1">Silakan tambah prestasi baru untuk memulai.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12 pb-8">
        {{ $achievements->links() }}
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
                
                <h3 class="text-xl font-bold text-foreground mb-2">Hapus Prestasi?</h3>
                <p class="text-secondary text-sm mb-6">
                    Apakah Anda yakin ingin menghapus data prestasi ini? Tindakan ini tidak dapat dibatalkan.
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


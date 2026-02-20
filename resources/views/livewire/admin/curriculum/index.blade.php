<div x-data="{ showDeleteModal: false, deleteId: null }">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="flex items-center gap-4 p-5 rounded-2xl bg-white border border-border shadow-sm">
            <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                <i data-lucide="book-open" class="size-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-secondary">Total Mata Kuliah</p>
                <p class="text-2xl font-bold text-foreground">{{ $curriculums->total() }}</p>
            </div>
        </div>
    </div>

    <!-- Actions Toolbar -->
    <div class="flex flex-col lg:flex-row gap-4 justify-between items-center mb-6">
        <!-- Search & Filter -->
        <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto flex-1 max-w-3xl">
            <div class="relative flex-1 group">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 size-5 text-secondary group-focus-within:text-primary transition-colors"></i>
                <input 
                    type="text" 
                    wire:model.live.debounce.400ms="search"
                    placeholder="Cari mata kuliah..." 
                    class="w-full h-12 pl-12 pr-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300"
                >
            </div>
            
            <div class="flex gap-2 min-w-[180px]">
                <select 
                    wire:model.live="semester"
                    class="w-full h-12 px-4 rounded-xl border border-border bg-white text-sm font-medium focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all duration-300 appearance-none cursor-pointer"
                >
                    <option value="">Semua Semester</option>
                    @foreach ($semesters as $semesterItem)
                        <option value="{{ $semesterItem }}">{{ $semesterItem }}</option>
                    @endforeach
                </select>
                
                <button 
                    wire:click="resetFilters"
                    class="size-12 flex items-center justify-center rounded-xl bg-white border border-border hover:border-primary text-secondary hover:text-primary transition-all duration-300 cursor-pointer shrink-0"
                    title="Reset Filter"
                >
                    <i data-lucide="refresh-cw" class="size-5"></i>
                </button>
            </div>
        </div>

        <!-- Add Button -->
        <a href="{{ route('admin.curriculum.create') }}" wire:navigate class="w-full lg:w-auto px-6 h-12 bg-primary hover:bg-primary-hover text-white rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center justify-center gap-2 transition-all duration-300 cursor-pointer shrink-0">
            <i data-lucide="plus" class="size-5"></i>
            <span>Tambah Mata Kuliah</span>
        </a>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    <!-- Data Table -->
    <div class="bg-white rounded-3xl border border-border shadow-sm overflow-hidden mb-8">
        <div class="overflow-x-auto text-center">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-muted/50 border-b border-border">
                        <th class="px-6 py-4 font-bold text-secondary uppercase tracking-wider">Semester</th>
                        <th class="px-6 py-4 font-bold text-secondary uppercase tracking-wider text-left">Mata Kuliah</th>
                        <th class="px-6 py-4 font-bold text-secondary uppercase tracking-wider">SKS</th>
                        <th class="px-6 py-4 font-bold text-secondary uppercase tracking-wider">Dibuat Pada</th>
                        <th class="px-6 py-4 font-bold text-secondary uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse ($curriculums as $curriculum)
                    <tr class="hover:bg-primary/5 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="items-center justify-center size-10 rounded-xl bg-muted text-foreground font-black group-hover:bg-white transition-colors">
                                {{ $curriculum->semester }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-left">
                            <p class="font-bold text-foreground group-hover:text-primary transition-colors text-base">{{ $curriculum->subject }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full bg-success/10 text-success font-bold text-xs">
                                {{ $curriculum->number_sks }} SKS
                            </span>
                        </td>
                        <td class="px-6 py-4 text-secondary text-xs">
                            {{ \Carbon\Carbon::parse($curriculum->created_at)->isoFormat('D MMM YYYY') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.curriculum.edit', $curriculum->id) }}" wire:navigate class="size-10 flex items-center justify-center rounded-xl border border-border hover:border-primary text-secondary hover:text-primary transition-all duration-300">
                                    <i data-lucide="edit-3" class="size-4"></i>
                                </a>
                                <button 
                                    @click="deleteId = {{ $curriculum->id }}; showDeleteModal = true"
                                    class="size-10 flex items-center justify-center rounded-xl bg-error/10 text-error hover:bg-error hover:text-white transition-all duration-300 cursor-pointer"
                                >
                                    <i data-lucide="trash-2" class="size-4"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="size-16 rounded-full bg-muted flex items-center justify-center text-secondary mb-4">
                                    <i data-lucide="info" class="size-8"></i>
                                </div>
                                <h3 class="text-lg font-bold text-foreground">Tidak ada data kurikulum</h3>
                                <p class="text-secondary">Silakan buat mata kuliah baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-8 pb-8">
        {{ $curriculums->links() }}
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
        <!-- Backdrop -->
        <div 
            class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" 
            @click="showDeleteModal = false"
        ></div>

        <!-- Modal Panel -->
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
                
                <h3 class="text-xl font-bold text-foreground mb-2">Hapus Data?</h3>
                <p class="text-secondary text-sm mb-6">
                    Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
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


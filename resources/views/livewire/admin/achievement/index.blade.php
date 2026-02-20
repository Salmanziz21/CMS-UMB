<div>
    <!-- Judul-->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Prestasi</h1>
            <p class="text-gray-600 dark:text-zinc-300">Kelola semua Data Disini</p>
        </div>
        <div class="flex flex-col gap-3 w-full md:w-auto md:flex-row md:items-center md:justify-end">
            <div class="grid gap-3 w-full md:w-auto md:grid-cols-2">
                <flux:input wire:model.live.debounce.400ms="search" icon="magnifying-glass" placeholder="Cari judul / deskripsi" />
                <flux:select wire:model.live="category" placeholder="Semua kategori">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $categoryOption)
                        <option value="{{ $categoryOption }}">{{ $categoryOption }}</option>
                    @endforeach
                </flux:select>
            </div>
            <flux:button
                class="w-full md:w-auto"
                variant="outline"
                icon="arrow-path"
                wire:click="reset(['search','category'])"
                type="button">
                Reset Filter
            </flux:button>
            <flux:button
                class="w-full md:w-auto"
                variant="primary"
                color="gray"
                icon="plus"
                href="{{ route('admin.achievement.create') }}"
                size="sm">
                Tambah Prestasi
            </flux:button>
        </div>
    </div>

    @if($search || $category)
        <div class="mt-4 flex flex-wrap items-center gap-3 text-sm">
            <span class="text-gray-500 dark:text-zinc-400">Filter aktif:</span>
            @if($search)
                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 text-emerald-700 px-3 py-1">
                    <i class="fas fa-search"></i>
                    "{{ $search }}"
                </span>
            @endif
            @if($category)
                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 text-emerald-700 px-3 py-1">
                    <i class="fas fa-tag"></i>
                    {{ $category }}
                </span>
            @endif
        </div>
    @endif

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif
    
     <!-- Tabel -->
    <div class="mt-6 bg-white dark:bg-zinc-800 shadow rounded-lg overflow-hidden border border-gray-200 dark:border-zinc-700 transition-colors duration-200">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-200">
                <thead class="bg-gray-100 dark:bg-zinc-700 text-gray-900 dark:text-zinc-100 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3 text-center">ID</th>
                        <th class="px-4 py-3 text-center">Judul</th>
                        <th class="px-4 py-3 text-center">Deskripsi</th>
                        <th class="px-4 py-3 text-center">Foto Dokumentasi</th>
                        <th class="px-4 py-3 text-center">Tanggal</th>
                        <th class="px-4 py-3 text-center">Kategori</th>
                        <th class="px-4 py-3 text-center">Dibuat</th>
                        <th class="px-4 py-3 text-center">Diperbarui</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700 text-center ">
                    @forelse ($achievements as $achievement)
                    <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition duration-150 ease-in-out cursor-pointer">
                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-zinc-100">
                            {{ $achievements->firstItem() + $loop->index }}
                        </td>
                        <td class="px-4 py-3 font-medium text-emerald-600 dark:text-emerald-400">
                            {{ $achievement->title }}
                        </td>
                        <td class="px-4 py-3 font-medium text-emerald-600 dark:text-emerald-400">
                            {{ Str::limit($achievement->description, 50) }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex justify-center">
                                @if($achievement->image)
                                    @if($achievement->image_exists)
                                        <img
                                            src="{{ asset('storage/' . $achievement->image) }}"
                                            alt="{{ $achievement->title }}"
                                            class="w-10 h-10 rounded-lg object-cover border-2 border-gray-300 dark:border-gray-600"
                                            onerror="this.style.display='none'; this.parentNode.querySelector('.fallback').style.display='flex';">
                                    @endif
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center border-2 border-gray-300 dark:border-gray-600 fallback {{ $achievement->image_exists ? 'hidden' : 'flex' }}">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center border-2 border-gray-300 dark:border-gray-600 fallback">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}</td>
                        <td>{{ $achievement->category }}</td>
                        <td>{{ $achievement->created_at }}</td>
                        <td>{{ $achievement->updated_at }}</td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-2">
                                <flux:button
                                    variant="primary"
                                    icon="pencil-square"
                                    href="{{ route('admin.achievement.edit', $achievement->id) }}"
                                    size="sm">
                                    Edit
                                </flux:button>
                                <flux:button
                                    variant="danger"
                                    icon="trash"
                                    size="sm"
                                    wire:click="delete({{ $achievement->id }})"
                                    onclick="return confirm('Hapus prestasi ini?')">
                                    Hapus
                                </flux:button>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500 dark:text-zinc-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span>Belum ada data.</span>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t border-gray-200 dark:border-zinc-700">
            {{ $achievements->links() }}
        </div>
    </div>
</div>

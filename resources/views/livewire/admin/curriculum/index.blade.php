<div>
    <!-- Judul-->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Kurikulum</h1>
            <p class="text-gray-600 dark:text-zinc-300">Kelola semua Data Disini</p>
        </div>
        <div class="flex flex-col gap-3 w-full md:w-auto md:flex-row md:items-center md:justify-end">
            <flux:input wire:model.live.debounce.400ms="search" icon="magnifying-glass" placeholder="Cari mata kuliah" />
            <flux:select wire:model.live="semester">
                <option value="">Semua Semester</option>
                @foreach ($semesters as $semester)
                    <option value="{{ $semester }}">{{ $semester }}</option>
                @endforeach
            </flux:select>
            
            <flux:button
                class="w-full md:w-auto"
                variant="outline"
                icon="arrow-path"
                wire:click="resetFilters"
                type="button">
                Reset Filter
            </flux:button>
            <flux:button
                class="w-full md:w-auto"
                variant="primary"
                color="gray"
                icon="plus"
                href="{{ route('admin.curriculum.create') }}"
                size="sm">
                Tambah Kurikulum
            </flux:button>
        </div>
    </div>

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
                        <th class="px-4 py-3 text-center">Semester</th>
                        <th class="px-4 py-3 text-center">Mata Kuliah</th>
                        <th class="px-4 py-3 text-center">Jumlah Sks</th>
                        <th class="px-4 py-3 text-center">Dibuat</th>
                        <th class="px-4 py-3 text-center">Diperbarui</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-zinc-700 text-center ">
                    @forelse ($curriculums as $curriculum)
                    <tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition duration-150 ease-in-out cursor-pointer">
                        <td class="px-4 py-3 font-medium text-gray-900 dark:text-zinc-100">
                            {{ $curriculums->firstItem() + $loop->index }}
                        </td>
                        <td class="px-4 py-3 font-medium text-emerald-600 dark:text-emerald-400">
                            {{ $curriculum->semester }}
                        </td>
                        <td class="px-4 py-3 font-medium text-emerald-600 dark:text-emerald-400">
                            {{ Illuminate\Support\Str::limit($curriculum->subject, 20) }}
                        </td>
                        <td class="px-4 py-3 font-medium text-emerald-600 dark:text-emerald-400">
                            {{ $curriculum->number_sks }}
                        </td>
                        <td>{{ $curriculum->created_at }}</td>
                        <td>{{ $curriculum->updated_at }}</td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-2">
                                <flux:button
                                    variant="primary"
                                    icon="pencil-square"
                                    href="{{ route('admin.curriculum.edit', $curriculum->id) }}"
                                    size="sm">
                                    Edit
                                </flux:button>
                                <flux:button
                                    variant="danger"
                                    icon="trash"
                                    size="sm"
                                    wire:click="delete({{ $curriculum->id }})"
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
            {{ $curriculums->links() }}
        </div>
    </div>
</div>

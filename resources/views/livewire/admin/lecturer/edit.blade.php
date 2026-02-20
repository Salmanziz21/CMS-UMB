<div>
<section class="w-full p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Edit Dosen</h1>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif
    
    <x-form wire:submit.prevent="update" class="space-y-6">
        <flux:input wire:model.defer="name" type="text" label="Nama" required class="dark:text-gray-200" />
        <flux:textarea wire:model.defer="major" label="Bidang" required class="dark:text-gray-200" />
        <flux:input
            wire:model.live="newPhoto"
            type="file"
            accept="image/*"
            label="Foto Dokumentasi"
            class="dark:text-gray-200"
        />
        @error('newPhoto')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        <div class="space-y-2">
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Preview Foto</p>
            <div class="flex flex-wrap gap-4">
                @if ($newPhoto)
                    <img src="{{ $newPhoto->temporaryUrl() }}" alt="Preview dokumentasi baru" class="h-10 w-10 rounded-xl object-cover border border-dashed border-emerald-300" />
                @elseif ($photo)
                    <div class="flex items-center gap-2">
                        @if($photoExists)
                            <img 
                                src="{{ asset('storage/' . $photo) }}" 
                                alt="Dokumentasi saat ini" 
                                class="h-10 w-10 rounded-xl object-cover border border-slate-200"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                        @endif
                        <div class="h-10 w-10 bg-gray-200 dark:bg-gray-700 rounded-xl flex items-center justify-center border border-slate-200 {{ $photoExists ? 'hidden' : 'flex' }}">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-slate-500">Belum ada foto dokumentasi.</p>
                @endif
            </div>
        </div>
    <div class="flex gap-2">
            <flux:button type="submit" icon="arrow-path" variant="primary">Update Data</flux:button>
            <flux:button href="{{ route('admin.lecturer.index') }}" icon="x-mark" variant="ghost">Cancel</flux:button>
        </div>
    </x-form>
</section>
</div>
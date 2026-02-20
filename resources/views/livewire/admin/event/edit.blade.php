<div>
<section class="w-full p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Edit Kegiatan</h1>
    </div>
    
    <x-form wire:submit.prevent="update" class="space-y-6">
        <flux:input wire:model.defer="title" type="text" label="Judul" required class="dark:text-gray-200" />
        <flux:textarea wire:model.defer="description" label="Deskripsi" required class="dark:text-gray-200" />
        <flux:input wire:model.defer="date" type="date" label="Tanggal" required class="dark:text-gray-200" />
        <flux:input
            wire:model.live="newDocumentation"
            type="file"
            accept="image/*"
            label="Foto Dokumentasi"
            class="dark:text-gray-200"
        />
        @error('newDocumentation')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        <div class="space-y-2">
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Preview Foto</p>
            <div class="flex flex-wrap gap-4">
                @if ($newDocumentation)
                    <img src="{{ $newDocumentation->temporaryUrl() }}" alt="Preview dokumentasi baru" class="h-10 w-10 rounded-xl object-cover border border-dashed border-emerald-300" />
                @elseif ($documentation)
                    <img src="{{ asset('storage/' . $documentation) }}" alt="Dokumentasi saat ini" class="h-10 w-10 rounded-xl object-cover border border-slate-200" />
                @else
                    <p class="text-sm text-slate-500">Belum ada foto dokumentasi.</p>
                @endif
            </div>
        </div>
    <div class="flex gap-2">
            <flux:button type="submit" icon="arrow-path" variant="primary">Update Data</flux:button>
            <flux:button href="{{ route('admin.event.index') }}" icon="x-mark" variant="ghost">Cancel</flux:button>
        </div>
    </x-form>
</section>
</div>
<div>
<section class="w-full p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Tambah Dosen</h1>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif
    
    <x-form wire:submit.prevent="save" class="space-y-6">
        <flux:input wire:model.defer="name" type="text" label="Nama" required class="dark:text-gray-200" />
        <flux:input wire:model.defer="major" type="text" label="Bidang" required class="dark:text-gray-200" />
        <flux:input
            wire:model="photo"
            type="file"
            accept="image/*"
            label="Foto Dokumentasi"
            class="dark:text-gray-200"
        />
        @error('photo')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        <div class="space-y-2">
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Preview Foto</p>
            <div class="relative">
                <div wire:loading wire:target="photo" class="flex items-center gap-2 text-sm text-emerald-500">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span>Mengunggah gambar...</span>
                </div>
                <div class="flex flex-wrap gap-4" wire:loading.remove wire:target="photo">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview foto dosen" class="h-10 w-10 rounded-xl object-cover border border-dashed border-emerald-300" />
                    @else
                        <p class="text-sm text-slate-500">Belum ada foto yang dipilih.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <flux:button type="submit" icon="arrow-path" variant="primary">Tambah Data</flux:button>
            <flux:button href="{{ route('admin.lecturer.index') }}" icon="x-mark" variant="ghost">Cancel</flux:button>
        </div>
    </x-form>
</section>
</div>
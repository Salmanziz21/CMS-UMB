<div>
<section class="w-full p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Tambah Prestasi</h1>
    </div>
    
    <x-form wire:submit.prevent="save" class="space-y-6">
        <flux:input wire:model.defer="title" type="text" label="Judul" required class="dark:text-gray-200" />
        <flux:textarea wire:model.defer="description" type="text" label="Deskripsi" required class="dark:text-gray-200" />
        <flux:input wire:model.defer="date" type="date" label="Tanggal" required class="dark:text-gray-200" />
        <flux:select wire:model.defer="category" label="Kategori" required class="dark:text-gray-200">
            <option value="">Select Category</option>
            <option value="Prestasi">Prestasi</option>
            <option value="Karya">Karya</option>
        </flux:select>
        <flux:input
            wire:model="image"
            type="file"
            accept="image/*"
            label="Foto Dokumentasi"
            class="dark:text-gray-200"
        />
        @error('image')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
        <div class="space-y-2">
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Preview Foto</p>
            <div class="relative">
                <div wire:loading wire:target="image" class="flex items-center gap-2 text-sm text-emerald-500">
                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span>Mengunggah gambar...</span>
                </div>
                <div class="flex flex-wrap gap-4" wire:loading.remove wire:target="image">
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="Preview dokumentasi" class="h-10 w-10 rounded-xl object-cover border border-dashed border-emerald-300" />
                    @else
                        <p class="text-sm text-slate-500">Belum ada foto yang dipilih.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <flux:button type="submit" icon="arrow-path" variant="primary">Tambah Data</flux:button>
            <flux:button href="{{ route('admin.achievement.index') }}" icon="x-mark" variant="ghost">Cancel</flux:button>
        </div>
    </x-form>
</section>
</div>
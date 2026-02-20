<div>
<section class="w-full p-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-200">Edit Profil Lulusan</h1>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif
    
    <x-form wire:submit.prevent="update" class="space-y-6">
        <flux:input wire:model.defer="title" type="text" label="Judul" required class="dark:text-gray-200" />
        <flux:textarea wire:model.defer="description" label="Deskripsi" required class="dark:text-gray-200" />
        <div class="flex gap-2">
            <flux:button type="submit" icon="arrow-path" variant="primary">Simpan Data</flux:button>
            <flux:button href="{{ route('admin.graduateprofile.index') }}" icon="x-mark" variant="ghost">Cancel</flux:button>
        </div>
    </x-form>
</section>
</div>
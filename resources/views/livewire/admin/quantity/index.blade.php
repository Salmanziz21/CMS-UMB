<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Jumlah Mahasiswa Aktif</h1>
        <p class="text-gray-600 dark:text-zinc-300">Kelola jumlah mahasiswa aktif</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 shadow rounded-lg border border-gray-200 dark:border-zinc-700 p-6">
        <x-form wire:submit.prevent="update" class="space-y-6">
            <flux:input wire:model.defer="number_students" type="number" label="Jumlah Mahasiswa Aktif" required min="0" />
            
            <div class="flex gap-2 pt-4">
                <flux:button type="submit" icon="check" variant="primary">Simpan Data</flux:button>
            </div>
        </x-form>
    </div>
</div>

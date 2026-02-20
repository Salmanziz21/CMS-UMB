<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Program Studi</h1>
        <p class="text-gray-600 dark:text-zinc-300">Kelola data program studi</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 shadow rounded-lg border border-gray-200 dark:border-zinc-700 p-6">
        <x-form wire:submit.prevent="update" class="space-y-6">
            <flux:input wire:model.defer="name" type="text" label="Nama Program Studi" required />
            <flux:select wire:model.defer="accreditation" label="Akreditasi" required>
                <option value="">Pilih Akreditasi</option>
                <option value="Unggul">Unggul</option>
                <option value="Baik Sekali">Baik Sekali</option>
                <option value="Baik">Baik</option>
            </flux:select>
            <flux:textarea wire:model.defer="description" label="Deskripsi" required rows="4" />
            <flux:textarea wire:model.defer="vision" label="Visi" required rows="4" />
            <flux:textarea wire:model.defer="mission" label="Misi" required rows="4" />
            <flux:textarea wire:model.defer="profilestudy" label="Profil Program Studi" required rows="4" />
            <flux:textarea wire:model.defer="history" label="Sejarah" required rows="4" />
            
            <div class="flex gap-2 pt-4">
                <flux:button type="submit" icon="check" variant="primary">Simpan Data</flux:button>
            </div>
        </x-form>
    </div>
</div>

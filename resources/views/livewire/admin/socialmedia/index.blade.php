<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Link Media Sosial</h1>
        <p class="text-gray-600 dark:text-zinc-300">Kelola link media sosial website</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 shadow rounded-lg border border-gray-200 dark:border-zinc-700 p-6">
        <x-form wire:submit.prevent="update" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b pb-2">Instagram</h3>
                    <flux:input wire:model.defer="instagram_name" type="text" label="Nama" required />
                    <flux:input wire:model.defer="instagram_url" type="url" label="URL Instagram" required placeholder="https://instagram.com/..." />
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b pb-2">Facebook</h3>
                    <flux:input wire:model.defer="facebook_name" type="text" label="Nama" required />
                    <flux:input wire:model.defer="facebook_url" type="url" label="URL Facebook" required placeholder="https://facebook.com/..." />
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b pb-2">X (Twitter)</h3>
                    <flux:input wire:model.defer="twitter_name" type="text" label="Nama" required />
                    <flux:input wire:model.defer="twitter_url" type="url" label="URL X (Twitter)" required placeholder="https://x.com/..." />
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b pb-2">YouTube</h3> 
                    <flux:input wire:model.defer="youtube_name" type="text" label="Nama" required />
                    <flux:input wire:model.defer="youtube_url" type="url" label="URL YouTube" required placeholder="https://youtube.com/..." />
                </div>
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b pb-2">WhatsApp</h3>
                    <flux:input wire:model.defer="whatsapp_name" type="text" label="Nama" required />
                    <flux:input wire:model.defer="whatsapp_url" type="url" label="URL WhatsApp" required placeholder="https://whatsapp.com/..." />
                </div>
            </div>
            
            <div class="flex gap-2 pt-4">
                <flux:button type="submit" icon="check" variant="primary">Simpan Data</flux:button>
            </div>
        </x-form>
    </div>
</div>
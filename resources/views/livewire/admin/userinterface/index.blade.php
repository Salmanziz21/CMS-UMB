<div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tampilan UI</h1>
        <p class="text-gray-600 dark:text-zinc-300">Kelola logo dan background website</p>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 shadow rounded-lg border border-gray-200 dark:border-zinc-700 p-6">
        <x-form wire:submit.prevent="update" class="space-y-6">
            <div>
                <flux:input
                    wire:model.live="image_logo"
                    type="file"
                    accept="image/*"
                    label="Logo"
                />
                @error('image_logo')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Preview Logo</p>
                    @if ($image_logo && is_object($image_logo) && method_exists($image_logo, 'temporaryUrl'))
                        <img src="{{ $image_logo->temporaryUrl() }}" alt="Preview logo baru" class="h-20 w-auto rounded-lg object-contain border border-dashed border-emerald-300" />
                    @elseif ($userinterface && $userinterface->image_logo)
                        <div class="flex items-center gap-2">
                            @if($logoExists)
                                <img 
                                    src="{{ asset('storage/' . $userinterface->image_logo) }}" 
                                    alt="Logo saat ini" 
                                    class="h-20 w-auto rounded-lg object-contain border border-slate-200"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            <div class="h-20 w-20 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center border border-slate-200 {{ $logoExists ? 'hidden' : 'flex' }}">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    @else
                        <p class="text-sm text-slate-500">Belum ada logo.</p>
                    @endif
                </div>
            </div>

            <div>
                <flux:input
                    wire:model.live="image_background"
                    type="file"
                    accept="image/*"
                    label="Background"
                />
                <p class="mt-1 text-xs text-gray-500 dark:text-zinc-400">Rekomendasi: minimal 1920×1080 px, max 10 MB. Format: JPG, PNG, GIF, WebP, SVG.</p>
                @error('image_background')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Preview Background</p>
                    @if ($image_background && is_object($image_background) && method_exists($image_background, 'temporaryUrl'))
                        <img src="{{ $image_background->temporaryUrl() }}" alt="Preview background baru" class="h-32 w-auto rounded-lg object-cover border border-dashed border-emerald-300" />
                    @elseif ($userinterface && $userinterface->image_background)
                        <div class="flex items-center gap-2">
                            @if($bgExists)
                                <img 
                                    src="{{ asset('storage/' . $userinterface->image_background) }}" 
                                    alt="Background saat ini" 
                                    class="h-32 w-auto rounded-lg object-cover border border-slate-200"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" />
                            @endif
                            <div class="h-32 w-32 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center border border-slate-200 {{ $bgExists ? 'hidden' : 'flex' }}">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    @else
                        <p class="text-sm text-slate-500">Belum ada background.</p>
                    @endif
                </div>
            </div>
            
            <div class="flex gap-2 pt-4">
                <flux:button type="submit" icon="check" variant="primary">Simpan Data</flux:button>
            </div>
        </x-form>
    </div>
</div>

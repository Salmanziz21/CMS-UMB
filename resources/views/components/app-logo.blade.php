@php
    $userinterface = \App\Models\Userinterface::first();
    $hasLogo = $userinterface?->image_logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($userinterface->image_logo);
    $logo = $hasLogo 
        ? asset('storage/' . $userinterface->image_logo)
        : asset('images/LogoUmb.png');
    $appName = config('app.name', 'Laravel');
@endphp

<div class="flex items-center gap-3 group cursor-pointer transition-all duration-300">
    @if($hasLogo)
        <img src="{{ $logo }}" alt="{{ $appName }}" class="h-9 w-auto object-contain group-hover:scale-110 transition-transform duration-300" />
    @else
        <div class="flex aspect-square size-9 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400 to-emerald-600 text-white shadow-lg group-hover:shadow-emerald-500/50 group-hover:scale-110 transition-all duration-300">
            <x-app-logo-icon class="size-5 fill-current" />
        </div>
    @endif
    <div class="ms-1 grid flex-1 text-start text-sm">
        <span class="mb-0.5 truncate leading-tight font-semibold text-gray-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-300">Admin Prodi</span>
    </div>
</div>

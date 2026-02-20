<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-neutral-100 antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-md flex-col gap-6">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-3 font-medium group hover:opacity-80 transition-opacity duration-300" wire:navigate>
                    @php
                        $userinterface = \App\Models\Userinterface::first();
                        $hasLogo = $userinterface?->image_logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($userinterface->image_logo);
                        $logo = $hasLogo 
                            ? asset('storage/' . $userinterface->image_logo)
                            : asset('images/LogoUmb.png');
                    @endphp
                    
                    @if($hasLogo)
                        <img src="{{ $logo }}" alt="Logo" class="h-10 w-auto object-contain drop-shadow-lg group-hover:drop-shadow-xl transition-all duration-300" />
                    @else
                        <span class="flex h-20 w-20 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400 to-emerald-600 shadow-lg group-hover:shadow-emerald-500/50 transition-all duration-300">
                            <x-app-logo-icon class="size-10 fill-current text-white" />
                        </span>
                    @endif

                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <div class="flex flex-col gap-6">
                    <div class="rounded-xl border bg-white dark:bg-stone-950 dark:border-stone-800 text-stone-800 shadow-xs">
                        <div class="px-10 py-8">{{ $slot }}</div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>

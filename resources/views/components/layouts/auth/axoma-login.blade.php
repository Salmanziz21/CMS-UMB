<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="login-page light">
    <head>
        @include('partials.head')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body class="min-h-screen antialiased">
        <div class="axoma-background min-h-screen flex">
            <!-- Network Pattern Overlay -->
            <div class="network-pattern"></div>

            <!-- Main Content -->
            <div class="relative z-20 flex flex-col lg:flex-row w-full min-h-screen">
                <!-- Left Side - Login Form -->
                <div class="w-full lg:w-1/2 flex flex-col justify-center p-6 sm:p-8 lg:p-16">
                    <div class="flex flex-col gap-6 lg:gap-8 max-w-lg mx-auto lg:mx-0 w-full">
                        <!-- Branding -->
                        <div class="space-y-3">
                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white uppercase tracking-tight leading-tight">Universitas Muhammadiyah Bengkulu</h1>
                            <div class="inline-block bg-white rounded-lg px-5 py-2.5 shadow-lg">
                                <span class="text-green-600 font-bold text-sm lg:text-base">Admin Prodi</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="space-y-2 mb-2">
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight">Masuk ke Dashboard</h2>
                            <p class="text-base sm:text-lg text-white opacity-90">Login untuk mengelola Program Studi</p>
                        </div>

                        <!-- Form Content -->
                        <div class="relative z-10 mt-4">
                            {{ $slot }}
                        </div>

                        <!-- Footer -->
                        <div class="mt-8 pt-6 border-t border-white/20">
                            <p class="text-xs sm:text-sm text-white opacity-75">© 2026 Universitas Muhammadiyah Bengkulu</p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Illustration -->
                <div class="hidden lg:flex w-1/2 items-center justify-center p-8 relative">
                    <div class="relative w-full h-full flex items-center justify-center">
                        <!-- Learning Illustration -->
                        <div class="w-full max-w-xl h-auto">
                            <img src="{{ asset('storage/images/Learning-bro.png') }}" alt="Learning Illustration" class="w-full h-auto object-contain">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>

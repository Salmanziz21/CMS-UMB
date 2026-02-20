@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodi{{ $title ? $title . ' - ' : '' }}{{ $studyprogram?->name ?? 'Prodi UMB' }} Dashboard</title>
    @include('partials.head')
    {{-- Admin styles --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{-- Dark Mode: init --}}
    <script src="{{ asset('js/theme-init.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="font-sans bg-white min-h-screen overflow-x-hidden text-foreground">

<div x-data="{ sidebarOpen: false, showLogoutModal: false }" class="flex h-screen max-h-screen flex-1 bg-muted overflow-hidden">
    <!-- Mobile Overlay -->
    <div 
        x-show="sidebarOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/60 z-40 lg:hidden" 
        @click="sidebarOpen = false"
        x-cloak
    ></div>

    <!-- SIDEBAR -->
    <aside 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="flex flex-col w-[280px] shrink-0 h-screen fixed inset-y-0 left-0 z-50 bg-white border-r border-border transition-transform duration-300 overflow-hidden"
    >
        <!-- Top Bar with logo -->
        <div class="flex items-center justify-between border-b border-border h-[90px] px-6 gap-3">
            <div class="flex items-center gap-3 min-w-0">
                @if ($sidebarLogoUrl)
                    <img
                        src="{{ $sidebarLogoUrl }}"
                        alt="{{ $studyprogram?->name ?? 'Logo' }}"
                        class="h-10 w-10 rounded-xl object-contain bg-white ring-1 ring-border shadow-sm shrink-0"
                    >
                @else
                    <div class="size-10 bg-primary rounded-xl flex items-center justify-center shadow-sm shrink-0">
                        <i data-lucide="layout-grid" class="w-6 h-6 text-white"></i>
                    </div>
                @endif
                <h1 class="font-bold text-lg tracking-tight text-primary truncate leading-tight">Prodi {{ $studyprogram?->name ?? 'Prodi UMB' }}</h1>
            </div>
            <button @click="sidebarOpen = false" aria-label="Close sidebar" class="lg:hidden size-10 flex shrink-0 bg-white rounded-xl items-center justify-center ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer">
                <i data-lucide="x" class="size-5 text-secondary"></i>
            </button>
        </div>

        <!-- Navigation Menu -->
        <div class="flex flex-col p-5 pb-28 gap-6 overflow-y-auto flex-1 scrollbar-hide">
            <!-- Main Menu -->
            <div class="flex flex-col gap-4">
                <h3 class="font-medium text-xs uppercase tracking-wider text-secondary pl-2">Menu Utama</h3>
                <div class="flex flex-col gap-1">
                    <a href="{{ route('admin.overview') }}" wire:navigate class="group {{ request()->routeIs('admin.overview') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.overview') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="layout-dashboard" class="size-5 {{ request()->routeIs('admin.overview') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.overview') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Dashboard</span>
                        </div>
                    </a>

                    <h3 class="font-medium text-xs uppercase tracking-wider text-secondary pl-2 mt-4">Data Akademik</h3>

                    <a href="{{ route('admin.studyprogram.index') }}" wire:navigate class="group {{ request()->routeIs('admin.studyprogram.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.studyprogram.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="library" class="size-5 {{ request()->routeIs('admin.studyprogram.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.studyprogram.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Program Studi</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.quantity.index') }}" wire:navigate class="group {{ request()->routeIs('admin.quantity.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.quantity.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="users" class="size-5 {{ request()->routeIs('admin.quantity.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.quantity.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Data Mahasiswa</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.lecturer.index') }}" wire:navigate class="group {{ request()->routeIs('admin.lecturer.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.lecturer.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="user-square-2" class="size-5 {{ request()->routeIs('admin.lecturer.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.lecturer.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Data Dosen</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.curriculum.index') }}" wire:navigate class="group {{ request()->routeIs('admin.curriculum.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.curriculum.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="book-open" class="size-5 {{ request()->routeIs('admin.curriculum.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.curriculum.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Kurikulum</span>
                        </div>
                    </a>

                    <h3 class="font-medium text-xs uppercase tracking-wider text-secondary pl-2 mt-4">Konten & Prestasi</h3>

                    <a href="{{ route('admin.event.index') }}" wire:navigate class="group {{ request()->routeIs('admin.event.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.event.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="calendar" class="size-5 {{ request()->routeIs('admin.event.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.event.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Kegiatan</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.achievement.index') }}" wire:navigate class="group {{ request()->routeIs('admin.achievement.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.achievement.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="trophy" class="size-5 {{ request()->routeIs('admin.achievement.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.achievement.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Karya & Prestasi</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.graduateprofile.index') }}" wire:navigate class="group {{ request()->routeIs('admin.graduateprofile.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.graduateprofile.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="graduation-cap" class="size-5 {{ request()->routeIs('admin.graduateprofile.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.graduateprofile.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Profil Lulusan</span>
                        </div>
                    </a>

                    <h3 class="font-medium text-xs uppercase tracking-wider text-secondary pl-2 mt-4">Pengaturan</h3>

                    <a href="{{ route('admin.userinterface.index') }}" wire:navigate class="group {{ request()->routeIs('admin.userinterface.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.userinterface.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="monitor" class="size-5 {{ request()->routeIs('admin.userinterface.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.userinterface.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Tampilan UI</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.socialmedia.index') }}" wire:navigate class="group {{ request()->routeIs('admin.socialmedia.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.socialmedia.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="share-2" class="size-5 {{ request()->routeIs('admin.socialmedia.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.socialmedia.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Media Sosial</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.contact.index') }}" wire:navigate class="group {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                        <div class="flex items-center rounded-xl p-3.5 gap-3 {{ request()->routeIs('admin.contact.*') ? 'bg-primary/10' : 'hover:bg-muted' }} transition-all duration-300">
                            <i data-lucide="phone" class="size-5 {{ request()->routeIs('admin.contact.*') ? 'text-primary' : 'text-secondary group-hover:text-foreground' }}"></i>
                            <span class="{{ request()->routeIs('admin.contact.*') ? 'font-semibold text-primary' : 'font-medium text-secondary group-hover:text-foreground' }}">Kontak</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 lg:ml-[280px] flex flex-col min-h-screen overflow-x-hidden relative">
        <!-- Top Header Bar -->
        <div class="sticky top-0 z-30 flex items-center justify-between w-full h-[90px] shrink-0 border-b border-border bg-white/80 backdrop-blur-md px-5 md:px-8">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" aria-label="Open menu" class="lg:hidden size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer">
                    <i data-lucide="menu" class="size-6 text-foreground"></i>
                </button>
                <div>
                    <h2 class="font-bold text-2xl text-foreground">{{ $title ?? 'Dashboard' }}</h2>
                    <p class="hidden sm:block text-sm text-secondary">Selamat datang kembali di panel administrasi.</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                {{-- ─── Dark / Light Mode Toggle ─── --}}
                <button
                    id="theme-toggle"
                    onclick="toggleAdminTheme()"
                    title="Ganti tema"
                    aria-label="Toggle dark mode"
                    class="size-11 flex items-center justify-center rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer bg-white dark:bg-zinc-800 relative group"
                >
                    {{-- Sun icon: visible in dark mode (click to go light) --}}
                    <i data-lucide="sun" id="icon-sun" class="size-5 text-warning hidden"></i>
                    {{-- Moon icon: visible in light mode (click to go dark) --}}
                    <i data-lucide="moon" id="icon-moon" class="size-5 text-secondary"></i>
                    <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-[10px] font-bold bg-foreground text-white px-2 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">Ganti Tema</span>
                </button>

                {{-- ─── Profile Dropdown ─── --}}
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button
                        @click="open = !open"
                        class="flex items-center gap-2 h-11 pl-1 pr-3 rounded-xl ring-1 ring-border hover:ring-primary transition-all duration-300 cursor-pointer bg-white dark:bg-zinc-900 group"
                        aria-label="Profile menu"
                    >
                        <div class="size-9 rounded-lg bg-primary flex items-center justify-center text-white font-bold text-sm shrink-0 group-hover:scale-105 transition-transform">
                            {{ auth()->user()->initials() }}
                        </div>
                        <div class="hidden md:block text-left leading-tight min-w-0">
                            <p class="text-sm font-bold text-foreground truncate max-w-[100px]">{{ auth()->user()->name }}</p>
                            <p class="text-[10px] text-secondary">Administrator</p>
                        </div>
                        <i data-lucide="chevron-down" class="size-4 text-secondary hidden md:block transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                        class="absolute right-0 top-14 w-56 bg-white dark:bg-zinc-900 rounded-2xl shadow-2xl border border-border z-50 overflow-hidden"
                        x-cloak
                    >
                        <div class="px-4 py-3 border-b border-border">
                            <p class="text-sm font-bold text-foreground truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-secondary truncate">{{ auth()->user()->email }}</p>
                        </div>

                        <div class="p-2">
                            <a href="{{ route('profile.edit') }}" wire:navigate @click="open = false"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-secondary hover:bg-muted hover:text-foreground transition-colors">
                                <i data-lucide="user-circle-2" class="size-4 shrink-0"></i>
                                <span>Edit Profil</span>
                            </a>
                            <a href="{{ route('user-password.edit') }}" wire:navigate @click="open = false"
                                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-secondary hover:bg-muted hover:text-foreground transition-colors">
                                <i data-lucide="key-round" class="size-4 shrink-0"></i>
                                <span>Ganti Password</span>
                            </a>
                        </div>

                        <div class="p-2 border-t border-border">
                            <button 
                                @click="showLogoutModal = true; open = false"
                                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-bold text-error hover:bg-error/10 transition-colors cursor-pointer"
                            >
                                <i data-lucide="log-out" class="size-4 shrink-0"></i>
                                <span>Keluar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="flex-1 p-5 md:p-8 overflow-y-auto scrollbar-hide">
            {{ $slot }}
        </div>
    </main>

    <!-- Logout Confirmation Modal -->
    <div
        x-show="showLogoutModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[60] flex items-center justify-center px-4 sm:px-0"
        style="display: none;"
    >
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" @click="showLogoutModal = false"></div>

        <div 
            class="relative bg-white dark:bg-zinc-900 rounded-3xl max-w-md w-full p-6 shadow-2xl transform transition-all border border-border"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <div class="flex flex-col items-center text-center">
                <div class="size-14 rounded-full bg-error/10 flex items-center justify-center text-error mb-4">
                    <i data-lucide="log-out" class="size-7"></i>
                </div>
                
                <h3 class="text-xl font-bold text-foreground mb-2">Keluar Aplikasi?</h3>
                <p class="text-secondary text-sm mb-6">
                    Anda akan keluar dari sesi admin. Anda harus login kembali untuk mengakses halaman ini.
                </p>

                <div class="flex gap-3 w-full">
                    <button 
                        @click="showLogoutModal = false"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-border text-foreground font-semibold hover:bg-muted transition-colors"
                    >
                        Batal
                    </button>
                    
                    <form method="POST" action="{{ route('logout') }}" class="flex-1">
                        @csrf
                        <button 
                            type="submit"
                            class="w-full px-4 py-2.5 rounded-xl bg-error text-white font-semibold hover:bg-error-hover shadow-lg shadow-error/20 transition-all hover:scale-[1.02]"
                        >
                            Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="{{ asset('js/admin.js') }}"></script>


@livewireScripts
</body>
</html>


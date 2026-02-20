@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-gradient-to-b from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-800 dark:border-zinc-700 shadow-lg">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboardadmin') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse hover:opacity-80 transition-opacity duration-300" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Dashboard')" class="grid">
                    <flux:navlist.item icon="squares-2x2" :href="route('admin.overview')" :current="request()->routeIs('admin.overview')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Overview') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Data Program Studi')" class="grid">
                    <flux:navlist.item icon="archive-box" :href="route('admin.studyprogram.index')" :current="request()->routeIs('admin.studyprogram.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Program Studi') }}</flux:navlist.item>
                    <flux:navlist.item icon="user" :href="route('admin.quantity.index')" :current="request()->routeIs('admin.quantity.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Jumlah Mahasiswa Aktif') }}</flux:navlist.item>
                    <flux:navlist.item icon="newspaper" :href="route('admin.event.index')" :current="request()->routeIs('admin.event.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Data Kegiatan') }}</flux:navlist.item>
                    <flux:navlist.item icon="user" :href="route('admin.lecturer.index')" :current="request()->routeIs('admin.lecturer.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Data Dosen') }}</flux:navlist.item>
                    <flux:navlist.item icon="trophy" :href="route('admin.achievement.index')" :current="request()->routeIs('admin.achievement.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Data Karya Dan Prestasi') }}</flux:navlist.item>
                    <flux:navlist.item icon="user" :href="route('admin.graduateprofile.index')" :current="request()->routeIs('admin.graduateprofile.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Data Profil Lulusan') }}</flux:navlist.item>
                    <flux:navlist.item icon="newspaper" :href="route('admin.curriculum.index')" :current="request()->routeIs('admin.curriculum.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Data Kurikulum') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Interface')" class="grid">
                    <flux:navlist.item icon="home" :href="route('admin.userinterface.index')" :current="request()->routeIs('admin.userinterface.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Tampilan UI') }}</flux:navlist.item>
                    <flux:navlist.item icon="link" :href="route('admin.socialmedia.index')" :current="request()->routeIs('admin.socialmedia.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Link Media Sosial') }}</flux:navlist.item>
                    <flux:navlist.item icon="home" :href="route('admin.contact.index')" :current="request()->routeIs('admin.contact.index')" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Kontak') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                    class="hover:opacity-80 transition-opacity duration-300"
                />

                <flux:menu class="w-[220px] shadow-lg">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400 to-emerald-600 text-white font-semibold"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden bg-gradient-to-r from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-800 shadow-sm">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                    class="hover:opacity-80 transition-opacity duration-300"
                />

                <flux:menu class="shadow-lg">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400 to-emerald-600 text-white font-semibold"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-300">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:text-red-600 dark:hover:text-red-400 transition-colors duration-300">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>

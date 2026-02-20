<x-layouts.auth.card>
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">{{ __('Buat akun disini') }}</h1>
            <p class="text-sm text-slate-600 dark:text-slate-400">{{ __('Enter your details below to create your account') }}</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Name -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-white dark:text-slate-300">{{ __('Full name') }}</label>
                <flux:input
                    name="name"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="John Doe"
                    class="!rounded-lg"
                />
            </div>

            <!-- Email Address -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-white dark:text-slate-300">{{ __('Email address') }}</label>
                <flux:input
                    name="email"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="!rounded-lg"
                />
            </div>

            <!-- Password -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">{{ __('Password') }}</label>
                <flux:input
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Password')"
                    viewable
                    class="!rounded-lg"
                />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-3">
                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">{{ __('Confirm password') }}</label>
                <flux:input
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirm password')"
                    viewable
                    class="!rounded-lg"
                />
            </div>

            <!-- Submit Button -->
            <flux:button type="submit" variant="primary" class="w-full !py-2.5 !text-sm !font-semibold !rounded-lg hover:shadow-lg transition-all duration-300 mt-2" data-test="register-button">
                {{ __('Create account') }}
            </flux:button>
        </form>

        <!-- Divider -->
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white dark:bg-stone-950 text-slate-600 dark:text-slate-400">{{ __('or') }}</span>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center text-sm text-slate-600 dark:text-slate-400">
            <span>{{ __('Already have an account?') }}</span>
            <flux:link :href="route('login')" class="font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 transition-colors" wire:navigate>
                {{ __('Log in') }}
            </flux:link>
        </div>
    </div>
</x-layouts.auth.card>

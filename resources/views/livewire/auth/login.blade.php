<x-layouts.auth.axoma-login>
    <div class="flex flex-col gap-6">
        <!-- Session Status -->
        <x-auth-session-status class="text-white" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2.5">
                <label class="block text-sm font-semibold text-white mb-1">{{ __('Email') }}</label>
                <input
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    class="w-full px-4 py-3.5 rounded-xl text-slate-900 placeholder-slate-400 bg-white border-2 border-emerald-200 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition-all shadow-sm hover:shadow-md"
                />
                @error('email')
                    <p class="text-sm text-red-200 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2.5">
                <label class="block text-sm font-semibold text-white mb-1">{{ __('Password') }}</label>
                <input
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password Anda"
                    class="w-full px-4 py-3.5 rounded-xl text-slate-900 placeholder-slate-400 bg-white border-2 border-emerald-200 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition-all shadow-sm hover:shadow-md"
                />
                @error('password')
                    <p class="text-sm text-red-200 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-white text-emerald-700 font-bold py-4 px-6 rounded-xl hover:bg-emerald-50 active:bg-emerald-100 transition-all duration-200 uppercase tracking-wide shadow-lg hover:shadow-xl mt-2 transform hover:-translate-y-0.5"
                data-test="login-button"
            >
                {{ __('MASUK') }}
            </button>
        </form>
    </div>
</x-layouts.auth.axoma-login>

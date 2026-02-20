<form {{ $attributes->merge(['class' => 'space-y-8 bg-white border border-border p-8 rounded-3xl shadow-sm']) }}>
    @if (session()->has('message'))
        <div class="p-4 rounded-2xl bg-success-light border border-success/20 text-success font-bold flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <i data-lucide="check-circle" class="size-5"></i>
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-4 rounded-2xl bg-error-light border border-error/20 text-error font-bold flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <i data-lucide="alert-circle" class="size-5"></i>
            {{ session('error') }}
        </div>
    @endif

    {{ $slot }}
</form>
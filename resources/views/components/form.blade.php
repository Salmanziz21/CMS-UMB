<form {{ $attributes->merge(['class' => 'space-y-6 border border-zinc-200 dark:border-zinc-800 p-4 rounded-lg bg-zinc-100 dark:bg-zinc-900']) }}>
    {{ $slot }}
</form>
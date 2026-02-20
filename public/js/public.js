/**
 * public.js
 * Script khusus untuk halaman publik (frontend).
 * Memaksa tema terang (Light Mode) dan mencegah class 'dark' masuk.
 */

(function () {
    // 1. Force light mode immediately
    document.documentElement.classList.remove('dark');
    document.documentElement.classList.add('light'); // Explicitly add light if needed

    // 2. Override localStorage to prevent persistence from re-applying it
    localStorage.setItem('flux-theme', 'light');

    // 3. Use MutationObserver to fight back if Flux/Alpine tries to add 'dark' class
    const forceLightObserver = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                }
            }
        });
    });

    forceLightObserver.observe(document.documentElement, { attributes: true });

    // 4. IMPORTANT: Stop fighting when leaving this page (e.g. going to Admin)
    document.addEventListener('livewire:navigating', () => {
        forceLightObserver.disconnect();
    }, { once: true });
})();

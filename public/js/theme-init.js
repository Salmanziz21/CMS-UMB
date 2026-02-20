/**
 * theme-init.js
 * Script ini dimuat di <head> untuk menerapkan tema (Dark/Light)
 * SEBELUM halaman dirender sepenuhnya, guna meminimalkan efek 'flash' (kedipan).
 */
(function () {
    try {
        var saved = localStorage.getItem('adminTheme');
        var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        // Logika: Jika disimpan 'dark' ATAU (tidak ada simpanan TAPI sistem prefer dark)
        if (saved === 'dark' || (!saved && prefersDark)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    } catch (e) { }
})();

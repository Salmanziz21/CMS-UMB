/**
 * admin.js
 * JavaScript khusus untuk dashboard admin.
 * Berisi inisialisasi ikon Lucide, toggle tema gelap, dan sinkronisasi ikon.
 */

/* ─── Lucide Icons ──────────────────────────────────────────────────────── */
function initLucide() {
    if (window.lucide) {
        lucide.createIcons();
    }
}

/* ─── Theme Management ──────────────────────────────────────────────────── */

/**
 * Terapkan tema berdasarkan localStorage atau preferensi sistem.
 * Juga sinkronisasi ikon matahari/bulan.
 */
function applyAdminTheme() {
    try {
        var saved = localStorage.getItem('adminTheme');
        var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        var isDark = saved === 'dark' || (!saved && prefersDark);
        if (isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        syncThemeIcons(isDark);
    } catch (e) { }
}

/**
 * Toggle tema saat tombol diklik.
 */
window.toggleAdminTheme = function () {
    var isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('adminTheme', isDark ? 'dark' : 'light');
    syncThemeIcons(isDark);
}

/**
 * Sinkronisasi visibilitas ikon matahari dan bulan.
 */
function syncThemeIcons(isDark) {
    var sun = document.getElementById('icon-sun');
    var moon = document.getElementById('icon-moon');
    if (!sun || !moon) return;
    if (isDark) {
        sun.classList.remove('hidden');
        moon.classList.add('hidden');
    } else {
        sun.classList.add('hidden');
        moon.classList.remove('hidden');
    }
}

/* ─── Event Listeners & Hooks ───────────────────────────────────────────── */

// Saat halaman pertama kali dimuat
document.addEventListener('DOMContentLoaded', function () {
    applyAdminTheme();
    initLucide();
});

// Saat navigasi Livewire dimulai (preserve theme)
document.addEventListener('livewire:navigating', function () {
    if (localStorage.getItem('adminTheme') === 'dark') {
        document.documentElement.classList.add('dark');
    }
});

// Saat navigasi Livewire selesai (re-apply theme & icons)
document.addEventListener('livewire:navigated', function () {
    initLucide();
    applyAdminTheme();
});

// Saat Livewire melakukan update DOM parsial (morph)
document.addEventListener('livewire:init', function () {
    Livewire.hook('morph.updated', function () {
        initLucide();
        applyAdminTheme();
    });
});

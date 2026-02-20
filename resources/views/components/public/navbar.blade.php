<div>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/85 backdrop-blur-2xl ">
  <nav class="mx-auto flex h-20 w-full max-w-7xl items-center justify-between px-6 lg:px-10">
    <a href="{{ $sectionUrls['home'] ?? '#' }}" class="group flex items-center gap-4">
      <span class="relative flex h-15 w-15 items-center justify-center">
        <img src="{{ $navbarLogo }}" alt="Logo Program" class="h-12 w-12 object-contain transition-transform duration-300 group-hover:scale-105" />
      </span>
      <div class="leading-tight">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">Universitas Muhammadiyah Bengkulu</p>
        <h1 class="text-lg font-semibold text-slate-900">Program Studi {{ $programStudy?->name }}</h1>
      </div>
    </a>
    <div class="hidden items-center gap-2 text-sm font-medium text-slate-800 md:flex">
      @foreach(($mainLinks ?? []) as $link)
        <a href="{{ $link['href'] }}" class="rounded-full px-4 py-2 text-emerald-700 transition duration-200 hover:bg-emerald-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-400">{{ $link['label'] }}</a>
      @endforeach
      <div class="relative" x-data="{ open: false }">
        <button type="button" id="dropdown-profil-btn" aria-expanded="false" aria-controls="dropdown-profil-menu" class="inline-flex items-center gap-2 rounded-full px-4 py-2 transition hover:bg-emerald-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400/50 focus-visible:ring-offset-2 focus-visible:ring-offset-white text-emerald-700">
          Profil
          <svg class="h-4 w-4 transition" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" /></svg>
        </button>
        <div id="dropdown-profil-menu" class="absolute right-0 mt-3 hidden w-56 overflow-hidden rounded-2xl border border-slate-200 ring-1 ring-slate-200 bg-white shadow-2xl shadow-yellow-200/40 backdrop-blur">
          <ul class="py-2 text-slate-700">
            @foreach(($profilLinks ?? []) as $profil)
              <li><a href="{{ $profil['href'] }}" class="block px-4 py-2 transition hover:bg-emerald-50">{{ $profil['label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="relative" x-data="{ open: false }">
        <button type="button" id="dropdown-mahasiswa-btn" aria-expanded="false" aria-controls="dropdown-mahasiswa-menu" class="inline-flex items-center gap-2 rounded-full px-4 py-2 transition hover:bg-emerald-50 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400/50 focus-visible:ring-offset-2 focus-visible:ring-offset-white text-emerald-700">
          Mahasiswa
          <svg class="h-4 w-4 transition" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" /></svg>
        </button>
        <div id="dropdown-mahasiswa-menu" class="absolute right-0 mt-3 hidden w-56 overflow-hidden rounded-2xl border border-slate-200 ring-1 ring-slate-200 bg-white shadow-2xl shadow-yellow-200/40 backdrop-blur">
          <ul class="py-2 text-slate-700">
            @foreach(($mahasiswaLinks ?? []) as $mahasiswa)
              <li><a href="{{ $mahasiswa['href'] }}" class="block px-4 py-2 transition hover:bg-emerald-50">{{ $mahasiswa['label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <button id="mobile-menu-btn" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-700 transition hover:bg-emerald-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-400 md:hidden" aria-controls="mobile-menu" aria-expanded="false">
      <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />
      </svg>
      <span class="sr-only">Toggle navigation</span>
    </button>
  </nav>
  <div id="mobile-menu" class="absolute inset-x-0 top-20 z-30 hidden px-6 pb-6 md:hidden">
    <div class="mx-auto w-full max-w-7xl">
      <div class="grid gap-3 rounded-2xl border border-slate-200 ring-1 ring-slate-200 bg-white p-4 text-sm font-medium text-slate-700 shadow-2xl shadow-yellow-200/40 backdrop-blur">
        @foreach(($mainLinks ?? []) as $link)
          <a href="{{ $link['href'] }}" class="rounded-xl px-3 py-2 transition hover:bg-emerald-50">{{ $link['label'] }}</a>
        @endforeach
        <button id="mobile-profil-btn" type="button" aria-expanded="false" aria-controls="mobile-profil-menu" class="flex items-center justify-between rounded-xl px-3 py-2 transition hover:bg-emerald-50">
          <span>Profil</span>
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" /></svg>
        </button>
        <div id="mobile-profil-menu" class="hidden space-y-2 rounded-xl border border-slate-200 bg-white p-3">
          @foreach(($profilLinks ?? []) as $profil)
            <a href="{{ $profil['href'] }}" class="block rounded-lg px-3 py-2 transition hover:bg-emerald-50">{{ $profil['label'] }}</a>
          @endforeach
        </div>
        <button id="mobile-mahasiswa-btn" type="button" aria-expanded="false" aria-controls="mobile-mahasiswa-menu" class="flex items-center justify-between rounded-xl px-3 py-2 transition hover:bg-emerald-50">
          <span>Mahasiswa</span>
          <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" /></svg>
        </button>
        <div id="mobile-mahasiswa-menu" class="hidden space-y-2 rounded-xl border border-slate-200 bg-white p-3">
          @foreach(($mahasiswaLinks ?? []) as $mahasiswa)
            <a href="{{ $mahasiswa['href'] }}" class="block rounded-lg px-3 py-2 transition hover:bg-emerald-50">{{ $mahasiswa['label'] }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/animations.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</header>
</div>

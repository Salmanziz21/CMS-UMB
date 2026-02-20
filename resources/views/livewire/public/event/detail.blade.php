<div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="relative min-h-screen bg-gradient-to-b from-white via-emerald-50/50 to-white text-slate-900">
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-20 left-1/3 h-[30rem] w-[30rem] rounded-full bg-emerald-300/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-[26rem] w-[26rem] translate-x-1/3 translate-y-1/3 rounded-full bg-yellow-200/30 blur-3xl"></div>
        </div>

        <x-public.navbar />

        <!-- Hero -->
        <section id="home" class="relative overflow-hidden pt-32 pb-40">
            <div class="absolute inset-0">
                @if($event->documentation)
                    <img src="{{ asset('storage/' . $event->documentation) }}" alt="Dokumentasi {{ $event->title }}" class="h-full w-full object-cover">
                @else
                    <div class="h-full w-full bg-gradient-to-r from-emerald-200 via-emerald-100 to-white"></div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/70 to-transparent"></div>
            </div>

            <div class="relative mx-auto flex max-w-6xl flex-col gap-12 px-6 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-3xl space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white px-5 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-emerald-700 shadow-lg shadow-yellow-200/60">Agenda Program Studi</span>
                    <h1 class="text-4xl font-bold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-[3.6rem] text-balance">
                        {{ $event->title }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-slate-700">
                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-emerald-700">
                            <i class="fa-regular fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                        </span>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home') }}#event" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-400 via-emerald-300 to-emerald-400 px-6 py-3 text-sm font-semibold text-slate-950 shadow-lg shadow-emerald-500/40 transition hover:scale-[1.02]">
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali ke Agenda
                        </a>
                    </div>
                </div>

                @if($event->documentation)
                    <div class="w-full max-w-xl overflow-hidden rounded-[2.5rem] border border-white/60 bg-white/70 shadow-[0_35px_80px_-40px_rgba(16,185,129,0.4)]">
                        <img src="{{ asset('storage/' . $event->documentation) }}" alt="Dokumentasi {{ $event->title }}" class="h-[22rem] w-full object-cover">
                    </div>
                @endif
            </div>
        </section>

        <!-- Detail Content -->
        <main class="relative z-10 -mt-24 pb-32">
            <div class="mx-auto max-w-6xl space-y-10 px-6">
                <div class="grid gap-8 lg:grid-cols-[1.5fr_0.9fr]">
                    <article class="rounded-[2.5rem] border border-emerald-100 bg-white/95 p-10 shadow-[0_35px_80px_-40px_rgba(16,185,129,0.35)] ring-1 ring-emerald-500/10 backdrop-blur-sm">
                        <div class="space-y-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-emerald-600">Tentang Kegiatan</p>
                            <h2 class="text-3xl font-semibold text-slate-900">{{ $event->title }}</h2>
                            <p class="text-base leading-relaxed text-slate-700 break-all">
                                {{ $event->description }}
                            </p>
                        </div>
                    </article>

                    <aside class="space-y-6">
                        <div class="rounded-[2rem] border border-emerald-100 bg-white/90 p-8 shadow-[0_25px_60px_-40px_rgba(16,185,129,0.45)]">
                            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-emerald-600">Informasi Utama</p>
                            <ul class="mt-6 space-y-5 text-sm text-slate-700">
                                <li class="flex items-center gap-3">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-emerald-50 text-emerald-600"><i class="fa-regular fa-calendar"></i></span>
                                    {{ \Carbon\Carbon::parse($event->date)->isoFormat('dddd, DD MMMM YYYY') }}
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
    </div>
    <x-public.footer />
    
    <script src="{{ asset('js/animations.js') }}"></script> 
    <script src="{{ asset('js/app.js') }}"></script> 
</div>

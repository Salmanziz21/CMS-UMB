<div>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <div class="public-home relative min-h-screen scroll-smooth selection:bg-emerald-200/50 selection:text-emerald-950 antialiased text-slate-900 overflow-hidden">
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
      <div class="absolute -top-40 left-1/2 h-[52rem] w-[52rem] -translate-x-1/2 rounded-full bg-emerald-400/12 blur-3xl animate-float-slow"></div>
      <div class="absolute top-20 -left-32 h-[30rem] w-[30rem] rounded-full bg-teal-300/8 blur-3xl animate-float-slow" style="animation-delay: 1.2s;"></div>
      <div class="absolute bottom-10 right-0 h-[36rem] w-[36rem] rounded-full bg-amber-200/25 blur-[100px] animate-float-slow" style="animation-delay: 2.4s;"></div>
    </div>
    
    <!-- Header -->
    <x-public.navbar />
    
    <!-- Main Content -->
    <main class="relative z-10">

      <!-- Halaman Awal -->
      <section id="home" class="relative overflow-hidden pt-28 pb-40 min-h-[85vh] flex flex-col justify-center scroll-mt-24 md:scroll-mt-28">
        <div class="absolute inset-0 animate-zoom-in-slow">
          <img src="{{ $homeBackground }}" alt="Latar belakang" class="h-full w-full object-cover object-center relative z-0">
          <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/55 to-black/20 animate-fade-in"></div>
        </div>
        
        <div class="relative w-full">
          <div class="mx-auto flex max-w-7xl flex-col gap-16 px-6 lg:px-10 md:flex-row md:items-center md:justify-between" data-animate-group>
          <div class="order-2 max-w-2xl space-y-8 text-slate-900 md:order-1 md:w-1/2 relative z-10">
            <span class="inline-flex items-center gap-2 rounded-full bg-white/95 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.3em] text-emerald-700 shadow-xl shadow-black/10 backdrop-blur-md border border-white/50 animate-fade-in-up" data-animate>
              <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
              Fokus Pada Masa Depan
            </span>
            
            <h2 class="text-4xl font-extrabold text-white leading-[1.15] tracking-tight sm:text-5xl lg:text-[3.6rem] xl:text-[4rem] text-balance [text-shadow:_0_2px_20px_rgba(0,0,0,0.5)] animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
              Selamat Datang di <br>
              <span class="inline-block text-emerald-400" style="font-family: 'Sora', sans-serif;">
                Program Studi {{ $primaryStudyProgram?->name }} UMB
              </span>
            </h2>
            
            <div class="relative animate-fade-in-up" data-animate data-animate-delay="200">
              <p class="text-base sm:text-lg leading-relaxed text-slate-200 max-w-xl break-words [text-shadow:_0_1px_8px_rgba(0,0,0,0.6)]">
                {{ \Illuminate\Support\Str::limit($primaryStudyProgram?->description ?? 'Deskripsi program studi belum tersedia.', 180) }}
              </p>
            </div>

            @if ($primaryStudyProgram?->accreditation)
            <div class="inline-flex items-center gap-3 rounded-2xl border border-white/20 bg-white/5 px-5 py-3 text-sm font-semibold text-white shadow-xl backdrop-blur-md animate-fade-in-up ring-1 ring-white/10" data-animate data-animate-delay="260">
              <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/25 text-emerald-300">
                <i class="fas fa-award text-lg"></i>
              </span>
              <div>
                <p class="text-[10px] uppercase tracking-[0.35em] text-slate-400">Akreditasi</p>
                <p class="text-base font-bold text-white">{{ $primaryStudyProgram->accreditation }}</p>
              </div>
            </div>
            @endif
            
            <div class="flex flex-wrap gap-3 sm:gap-4 animate-fade-in-up" data-animate data-animate-delay="300">
              <a href="#about" class="group inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-3.5 text-sm font-bold text-white shadow-xl shadow-emerald-900/40 transition-all duration-300 hover:from-emerald-400 hover:to-emerald-500 hover:scale-[1.02] hover:shadow-2xl hover:shadow-emerald-500/30 active:scale-[0.98]">
                <span>Jelajahi Program</span>
                <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
              </a>
              <a href="#contact" class="inline-flex items-center justify-center gap-2 rounded-xl border-2 border-white/60 bg-white/10 px-6 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/20 hover:border-white/80 hover:scale-[1.02] active:scale-[0.98] backdrop-blur-sm">
                <i class="fas fa-comments text-sm"></i>
                Diskusi dengan Kami
              </a>
            </div>
          </div>

          <div class="order-1 flex flex-1 items-center justify-center md:order-2 md:w-1/2 relative z-10 animate-fade-in-up" data-animate data-animate-delay="400">
            <div class="relative flex items-center justify-center">
              <img src="{{ $homeLogo }}" alt="Logo Program" class="h-92 w-auto drop-shadow-2xl animate-float relative z-10" />
            </div>
          </div>
          </div>
        </div>
      </section>

      <!-- Data Jumlah Mahasiswa dan Dosen -->
      <section class="relative -mt-20 pb-28 scroll-mt-24 md:scroll-mt-28">
        <div class="mx-auto grid max-w-7xl gap-6 px-6 lg:px-10 md:grid-cols-2 xl:gap-8" data-animate-group>
          <div class="animate-fade-in-up group relative overflow-hidden rounded-3xl border border-emerald-200/50 bg-white/90 p-8 text-slate-900 shadow-xl shadow-slate-200/50 backdrop-blur-xl card-glow animate-card" data-animate data-animate-delay="100">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-200/40 to-transparent rounded-bl-[100px]"></div>
            <div class="relative z-10">
              <div class="flex items-center gap-3 mb-5">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-amber-100 to-amber-50 group-hover:from-emerald-100 group-hover:to-emerald-50 transition-all duration-500 shadow-inner">
                  <i class="fas fa-graduation-cap text-amber-600 group-hover:text-emerald-600 transition-colors duration-500 text-xl"></i>
                </div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-emerald-600 font-bold">Mahasiswa Aktif</p>
              </div>
              <p class="mt-4 text-5xl xl:text-6xl font-extrabold tabular-nums text-slate-900 group-hover:text-emerald-700 transition-colors duration-500 animate-count-up" data-target="{{ number_format($number_students, 0, '', '') }}" style="font-family: 'Sora', sans-serif;">{{ number_format($number_students, 0, '', '') }}</p>
              <p class="mt-5 text-sm text-slate-600 leading-relaxed">Belajar, berinovasi, dan berkontribusi di ekosistem digital kampus.</p>
            </div>
          </div>
          <div class="animate-fade-in-up group relative overflow-hidden rounded-3xl border border-emerald-200/50 bg-white/90 p-8 text-slate-900 shadow-xl shadow-slate-200/50 backdrop-blur-xl card-glow animate-card" data-animate data-animate-delay="200">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-sky-200/40 to-transparent rounded-bl-[100px]"></div>
            <div class="relative z-10">
              <div class="flex items-center gap-3 mb-5">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-sky-50 group-hover:from-emerald-100 group-hover:to-emerald-50 transition-all duration-500 shadow-inner">
                  <i class="fas fa-chalkboard-user text-sky-600 group-hover:text-emerald-600 transition-colors duration-500 text-xl"></i>
                </div>
                <p class="text-[11px] uppercase tracking-[0.3em] text-emerald-600 font-bold">Dosen Profesional</p>
              </div>
              <p class="mt-4 text-5xl xl:text-6xl font-extrabold tabular-nums text-slate-900 group-hover:text-emerald-700 transition-colors duration-500 animate-count-up" data-target="{{ number_format($totalDataDosen, 0, '', '') }}" style="font-family: 'Sora', sans-serif;">{{ number_format($totalDataDosen, 0, '', '') }}</p>
              <p class="mt-5 text-sm text-slate-600 leading-relaxed">Mentor ahli dari berbagai bidang teknologi dan industri kreatif.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Tentang Kami -->
      <section id="about" class="relative py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-white via-emerald-50/40 to-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-16 px-6 lg:px-10 lg:flex-row lg:items-center" data-animate-group>
          <div class="space-y-8 lg:w-1/2">
            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100/80 px-4 py-2 text-xs font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/60 animate-fade-in-up" data-animate>
              <i class="fas fa-info-circle text-emerald-600"></i>
              Tentang Kami
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 text-balance leading-tight animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
              Program Studi {{ $primaryStudyProgram?->name ?? 'UMB' }} yang <span class="bg-gradient-to-r from-emerald-60 bg-clip-text ">adaptif dan berdampak</span>.
            </h2>
            <p class="text-base leading-relaxed text-slate-600 sm:text-lg max-w-xl animate-fade-in-up break-words" data-animate data-animate-delay="200">
              {{ $primaryStudyProgram?->profilestudy ?? 'Deskripsi program studi belum tersedia.' }}  
            </p>
            <div class="pt-2 animate-fade-in-up" data-animate data-animate-delay="300">
              <a href="#kurikulum" class="group inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/35 transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/40 hover:scale-[1.02] active:scale-[0.98]">
                <span>Lihat Kurikulum</span>
                <i class="fas fa-arrow-right text-xs transition-transform group-hover:translate-x-1"></i>
              </a>
            </div>
          </div>

          <div class="lg:w-1/2 animate-fade-in-up" data-animate data-animate-delay="300">
            <div class="overflow-hidden rounded-3xl border border-emerald-200/40 bg-white/95 p-10 shadow-[0_32px_64px_-24px_rgba(16,185,129,0.2)] ring-1 ring-emerald-500/10 backdrop-blur-sm card-glow">
              <div class="flex items-center gap-3 mb-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-100 to-emerald-50">
                  <i class="fas fa-chart-bar text-emerald-600 text-lg"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900" style="font-family: 'Sora', sans-serif;">Fakta Singkat</h3>
              </div>
              <dl class="grid gap-8 sm:grid-cols-2">
                <div class="animate-fade-in-up group rounded-2xl p-4 -m-2 hover:bg-emerald-50/50 transition-colors" data-animate data-animate-delay="100">
                  <div class="flex items-center gap-2 mb-2">
                    <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                    <dt class="text-xs font-bold text-slate-600 uppercase tracking-wider">Mahasiswa Aktif</dt>
                  </div>
                  <dd class="text-3xl font-extrabold text-slate-900 tabular-nums animate-count-up group-hover:text-emerald-600 transition-colors" data-target="{{ number_format($number_students, 0, '', '') }}" style="font-family: 'Sora', sans-serif;">{{ number_format($number_students, 0, ',', '.') }}</dd>
                  <p class="mt-2 text-xs text-slate-500">Dari berbagai provinsi dengan latar belakang multidisiplin.</p>
                </div>
                <div class="animate-fade-in-up group rounded-2xl p-4 -m-2 hover:bg-emerald-50/50 transition-colors" data-animate data-animate-delay="200">
                  <div class="flex items-center gap-2 mb-2">
                    <div class="h-2 w-2 rounded-full bg-emerald-500"></div>
                    <dt class="text-xs font-bold text-slate-600 uppercase tracking-wider">Dosen Profesional</dt>
                  </div>
                  <dd class="text-3xl font-extrabold text-slate-900 tabular-nums animate-count-up group-hover:text-emerald-600 transition-colors" data-target="{{ number_format($totalDataDosen, 0, '', '') }}" style="font-family: 'Sora', sans-serif;">{{ number_format($totalDataDosen, 0, ',', '.') }}</dd>
                  <p class="mt-2 text-xs text-slate-500">Aktif dalam penelitian, publikasi, dan kolaborasi industri.</p>
                </div>
              </dl>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Visi misi -->
      <section id="visimisi" class="relative py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-emerald-50/30 via-white to-emerald-50/30">
        <div class="mx-auto max-w-7xl space-y-14 px-6 lg:px-10" data-animate-group>
          <div class="flex flex-col items-start gap-6 text-slate-900 md:flex-row md:items-end md:justify-between">
            <div class="space-y-4 max-w-2xl">
              <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-100 to-emerald-100 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/50 animate-fade-in-up" data-animate>
                <i class="fas fa-target text-amber-500"></i>
                Identitas
              </span>
              <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
                Visi dan Misi Kami
              </h2>
            </div>
          </div>

          <div class="grid gap-6 md:grid-cols-2" data-animate-group>
            <div class="relative overflow-hidden rounded-3xl border border-emerald-200/50 bg-white p-10 text-slate-900 shadow-xl shadow-slate-200/40 backdrop-blur-lg card-glow animate-card group" data-animate data-animate-delay="100">
              <div class="absolute -top-16 right-8 h-32 w-32 rounded-full bg-emerald-200/30 blur-2xl group-hover:bg-emerald-300/40 transition-colors duration-300"></div>
              <div class="relative z-10">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 mb-5">
                  <i class="fas fa-eye text-emerald-600 text-lg"></i>
                </div>
                <p class="text-[11px] font-bold uppercase tracking-[0.3em] text-emerald-600 mb-3">Visi</p>
                <p class="text-base leading-relaxed text-slate-600 break-words">
                  {{ $primaryStudyProgram?->vision ?? 'Visi program studi belum tersedia.' }}
                </p>
              </div>
            </div>
            <div class="relative overflow-hidden rounded-3xl border border-emerald-200/50 bg-white p-10 text-slate-900 shadow-xl shadow-slate-200/40 backdrop-blur-lg card-glow animate-card group" data-animate data-animate-delay="200">
              <div class="absolute -bottom-12 left-8 h-32 w-32 rounded-full bg-emerald-200/25 blur-2xl group-hover:bg-emerald-300/35 transition-colors duration-300" style="animation-delay: 1s;"></div>
              <div class="relative z-10">
                <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 mb-5">
                  <i class="fas fa-compass text-emerald-600 text-lg"></i>
                </div>
                <p class="text-[11px] font-bold uppercase tracking-[0.3em] text-emerald-600 mb-3">Misi</p>
                <p class="text-base leading-relaxed text-slate-600 break-words">
                  {{ $primaryStudyProgram?->mission ?? 'Misi program studi belum tersedia.' }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Sejarah -->
      <section id="history" class="relative overflow-hidden py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-white via-emerald-50/50 to-white">
        <div class="pointer-events-none absolute inset-0">
          <div class="absolute left-1/2 top-12 h-72 w-72 -translate-x-1/2 rounded-full bg-emerald-200/30 blur-3xl animate-pulse-slow"></div>
          <div class="absolute bottom-0 right-10 h-56 w-56 rounded-full bg-emerald-100/40 blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="relative mx-auto max-w-4xl px-6 text-center" data-animate-group>
          <span class="inline-flex items-center gap-2 rounded-full bg-white/90 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.3em] text-emerald-600 shadow-lg shadow-emerald-500/10 ring-1 ring-emerald-200/50 animate-fade-in-up" data-animate>
            Sejarah
          </span>
          <h2 class="mt-8 text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
            Perjalanan Panjang Penuh Pencapaian
          </h2>
          @forelse ($historyParagraphs as $index => $paragraph)
            <p class="text-left mx-auto mt-6 max-w-3xl text-base leading-relaxed text-slate-600 sm:text-lg animate-fade-in-up break-words" data-animate data-animate-delay="{{ 200 + ($index * 50) }}">
              {{ $paragraph }}
            </p>
          @empty
            <p class="text-left mx-auto mt-6 max-w-3xl text-base leading-relaxed text-slate-600 sm:text-lg animate-fade-in-up break-words" data-animate data-animate-delay="200">
              {{ $historyContent }}
            </p>
          @endforelse
        </div>
      </section>

      <!-- Daftar Dosen -->
      <section id="dosen" class="relative py-28 scroll-mt-24 md:scroll-mt-28 overflow-hidden bg-gradient-to-b from-emerald-50/30 via-white to-emerald-50/20">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
          <div class="absolute -top-40 -right-40 w-96 h-96 bg-emerald-200/15 rounded-full blur-3xl"></div>
          <div class="absolute top-1/2 -left-40 w-80 h-80 bg-emerald-300/8 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-emerald-200/12 rounded-full blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 text-slate-900" data-animate-group>
          <div class="flex flex-col items-start gap-5 md:flex-row md:items-center md:justify-between mb-16">
            <div class="animate-fade-in-up" data-animate>
              <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100/80 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/50">
                <i class="fas fa-chalkboard-user text-emerald-600"></i>
                Pengajar
              </span>
              <h2 class="mt-6 text-3xl sm:text-4xl md:text-5xl font-extrabold text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
                Mentor Profesional &amp; <span class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Berpengalaman</span>
              </h2>
              <p class="mt-4 text-base sm:text-lg text-slate-600 max-w-2xl animate-fade-in-up" data-animate data-animate-delay="150">
                Tim pengajar berdedikasi dengan pengalaman industri yang luas siap membimbing Anda menuju kesuksesan.
              </p>
            </div>
          </div>

          <div class="mt-12 space-y-10">
            <div class="lecturer-grid" data-animate-group data-lecturer-grid data-items-per-page="{{ $lecturerItemsPerPage }}">
              @forelse ($lectures as $lecture)
                <article class="lecturer-card animate-card" data-animate data-animate-delay="{{ ($loop->iteration * 60) + 200 }}" data-lecturer-card>
                  <div class="lecturer-card__inner">
                    <figure class="lecturer-card__media">
                      <div class="lecturer-card__media-glow"></div>
                      <img src="{{ $lecture->photo ? asset('storage/' . $lecture->photo) : asset('images/placeholder-profile.png') }}" alt="{{ $lecture->name }}" loading="lazy">
                    </figure>
                    <div class="lecturer-card__body">
                      <div class="lecturer-card__top">
                        <span class="lecturer-card__badge">{{ strtoupper($lecture->expertise ?? $lecture->major ?? 'BIDANG KEAHLIAN') }}</span>
                      </div>
                      <div class="lecturer-card__info">
                        <h3>{{ $lecture->name }}</h3>
                        <p class="lecturer-card__role">{{ $lecture->position ?? 'Dosen ' . ($lecture->major ?? 'Profesional') }}</p>
                        <p class="lecturer-card__bio">{{ \Illuminate\Support\Str::limit($lecture->description ?? 'Dosen berpengalaman di bidang ' . ($lecture->major ?? 'keahlian digital') . ' dengan kolaborasi riset dan industri.', 150) }}</p>
                      </div>
                      <div class="lecturer-card__tags">
                        <span class="lecturer-pill">
                          <i class="fas fa-flask"></i>
                          {{ $lecture->research_focus ?? $lecture->major ?? 'Penelitian Terapan' }}
                        </span>
                        <span class="lecturer-pill lecturer-pill--outline">
                          <i class="fas fa-user-graduate"></i>
                          {{ $lecture->experience_years ? $lecture->experience_years . '+ Tahun' : 'Pembimbing Akademik' }}
                        </span>
                      </div>
                    </div>
                  </div>
                </article>
              @empty
                <div class="md:col-span-2 lg:col-span-3 rounded-3xl border border-dashed border-emerald-200 bg-gradient-to-br from-emerald-50/50 to-white p-12 text-center text-slate-500 animate-fade-in-up" data-animate>
                  <i class="fas fa-users text-4xl text-emerald-200 mb-4"></i>
                  <p class="text-lg font-medium">Belum ada data dosen yang ditampilkan.</p>
                </div>
              @endforelse
            </div>

            @if ($totalLecturerPages > 1)
              <nav class="lecturer-pagination" aria-label="Navigasi daftar dosen" data-lecturer-pagination data-animate data-animate-delay="200">
                <button type="button" class="lecturer-page-btn" data-pagination-prev>
                  <i class="fas fa-chevron-left"></i>
                  Previous
                </button>

                <div class="lecturer-page-numbers" data-pagination-numbers>
                  @foreach ($initialLecturerPages as $index => $page)
                    @if ($page === '...')
                      <span class="lecturer-page-ellipsis">&hellip;</span>
                    @else
                      <button type="button" class="lecturer-page-number {{ $index === 0 ? 'is-active' : '' }}">
                        {{ $page }}
                      </button>
                    @endif
                  @endforeach
                </div>

                <button type="button" class="lecturer-page-btn" data-pagination-next>
                  Next
                  <i class="fas fa-chevron-right"></i>
                </button>
              </nav>
            @endif
          </div>
        </div>
      </section>

      <!-- Profil Lulusan -->
      <section id="graduateprofile" class="relative overflow-hidden py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-emerald-50/30 via-white to-emerald-50/40">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 text-slate-900" data-animate-group>
          <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between mb-14">
            <div class="animate-fade-in-up" data-animate>
              <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-100 to-emerald-100 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/50">
                <i class="fas fa-graduation-cap text-amber-500"></i>
                Profil Lulusan
              </span>
              <h2 class="mt-6 text-3xl sm:text-4xl md:text-5xl font-extrabold text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
                Ciptakan Karier yang <span class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Berdampak</span>
              </h2>
            </div>
          </div>
          <div class="grid gap-8 md:grid-cols-3" data-animate-group>
            @forelse ($graduateProfiles as $index => $graduateProfile)
            <div class="group relative overflow-hidden rounded-3xl border border-emerald-200/50 bg-white p-8 shadow-xl shadow-slate-200/40 backdrop-blur-lg card-glow animate-card" data-animate data-animate-delay="{{ ($index * 100) + 200 }}">
              <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/0 to-emerald-500/0 group-hover:from-emerald-500/5 group-hover:to-emerald-500/10 transition-all duration-300"></div>
              <div class="relative z-10">
                <div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-100 mb-4 group-hover:bg-emerald-200 transition-colors">
                  <i class="fas fa-star text-emerald-600 text-sm"></i>
                </div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-700 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 300 }}">
                  {{ $graduateProfile->title }}
                </p>
                <p class="mt-4 text-sm leading-relaxed text-slate-600 break-words animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 400 }}">
                  {{ $graduateProfile->description }}
                </p>
              </div>
            </div>
            @empty
            <div class="mt-6 md:col-span-3 rounded-3xl border border-dashed border-slate-200 bg-white/60 p-10 text-center text-slate-500 col-span-3 animate-fade-in-up" data-animate>
              <i class="fas fa-inbox text-4xl text-slate-300 mb-4"></i>
              <p class="text-lg font-medium">Belum ada data profil lulusan yang ditampilkan.</p>
            </div>
            @endforelse
          </div>
        </div>
      </section>

      <!-- Kurikulum -->
      <section id="kurikulum" class="relative overflow-hidden py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-emerald-50/30 via-white to-emerald-50/30">
        <div class="pointer-events-none absolute inset-0">
          <div class="absolute -top-40 right-0 h-96 w-96 rounded-full bg-emerald-200/25 blur-3xl animate-pulse-slow"></div>
          <div class="absolute -bottom-20 left-1/4 h-80 w-80 rounded-full bg-amber-200/15 blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="mx-auto max-w-7xl px-6 lg:px-10 text-slate-900 relative z-10" data-animate-group>
          <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between mb-16">
            <div class="animate-fade-in-up" data-animate>
              <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100/80 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/50">
                <i class="fas fa-book text-emerald-600"></i>
                Kurikulum
              </span>
              <h2 class="mt-6 text-3xl sm:text-4xl md:text-5xl font-extrabold text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
                Kurikulum Program Studi {{ $primaryStudyProgram?->name }}
              </h2>
              <p class="mt-4 text-base sm:text-lg text-slate-600 animate-fade-in-up" data-animate data-animate-delay="150">
                Rancangan pembelajaran yang <span class="font-bold text-emerald-700">komprehensif dan relevan</span> dengan industri
              </p>
            </div>
          </div>

          @if ($curriculums && $curriculums->count() > 0)
            <!-- Tabs untuk semester -->
            <div class="mb-12 flex flex-wrap gap-3 animate-fade-in-up" data-animate data-animate-delay="200">
              @foreach ($curriculums->keys() as $index => $semester)
                <button 
                  type="button"
                  data-semester="{{ $semester }}"
                  class="semester-tab inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold transition-all duration-300 {{ $index === 0 ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/50' : 'bg-white text-slate-700 border border-slate-200 hover:border-emerald-400 hover:text-emerald-600' }} animate-hover-lift"
                >
                  <i class="fas fa-book-open"></i>
                  {{ $semester }}
                </button>
              @endforeach
            </div>

            <!-- Konten Kurikulum per Semester -->
            @foreach ($curriculums as $semester => $subjects)
              <div 
                class="semester-content {{ $loop->first ? '' : 'hidden' }} animate-fade-in-up" 
                data-semester="{{ $semester }}"
                data-animate 
                data-animate-delay="300"
              >
                <div class="overflow-hidden rounded-3xl border border-emerald-100/60 bg-white/95 shadow-2xl shadow-emerald-200/40 backdrop-blur-sm">
                  <!-- Header Tabel -->
                  <div class="grid grid-cols-12 gap-4 bg-gradient-to-r from-emerald-600 to-emerald-500 px-8 py-6 text-white">
                    <div class="col-span-8 md:col-span-9">
                      <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-100">Mata Kuliah</p>
                    </div>
                    <div class="col-span-4 md:col-span-3">
                      <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-100 text-right">SKS</p>
                    </div>
                  </div>

                  <!-- Daftar Mata Kuliah -->
                  <div class="divide-y divide-emerald-100">
                    @foreach ($subjects as $index => $curriculum)
                      <div 
                        class="grid grid-cols-12 gap-4 px-8 py-5 transition-all duration-300 hover:bg-emerald-50/50 animate-fade-in-up"
                        data-animate
                        data-animate-delay="{{ 400 + ($index * 50) }}"
                      >
                        <div class="col-span-8 md:col-span-9 flex items-center">
                          <div class="flex items-center gap-4 w-full">
                            <div class="flex-shrink-0 flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 font-semibold text-sm">
                              {{ $index + 1 }}
                            </div>
                            <div class="flex-1 min-w-0">
                              <p class="text-base font-semibold text-slate-900 capitalize break-words">
                                {{ $curriculum->subject }}
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-span-4 md:col-span-3 flex items-center justify-end">
                          <div class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2">
                            <i class="fas fa-graduation-cap text-emerald-600 text-sm"></i>
                            <span class="font-semibold text-emerald-700">{{ $curriculum->number_sks }}</span>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  <!-- Total SKS -->
                  <div class="bg-gradient-to-r from-emerald-50 to-emerald-50/50 px-8 py-5 border-t border-emerald-100">
                    <div class="flex items-center justify-between">
                      <p class="text-sm font-semibold text-slate-600 uppercase tracking-[0.1em]">Total SKS</p>
                      <div class="inline-flex items-center gap-3 rounded-full bg-emerald-600 px-6 py-2 text-white font-bold">
                        <i class="fas fa-calculator text-lg"></i>
                        <span class="text-lg">{{ $subjects->sum('number_sks') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="rounded-3xl border-2 border-dashed border-slate-200 bg-slate-50/50 p-16 text-center animate-fade-in-up" data-animate>
              <div class="flex flex-col items-center gap-4">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-slate-200">
                  <i class="fas fa-book text-2xl text-slate-400"></i>
                </div>
                <p class="text-lg font-semibold text-slate-600">Kurikulum belum tersedia</p>
                <p class="text-sm text-slate-500">Data kurikulum akan ditampilkan segera</p>
              </div>
            </div>
          @endif
        </div>
      </section>

      <!-- Galeri Kegiatan -->
      <section id="event" class="relative bg-gradient-to-b from-white via-emerald-50/40 to-white py-24 scroll-mt-24 md:scroll-mt-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 text-slate-900" data-animate-group>
          <div class="text-center max-w-3xl mx-auto space-y-4 mb-12">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-100 to-emerald-50 px-5 py-2 text-xs font-semibold uppercase tracking-[0.35em] text-emerald-600 animate-fade-in-up" data-animate>
              <i class="fas fa-calendar-check text-emerald-600"></i>
              Agenda
            </span>
            <h2 class="text-4xl font-bold md:text-5xl text-balance animate-fade-in-up" data-animate data-animate-delay="100">
              Kegiatan <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Terbaru</span>
            </h2>
            <p class="text-base text-slate-600 animate-fade-in-up" data-animate data-animate-delay="200">
              Koleksi dokumentasi kegiatan dan acara terbaru dari program studi kami.
            </p>
          </div>

          <div class="relative animate-fade-in-up" data-animate data-animate-delay="300" id="gallery-event" data-gallery="event">
            <div class="overflow-hidden rounded-[2.5rem] border border-emerald-200/60 bg-gradient-to-br from-white/95 to-emerald-50/30 shadow-[0_35px_80px_-40px_rgba(16,185,129,0.3)]">
              <div class="flex transition-transform duration-500 ease-out" data-gallery-track>
                @forelse ($featuredEvents as $index => $event)
                  <figure class="min-w-full flex flex-col md:flex-row items-center gap-8 p-6 md:p-10 animate-card" data-animate data-animate-delay="{{ ($index * 100) + 400 }}">
                    <div class="relative w-full md:w-2/3 h-64 md:h-80 overflow-hidden rounded-3xl shadow-xl group">
                      @if($event->documentation)
                        <img src="{{ asset('storage/' . $event->documentation) }}" alt="{{ $event->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" />
                      @else
                        <div class="h-full w-full bg-gradient-to-br from-emerald-200 to-green-100 flex items-center justify-center">
                          <i class="fa-solid fa-calendar-days text-emerald-600 text-4xl"></i>
                        </div>
                      @endif
                      <span class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/90 backdrop-blur-sm px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-600 shadow-lg">
                        <i class="fas fa-calendar text-emerald-600 text-xs"></i>
                        Kegiatan
                      </span>
                    </div>
                    <figcaption class="w-full md:w-1/3 space-y-4 text-center md:text-left">
                      <div class="flex items-center gap-2 md:justify-start justify-center">
                        <i class="fas fa-clock text-emerald-600 text-sm"></i>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-emerald-600 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 450 }}">
                          {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </p>
                      </div>
                      <h3 class="text-2xl font-bold text-slate-900 animate-fade-in-up leading-tight" data-animate data-animate-delay="{{ ($index * 100) + 500 }}">
                        {{ $event->title }}
                      </h3>
                      <p class="text-sm leading-relaxed text-slate-600 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 550 }}">
                        {{ $event->description }}
                      </p>
                      <div class="pt-3 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 600 }}">
                        <a href="{{ route('event.detail', $event) }}" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/30 transition-all duration-300 hover:shadow-emerald-600/50 hover:scale-105 active:scale-95 animate-hover-lift">
                          <i class="fas fa-arrow-right text-xs"></i>
                          Lihat Selengkapnya
                        </a>
                      </div>
                    </figcaption>
                  </figure>
                @empty
                  <figure class="min-w-full flex flex-col md:flex-row items-center gap-8 p-6 md:p-10 animate-card">
                    <div class="relative w-full md:w-2/3 h-64 md:h-80 overflow-hidden rounded-3xl shadow-xl bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                      <i class="fa-solid fa-calendar-days text-slate-300 text-4xl"></i>
                    </div>
                    <figcaption class="w-full md:w-1/3 space-y-3 text-center md:text-left">
                      <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Kegiatan</p>
                      <h3 class="text-2xl font-semibold text-slate-900">Belum ada kegiatan</h3>
                      <p class="text-sm text-slate-600">Tambahkan kegiatan melalui halaman admin</p>
                    </figcaption>
                  </figure>
                @endforelse
              </div>

              @if($featuredEvents && $featuredEvents->count() > 1)
              <button type="button" class="absolute left-6 top-1/2 -translate-y-1/2 rounded-full bg-white/95 backdrop-blur-sm p-3 text-emerald-600 shadow-lg ring-1 ring-emerald-200 transition-all duration-300 hover:bg-emerald-50 hover:shadow-emerald-600/40 hover:scale-110 active:scale-95 animate-fade-in-up" data-gallery-prev aria-label="Kegiatan sebelumnya" data-animate data-animate-delay="800">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <button type="button" class="absolute right-6 top-1/2 -translate-y-1/2 rounded-full bg-white/95 backdrop-blur-sm p-3 text-emerald-600 shadow-lg ring-1 ring-emerald-200 transition-all duration-300 hover:bg-emerald-50 hover:shadow-emerald-600/40 hover:scale-110 active:scale-95 animate-fade-in-up" data-gallery-next aria-label="Kegiatan selanjutnya" data-animate data-animate-delay="850">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              @endif
            </div>

            @if($featuredEvents && $featuredEvents->count() > 1)
            <div class="mt-8 flex items-center justify-center gap-3 animate-fade-in-up" data-animate data-animate-delay="900">
              @forelse ($featuredEvents as $index => $event)
                <button type="button" class="h-2.5 w-2.5 rounded-full bg-emerald-300 transition-all hover:bg-emerald-500 hover:w-8" data-gallery-dot="{{ $index }}" aria-label="Pindah ke kegiatan {{ $index + 1 }}"></button>
              @empty
                <button type="button" class="h-2.5 w-2.5 rounded-full bg-emerald-300 transition-all" data-gallery-dot="0" aria-label="Pindah ke kegiatan 1"></button>
              @endforelse
            </div>
            @endif
          </div>
        </div>
      </section>

      <!-- Galeri Prestasi -->
      <section id="prestasi" class="relative py-28 scroll-mt-24 md:scroll-mt-28 bg-gradient-to-b from-emerald-50/20 via-amber-50/20 to-emerald-50/30">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 text-slate-900" data-animate-group>
          <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-100 to-emerald-100 px-4 py-2 text-[11px] font-bold uppercase tracking-[0.25em] text-emerald-700 ring-1 ring-emerald-200/50 animate-fade-in-up" data-animate>
              <i class="fas fa-trophy text-amber-500"></i>
              Prestasi
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-balance animate-fade-in-up" data-animate data-animate-delay="100" style="font-family: 'Sora', sans-serif;">
              Karya dan <span class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Prestasi Terbaru</span>
            </h2>
            <p class="text-base text-slate-600 animate-fade-in-up" data-animate data-animate-delay="200">
              Koleksi prestasi dan karya terbaik dari mahasiswa dan program studi kami.
            </p>
          </div>

          <div class="relative animate-fade-in-up" data-animate data-animate-delay="300" id="gallery-achievement" data-gallery="achievement">
            <div class="overflow-hidden rounded-[2.5rem] border border-emerald-200/60 bg-gradient-to-br from-white/95 to-emerald-50/30 shadow-[0_35px_80px_-40px_rgba(16,185,129,0.3)]">
              <div class="flex transition-transform duration-500 ease-out" data-gallery-track>
                @forelse ($featuredAchievements as $index => $achievement)
                  <figure class="min-w-full flex flex-col md:flex-row items-center gap-8 p-6 md:p-10 animate-card" data-animate data-animate-delay="{{ ($index * 100) + 400 }}">
                    <div class="relative w-full md:w-2/3 h-64 md:h-80 overflow-hidden rounded-3xl shadow-xl group">
                      @if($achievement->image)
                        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" />
                      @else
                        <div class="h-full w-full bg-gradient-to-br from-emerald-200 to-green-100 flex items-center justify-center">
                          <i class="fa-solid fa-trophy text-emerald-600 text-4xl"></i>
                        </div>
                      @endif
                      <span class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full bg-white/90 backdrop-blur-sm px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-600 shadow-lg">
                        <i class="fas fa-star text-yellow-500 text-xs"></i>
                        {{ $achievement->category }}
                      </span>
                    </div>
                    <figcaption class="w-full md:w-1/3 space-y-4 text-center md:text-left">
                      <div class="flex items-center gap-2 md:justify-start justify-center">
                        <i class="fas fa-calendar text-emerald-600 text-sm"></i>
                        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-emerald-600 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 450 }}">
                          {{ \Carbon\Carbon::parse($achievement->date)->format('d M Y') }}
                        </p>
                      </div>
                      <h3 class="text-2xl font-bold text-slate-900 animate-fade-in-up leading-tight" data-animate data-animate-delay="{{ ($index * 100) + 500 }}">
                        {{ $achievement->title }}
                      </h3>
                      <p class="text-sm leading-relaxed text-slate-600 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 550 }}">
                        {{ $achievement->description }}
                      </p>
                      <div class="pt-3 animate-fade-in-up" data-animate data-animate-delay="{{ ($index * 100) + 600 }}">
                        <a href="{{ route('achievement.detail', $achievement) }}" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/30 transition-all duration-300 hover:shadow-emerald-600/50 hover:scale-105 active:scale-95 animate-hover-lift">
                          <i class="fas fa-arrow-right text-xs"></i>
                          Lihat Selengkapnya
                        </a>
                      </div>
                    </figcaption>
                  </figure>
                @empty
                  <figure class="min-w-full flex flex-col md:flex-row items-center gap-8 p-6 md:p-10 animate-card">
                    <div class="relative w-full md:w-2/3 h-64 md:h-80 overflow-hidden rounded-3xl shadow-xl bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                      <i class="fa-solid fa-trophy text-slate-300 text-4xl"></i>
                    </div>
                    <figcaption class="w-full md:w-1/3 space-y-3 text-center md:text-left">
                      <p class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-400">Prestasi</p>
                      <h3 class="text-2xl font-semibold text-slate-900">Belum ada prestasi</h3>
                      <p class="text-sm text-slate-600">Tambahkan prestasi melalui halaman admin</p>
                    </figcaption>
                  </figure>
                @endforelse
              </div>

              @if($featuredAchievements && $featuredAchievements->count() > 1)
              <button type="button" class="absolute left-6 top-1/2 -translate-y-1/2 rounded-full bg-white/95 backdrop-blur-sm p-3 text-emerald-600 shadow-lg ring-1 ring-emerald-200 transition-all duration-300 hover:bg-emerald-50 hover:shadow-emerald-600/40 hover:scale-110 active:scale-95 animate-fade-in-up" data-gallery-prev aria-label="Prestasi sebelumnya" data-animate data-animate-delay="800">
                <i class="fa-solid fa-chevron-left"></i>
              </button>
              <button type="button" class="absolute right-6 top-1/2 -translate-y-1/2 rounded-full bg-white/95 backdrop-blur-sm p-3 text-emerald-600 shadow-lg ring-1 ring-emerald-200 transition-all duration-300 hover:bg-emerald-50 hover:shadow-emerald-600/40 hover:scale-110 active:scale-95 animate-fade-in-up" data-gallery-next aria-label="Prestasi selanjutnya" data-animate data-animate-delay="850">
                <i class="fa-solid fa-chevron-right"></i>
              </button>
              @endif
            </div>

            @if($featuredAchievements && $featuredAchievements->count() > 1)
            <div class="mt-8 flex items-center justify-center gap-3 animate-fade-in-up" data-animate data-animate-delay="900">
              @forelse ($featuredAchievements as $index => $achievement)
                <button type="button" class="h-2.5 w-2.5 rounded-full bg-emerald-300 transition-all hover:bg-emerald-500 hover:w-8" data-gallery-dot="{{ $index }}" aria-label="Pindah ke prestasi {{ $index + 1 }}"></button>
              @empty
                <button type="button" class="h-2.5 w-2.5 rounded-full bg-emerald-300 transition-all" data-gallery-dot="0" aria-label="Pindah ke prestasi 1"></button>
              @endforelse
            </div>
            @endif
          </div>
        </div>
      </section>      
    </main>
    
    <!-- Kontak footer -->
    <x-public.footer />
  </div>
  
  <script src="{{ asset('js/animations.js') }}"></script> 
  <script src="{{ asset('js/app.js') }}"></script> 
</div>
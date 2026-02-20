<div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <footer id="contact" class="relative bg-white py-24 scroll-mt-24 md:scroll-mt-28 overflow-hidden">
      <!-- Decorative Background Elements -->
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 -left-40 w-80 h-80 bg-emerald-300/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 bg-emerald-200/15 rounded-full blur-3xl"></div>
      </div>

      <div class="relative mx-auto max-w-7xl px-6">
        <!-- Main Content Grid -->
        <div class="grid gap-16 md:grid-cols-2 lg:grid-cols-3 mb-16">
          <!-- Contact Section -->
          <div class="space-y-8 text-slate-900 lg:col-span-1">
            <div>
              <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-yellow-100 to-emerald-100 px-5 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">
                <i class="fas fa-phone-volume text-yellow-600"></i>
                Kontak
              </span>
              <h2 class="mt-6 text-3xl font-bold md:text-4xl text-balance leading-tight">Mari <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">berdiskusi</span> dan berkolaborasi.</h2>
              <p class="mt-4 text-sm text-slate-600 md:text-base leading-relaxed">Tim kami siap membantu informasi pendaftaran, kemitraan industri, maupun peluang riset bersama.</p>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
              <div class="group flex items-start gap-4 rounded-2xl bg-white/50 backdrop-blur-sm p-4 transition-all duration-300 hover:bg-emerald-50/80 hover:shadow-lg">
                <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex-shrink-0 group-hover:scale-110 transition-transform">
                  <i class="fa-solid fa-location-dot text-sm"></i>
                </span>
                <div class="flex-1 min-w-0">
                  <p class="text-xs font-semibold text-emerald-700 uppercase tracking-[0.05em]">Lokasi</p>
                  <p class="text-sm text-slate-700 mt-1 break-words">{{ $contacts?->address ?? 'Alamat belum tersedia' }}</p>
                </div>
              </div>

              <div class="group flex items-start gap-4 rounded-2xl bg-white/50 backdrop-blur-sm p-4 transition-all duration-300 hover:bg-emerald-50/80 hover:shadow-lg">
                <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex-shrink-0 group-hover:scale-110 transition-transform">
                  <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <div class="flex-1 min-w-0">
                  <p class="text-xs font-semibold text-emerald-700 uppercase tracking-[0.05em]">Email</p>
                  <p class="text-sm text-slate-700 mt-1 break-all">{{ $contacts?->email ?? 'Email belum tersedia' }}</p>
                </div>
              </div>

              <div class="group flex items-start gap-4 rounded-2xl bg-white/50 backdrop-blur-sm p-4 transition-all duration-300 hover:bg-emerald-50/80 hover:shadow-lg">
                <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 text-white flex-shrink-0 group-hover:scale-110 transition-transform">
                  <i class="fa-solid fa-phone text-sm"></i>
                </span>
                <div class="flex-1 min-w-0">
                  <p class="text-xs font-semibold text-emerald-700 uppercase tracking-[0.05em]">Telepon</p>
                  <p class="text-sm text-slate-700 mt-1">{{ $contacts?->phone ?? 'Telepon belum tersedia' }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Social Media Section -->
          <div class="space-y-8 text-slate-900">
            <div>
              <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-blue-100 to-emerald-100 px-5 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">
                <i class="fas fa-share-nodes text-blue-600"></i>
                Ikuti Kami
              </span>
              <h3 class="mt-6 text-2xl font-bold leading-tight">Terhubung di Media Sosial</h3>
              <p class="mt-3 text-sm text-slate-600">Dapatkan update terbaru dan informasi menarik dari program studi kami.</p>
            </div>

            <!-- Social Links -->
            <div class="grid grid-cols-2 gap-4">
              @foreach(($socialLinks ?? []) as $social)
              <a href="{{ $social['url'] }}" target="_blank" rel="noopener" class="group flex items-center gap-3 rounded-2xl bg-white/50 backdrop-blur-sm p-4 transition-all duration-300 hover:shadow-lg hover:bg-gradient-to-br {{ $social['color'] }} hover:text-white">
                <i class="fa-brands {{ $social['icon'] }} text-xl text-emerald-600 group-hover:text-white transition-colors"></i>
                <span class="text-sm font-semibold text-slate-700 group-hover:text-white transition-colors">{{ $social['label'] }}</span>
              </a>
              @endforeach
            </div>
          </div>

          <!-- Logo Section -->
          <div class="flex flex-col items-center justify-center space-y-6 lg:col-span-1">
            <div class="rounded-3xl bg-transparent p-8 hover:scale-105 transition-all duration-300">
              <img src="{{ $footerLogo }}" alt="Logo Program" class="h-48 w-auto">
            </div>
            <div class="text-center space-y-2">
              <p class="text-sm font-semibold text-slate-900">{{ $programStudy?->name ?? 'Program Studi' }}</p>
              <p class="text-xs text-slate-600">Universitas Muhammadiyah Bengkulu</p>
            </div>
          </div>
        </div>

        <!-- Divider -->
        <div class="h-px bg-gradient-to-r from-transparent via-emerald-300 to-transparent mb-8"></div>

        <!-- Footer Bottom -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
          <p class="text-xs text-slate-600">
            <span class="font-semibold text-slate-700">&copy; {{ now()->year }}</span> Program Studi {{ $programStudy?->name ?? 'UMB' }}. Universitas Muhammadiyah Bengkulu. All rights reserved.
          </p>
          <a href="{{ $backToTopUrl ?? '#home' }}" class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2.5 text-xs font-bold text-emerald-700 ring-1 ring-emerald-200/60 transition-all hover:bg-emerald-100 hover:ring-emerald-300/60">
            <i class="fas fa-arrow-up text-emerald-600 text-sm"></i>
            Kembali ke Atas
          </a>
        </div>
      </div>
    </footer>
    <script src="{{ asset('js/animations.js') }}"></script> 
    <script src="{{ asset('js/app.js') }}"></script>     
</div>
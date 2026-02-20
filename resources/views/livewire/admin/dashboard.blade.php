<div>
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <h1 class="text-3xl md:text-4xl font-bold text-green-600 dark:text-green-400">
                Selamat Datang, {{ $userName }}!
            </h1>
        </div>
        <p class="text-gray-600 dark:text-gray-400 text-base md:text-lg mb-4">
            Kelola program studi dengan dashboard yang elegan dan powerful
        </p>
        
        <!-- Status Bar -->
        <div class="flex flex-wrap items-center gap-6 text-sm">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 bg-green-600 rounded-full"></div>
                <span class="text-gray-700 dark:text-gray-300">System Online</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ $dayOfWeek }}, {{ $date }}</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-gray-700 dark:text-gray-300">{{ $time }}</span>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Card 1: Total Event/Kegiatan -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalEvents }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Total Kegiatan</p>
        </div>

        <!-- Card 2: Total Achievement/Prestasi -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalAchievements }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Total Prestasi</p>
        </div>

        <!-- Card 3: Total Dosen/Lecturer -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalLecturers }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Total Dosen</p>
        </div>


        <!-- Card 4: Total Mahasiswa Aktif -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ number_format($totalStudents, 0, ',', '.') }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Mahasiswa Aktif</p>
        </div>

        <!-- Card 5: Total Graduate Profile -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalGraduateProfiles }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Profil Lulusan</p>
        </div>

        <!-- Card 6: Total Curriculum -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalCurriculums }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Mata Kuliah</p>
        </div>

        <!-- Card 7: Program Studi -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalStudyPrograms }}</h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Program Studi</p>
        </div>

    </div>

    <!-- Summary Section - Two Panels -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        
        <!-- Left Panel: Ringkasan Program Studi -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <!-- Header -->
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Ringkasan Program Studi</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Overview performa program studi Anda</p>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Total Kegiatan -->
                <div class="bg-gray-50 dark:bg-zinc-700/50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalEvents }}</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $recentEvents }} kegiatan bulan ini</p>
                </div>

                <!-- Kegiatan Mendatang -->
                <div class="bg-gray-50 dark:bg-zinc-700/50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $upcomingEvents }}</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Kegiatan mendatang</p>
                </div>

                <!-- Kegiatan Selesai -->
                <div class="bg-gray-50 dark:bg-zinc-700/50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $completedEvents }}</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Kegiatan selesai</p>
                </div>

                <!-- Total Prestasi -->
                <div class="bg-gray-50 dark:bg-zinc-700/50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">{{ $totalAchievements }}</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $categoriesCount }} kategori</p>
                </div>
            </div>
        </div>

        <!-- Right Panel: Data & Konten -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-gray-200 dark:border-zinc-700 p-6">
            <!-- Header -->
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Data & Konten</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Monitor data dan performa konten</p>
                </div>
            </div>

            <!-- Kegiatan Terbaru -->
            @if($latestEvent)
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg p-4 mb-4 border border-orange-200 dark:border-orange-800">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-bold text-orange-600 dark:text-orange-400 uppercase">Kegiatan Terbaru</span>
                            <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/>
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-gray-900 dark:text-white mb-2">{{ $latestEvent->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Tanggal: {{ \Carbon\Carbon::parse($latestEvent->date)->format('d M Y') }}
                        </p>
                        @if($latestEvent->description)
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">
                            {{ Str::limit($latestEvent->description, 80) }}
                        </p>
                        @endif
                    </div>
                    <div class="p-3 bg-white dark:bg-zinc-700 rounded-lg">
                        <svg class="w-8 h-8 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
            </div>
            @endif

            <!-- Kegiatan Mendatang -->
            <div>
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase">Kegiatan Mendatang ({{ $criticalEvents->count() }} Item)</span>
                        <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <a href="{{ route('admin.event.index') }}" class="text-sm text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 font-medium">
                        Lihat Semua →
                    </a>
                </div>

                <div class="space-y-2">
                    @forelse($criticalEvents as $event)
                    <div class="bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded-lg p-3 flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $event->title }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                    Mendatang
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-gray-50 dark:bg-zinc-700/50 border border-gray-200 dark:border-zinc-600 rounded-lg p-4 text-center">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada kegiatan mendatang</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

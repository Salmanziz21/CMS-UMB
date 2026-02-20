<div>
    <!-- Stats Overview - Redesigned with Premium Look -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="relative overflow-hidden p-6 rounded-[2rem] bg-white dark:bg-zinc-900 border border-border transition-all duration-300 hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 group">
            <div class="absolute -right-4 -top-4 size-24 bg-primary/5 rounded-full blur-2xl group-hover:bg-primary/10 transition-colors"></div>
            <div class="relative flex items-center gap-4">
                <div class="size-14 rounded-2xl bg-primary/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform duration-500">
                    <i data-lucide="library" class="size-7"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-0.5">Program Studi</p>
                    <p class="text-3xl font-black text-foreground">{{ $totalStudyPrograms }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-success">
                <i data-lucide="trending-up" class="size-3"></i>
                <span>Aktif & Terintegrasi</span>
            </div>
        </div>

        <div class="relative overflow-hidden p-6 rounded-[2rem] bg-white dark:bg-zinc-900 border border-border transition-all duration-300 hover:shadow-2xl hover:shadow-success/10 hover:-translate-y-1 group">
            <div class="absolute -right-4 -top-4 size-24 bg-success/5 rounded-full blur-2xl group-hover:bg-success/10 transition-colors"></div>
            <div class="relative flex items-center gap-4">
                <div class="size-14 rounded-2xl bg-success/10 flex items-center justify-center text-success group-hover:scale-110 transition-transform duration-500">
                    <i data-lucide="users" class="size-7"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-0.5">Mahasiswa</p>
                    <p class="text-3xl font-black text-foreground">{{ number_format($totalStudents, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-secondary">
                <i data-lucide="activity" class="size-3"></i>
                <span>Data terbaru semester ini</span>
            </div>
        </div>

        <div class="relative overflow-hidden p-6 rounded-[2rem] bg-white dark:bg-zinc-900 border border-border transition-all duration-300 hover:shadow-2xl hover:shadow-warning/10 hover:-translate-y-1 group">
            <div class="absolute -right-4 -top-4 size-24 bg-warning/5 rounded-full blur-2xl group-hover:bg-warning/10 transition-colors"></div>
            <div class="relative flex items-center gap-4">
                <div class="size-14 rounded-2xl bg-warning/10 flex items-center justify-center text-warning group-hover:scale-110 transition-transform duration-500">
                    <i data-lucide="user-square-2" class="size-7"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-0.5">Total Dosen</p>
                    <p class="text-3xl font-black text-foreground">{{ $totalLecturers }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-secondary">
                <i data-lucide="check-circle-2" class="size-3"></i>
                <span>Kualifikasi Terverifikasi</span>
            </div>
        </div>

        <div class="relative overflow-hidden p-6 rounded-[2rem] bg-white dark:bg-zinc-900 border border-border transition-all duration-300 hover:shadow-2xl hover:shadow-error/10 hover:-translate-y-1 group">
            <div class="absolute -right-4 -top-4 size-24 bg-error/5 rounded-full blur-2xl group-hover:bg-error/10 transition-colors"></div>
            <div class="relative flex items-center gap-4">
                <div class="size-14 rounded-2xl bg-error/10 flex items-center justify-center text-error group-hover:scale-110 transition-transform duration-500">
                    <i data-lucide="calendar" class="size-7"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-secondary uppercase tracking-widest mb-0.5">Total Kegiatan</p>
                    <p class="text-3xl font-black text-foreground">{{ $totalEvents }}</p>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2 text-xs font-medium text-secondary">
                <i data-lucide="calendar-check" class="size-3"></i>
                <span>Tersimpan di database</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left & Center Content (8 Columns) -->
        <div class="lg:col-span-8 flex flex-col gap-8">
            <!-- Hero Card: Kegiatan Terbaru -->
            @if($latestEvent)
            <div class="group relative overflow-hidden rounded-[2.5rem] bg-zinc-900 dark:bg-zinc-950 p-10 text-white shadow-2xl shadow-zinc-950/40">
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8">
                    <div class="max-w-xl">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 text-white text-[11px] font-black uppercase tracking-[0.2em] mb-6 border border-white/10 backdrop-blur-md">
                            <span class="size-2 rounded-full bg-warning animate-pulse"></span>
                            Sorotan Kegiatan
                        </span>
                        <h3 class="text-4xl font-black mb-4 leading-tight group-hover:text-primary transition-colors duration-300">
                            {{ $latestEvent->title }}
                        </h3>
                        <p class="text-white/60 text-lg leading-relaxed mb-8 line-clamp-2 italic font-medium">
                            "{{ Str::limit($latestEvent->description, 150) }}"
                        </p>
                        
                        <div class="flex flex-wrap items-center gap-6">
                            <div class="flex items-center gap-3 py-2 px-4 rounded-2xl bg-white/5 border border-white/5">
                                <div class="size-10 rounded-xl bg-primary/20 flex items-center justify-center text-primary">
                                    <i data-lucide="calendar-days" class="size-5"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] text-white/40 font-black uppercase">Waktu Pelaksanaan</p>
                                    <p class="font-bold">{{ \Carbon\Carbon::parse($latestEvent->date)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                </div>
                            </div>
                            
                            <a href="{{ route('admin.event.index') }}" wire:navigate class="group/btn flex items-center gap-3 px-8 py-4 bg-white text-zinc-900 rounded-2xl font-black text-sm hover:scale-105 active:scale-95 transition-all shadow-xl shadow-black/20">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="size-4 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="hidden md:flex flex-col items-center justify-center p-6 border-l border-white/10 pl-12">
                        <div class="text-center">
                            <p class="text-6xl font-black text-white/10 mb-2">NEW</p>
                            <div class="size-24 rounded-full border-2 border-dashed border-white/20 flex items-center justify-center animate-[spin_10s_linear_infinite]">
                                <i data-lucide="sparkles" class="size-10 text-warning opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Advanced Decorations -->
                <div class="absolute -bottom-24 -right-24 size-96 bg-primary/20 rounded-full blur-[100px] pointer-events-none"></div>
                <div class="absolute -top-24 -left-24 size-80 bg-warning/10 rounded-full blur-[80px] pointer-events-none"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/5 via-transparent to-transparent opacity-50 pointer-events-none"></div>
            </div>
            @endif

            <!-- Quick Access Card - Expanded -->
            <div class="bg-white dark:bg-zinc-900 rounded-[2rem] p-8 border border-border shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="font-black text-xl text-foreground flex items-center gap-3">
                        <i data-lucide="zap" class="size-6 text-warning"></i>
                        Akses Cepat
                    </h3>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.event.index') }}" wire:navigate class="flex flex-col items-center justify-center p-6 rounded-3xl bg-muted dark:bg-zinc-800/50 hover:bg-primary/10 hover:border-primary/20 border border-transparent transition-all group text-center">
                        <div class="size-12 rounded-2xl bg-white dark:bg-zinc-800 shadow-sm flex items-center justify-center text-primary group-hover:scale-110 transition-transform mb-3 mx-auto">
                            <i data-lucide="calendar-plus" class="size-6"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-tighter text-secondary group-hover:text-primary transition-colors">Tambah Event</span>
                    </a>
                    
                    <a href="{{ route('admin.lecturer.index') }}" wire:navigate class="flex flex-col items-center justify-center p-6 rounded-3xl bg-muted dark:bg-zinc-800/50 hover:bg-success/10 hover:border-success/20 border border-transparent transition-all group text-center">
                        <div class="size-12 rounded-2xl bg-white dark:bg-zinc-800 shadow-sm flex items-center justify-center text-success group-hover:scale-110 transition-transform mb-3 mx-auto">
                            <i data-lucide="user-plus" class="size-6"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-tighter text-secondary group-hover:text-success transition-colors">Kelola Dosen</span>
                    </a>
                    
                    <a href="{{ route('admin.studyprogram.index') }}" wire:navigate class="flex flex-col items-center justify-center p-6 rounded-3xl bg-muted dark:bg-zinc-800/50 hover:bg-warning/10 hover:border-warning/20 border border-transparent transition-all group text-center">
                        <div class="size-12 rounded-2xl bg-white dark:bg-zinc-800 shadow-sm flex items-center justify-center text-warning group-hover:scale-110 transition-transform mb-3 mx-auto">
                            <i data-lucide="graduation-cap" class="size-6"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-tighter text-secondary group-hover:text-warning transition-colors">Prodi Kita</span>
                    </a>
                    
                    <a href="{{ route('admin.userinterface.index') }}" wire:navigate class="flex flex-col items-center justify-center p-6 rounded-3xl bg-muted dark:bg-zinc-800/50 hover:bg-error/10 hover:border-error/20 border border-transparent transition-all group text-center">
                        <div class="size-12 rounded-2xl bg-white dark:bg-zinc-800 shadow-sm flex items-center justify-center text-error group-hover:scale-110 transition-transform mb-3 mx-auto">
                            <i data-lucide="settings-2" class="size-6"></i>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-tighter text-secondary group-hover:text-error transition-colors">Tampilan UI</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Content (4 Columns) -->
        <div class="lg:col-span-4 flex flex-col gap-8">
            <!-- System Info Box -->
            <div class="bg-zinc-900 dark:bg-white p-8 rounded-[2.5rem] text-white dark:text-zinc-900 shadow-xl overflow-hidden relative group">
                <div class="relative z-10">
                    <h3 class="font-black text-xl mb-6 flex items-center gap-3">
                        <i data-lucide="info" class="size-6 text-primary"></i>
                        Health Status
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="size-10 rounded-xl bg-white/10 dark:bg-zinc-100 flex items-center justify-center text-primary">
                                <i data-lucide="shield-check" class="size-5"></i>
                            </div>
                            <div>
                                <p class="text-xs font-black uppercase tracking-tight opacity-50">Sesi Keamanan</p>
                                <p class="text-sm font-bold truncate max-w-[150px]">{{ $userName }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="size-10 rounded-xl bg-white/10 dark:bg-zinc-100 flex items-center justify-center text-success">
                                <i data-lucide="check-circle-2" class="size-5"></i>
                            </div>
                            <div>
                                <p class="text-xs font-black uppercase tracking-tight opacity-50">Waktu Server</p>
                                <p id="server-clock" class="text-sm font-bold">{{ $time }} WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorations -->
                <div class="absolute -bottom-10 -right-10 size-40 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-colors"></div>
            </div>

            <!-- Content Summary Widget -->
            <div class="bg-white dark:bg-zinc-900 rounded-[2rem] p-8 border border-border shadow-sm flex-1">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="font-black text-xl text-foreground flex items-center gap-3">
                        <i data-lucide="bar-chart-big" class="size-6 text-primary"></i>
                        Ringkasan
                    </h3>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-muted dark:bg-zinc-800/50 group hover:bg-white dark:hover:bg-zinc-800 transition-colors border border-transparent hover:border-border">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold text-xs group-hover:scale-110 transition-transform">AA</div>
                            <div>
                                <p class="text-[11px] font-black text-foreground leading-tight">Prestasi</p>
                                <p class="text-[9px] text-secondary font-bold uppercase tracking-tighter">{{ $categoriesCount }} Kategori</p>
                            </div>
                        </div>
                        <span class="text-lg font-black text-foreground">{{ $totalAchievements }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-muted dark:bg-zinc-800/50 group hover:bg-white dark:hover:bg-zinc-800 transition-colors border border-transparent hover:border-border">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-xl bg-success/10 flex items-center justify-center text-success font-bold text-xs group-hover:scale-110 transition-transform">GP</div>
                            <div>
                                <p class="text-[11px] font-black text-foreground leading-tight">Lulusan</p>
                                <p class="text-[9px] text-secondary font-bold uppercase tracking-tighter">Profil Aktif</p>
                            </div>
                        </div>
                        <span class="text-lg font-black text-foreground">{{ $totalGraduateProfiles }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 rounded-2xl bg-muted dark:bg-zinc-800/50 group hover:bg-white dark:hover:bg-zinc-800 transition-colors border border-transparent hover:border-border">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-xl bg-warning/10 flex items-center justify-center text-warning font-bold text-xs group-hover:scale-110 transition-transform">MK</div>
                            <div>
                                <p class="text-[11px] font-black text-foreground leading-tight">Kurikulum</p>
                                <p class="text-[9px] text-secondary font-bold uppercase tracking-tighter">{{ $totalCurriculums }} Matkul</p>
                            </div>
                        </div>
                        <span class="text-lg font-black text-foreground">{{ $totalCurriculums }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Secondary Content: Prestasi & Dosen Previews -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-12 pb-12">
        <!-- Recent Achievements Preview -->
        <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] p-8 border border-border shadow-sm group">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="font-black text-xl text-foreground flex items-center gap-3">
                        <i data-lucide="trophy" class="size-6 text-yellow-500"></i>
                        Karya & Prestasi Terbaru
                    </h3>
                    <p class="text-xs text-secondary font-medium mt-1">Update karya mahasiswa & prodi</p>
                </div>
                <a href="{{ route('admin.achievement.index') }}" wire:navigate class="size-10 rounded-full bg-muted flex items-center justify-center text-secondary hover:bg-primary hover:text-white transition-all">
                    <i data-lucide="arrow-right" class="size-5"></i>
                </a>
            </div>

            <div class="space-y-4">
                @forelse($recentAchievementsList as $achievement)
                <div class="flex items-center gap-5 p-4 rounded-3xl bg-muted/50 dark:bg-zinc-800/30 border border-transparent hover:border-border hover:bg-white dark:hover:bg-zinc-800 transition-all">
                    <div class="size-16 rounded-2xl overflow-hidden bg-white dark:bg-zinc-800 flex items-center justify-center shrink-0 border border-border">
                        @if($achievement->image)
                            <img src="{{ asset('storage/' . $achievement->image) }}" alt="Achievement" class="w-full h-full object-cover">
                        @else
                            <i data-lucide="image" class="size-6 text-secondary/30"></i>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 rounded-md bg-primary/10 text-primary text-[10px] font-black uppercase">{{ $achievement->category }}</span>
                            <span class="text-[10px] text-secondary font-bold uppercase">{{ \Carbon\Carbon::parse($achievement->date)->isoFormat('YYYY') }}</span>
                        </div>
                        <p class="font-bold text-foreground truncate">{{ $achievement->title }}</p>
                        <p class="text-xs text-secondary truncate">{{ Str::limit($achievement->description, 60) }}</p>
                    </div>
                </div>
                @empty
                <div class="py-8 text-center text-secondary">Belum ada karya terbaru.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Lecturers Preview -->
        <div class="bg-white dark:bg-zinc-900 rounded-[2.5rem] p-8 border border-border shadow-sm group">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="font-black text-xl text-foreground flex items-center gap-3">
                        <i data-lucide="users-2" class="size-6 text-primary"></i>
                        Dosen & Staff Terbaru
                    </h3>
                    <p class="text-xs text-secondary font-medium mt-1">Tenaga pendidik profesional kami</p>
                </div>
                <a href="{{ route('admin.lecturer.index') }}" wire:navigate class="size-10 rounded-full bg-muted flex items-center justify-center text-secondary hover:bg-primary hover:text-white transition-all">
                    <i data-lucide="arrow-right" class="size-5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-4">
                @forelse($recentLecturersList as $lecturer)
                <div class="flex items-center gap-5 p-4 rounded-3xl bg-muted/50 dark:bg-zinc-800/30 border border-transparent hover:border-border hover:bg-white dark:hover:bg-zinc-800 transition-all">
                    <div class="size-14 rounded-full overflow-hidden bg-primary/10 flex items-center justify-center shrink-0 border-2 border-white dark:border-zinc-800 shadow-sm">
                        @if($lecturer->image)
                            <img src="{{ asset('storage/' . $lecturer->image) }}" alt="Lecturer" class="w-full h-full object-cover">
                        @else
                            <span class="text-primary font-black text-lg">{{ substr($lecturer->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-foreground truncate">{{ $lecturer->name }}</p>
                        <div class="flex items-center gap-3 mt-1">
                            <div class="flex items-center gap-1.5 text-[10px] font-bold text-secondary uppercase">
                                <i data-lucide="briefcase" class="size-3"></i>
                                {{ $lecturer->position ?? 'Dosen Tetap' }}
                            </div>
                            <div class="flex items-center gap-1.5 text-[10px] font-bold text-primary uppercase">
                                <i data-lucide="graduation-cap" class="size-3"></i>
                                {{ $lecturer->degree ?? 'S2/S3' }}
                            </div>
                        </div>
                    </div>
                    <i data-lucide="chevron-right" class="size-4 text-secondary/30"></i>
                </div>
                @empty
                <div class="py-8 text-center text-secondary">Belum ada data dosen.</div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function updateServerClock() {
            const clockElement = document.getElementById('server-clock');
            if (!clockElement) return;

            // Get initial time from the element text (format: HH.mm.ss WIB)
            let timeStr = clockElement.innerText.replace(' WIB', '').split('.');
            let hours = parseInt(timeStr[0]);
            let minutes = parseInt(timeStr[1]);
            let seconds = parseInt(timeStr[2]);

            setInterval(() => {
                seconds++;
                if (seconds >= 60) {
                    seconds = 0;
                    minutes++;
                    if (minutes >= 60) {
                        minutes = 0;
                        hours++;
                        if (hours >= 24) hours = 0;
                    }
                }

                const displayTime = 
                    String(hours).padStart(2, '0') + '.' + 
                    String(minutes).padStart(2, '0') + '.' + 
                    String(seconds).padStart(2, '0') + ' WIB';
                
                clockElement.innerText = displayTime;
            }, 1000);
        }

        // Initialize clock after page load or Livewire navigation
        document.addEventListener('livewire:navigated', updateServerClock);
        document.addEventListener('DOMContentLoaded', updateServerClock);
    </script>
</div>

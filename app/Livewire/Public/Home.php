<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Quantity;
use App\Models\Event;
use App\Models\Achievement;
use App\Models\Lecturer;
use App\Models\Studyprogram;
use App\Models\Graduateprofile;
use App\Models\Userinterface;
use App\Models\Curriculum;

class Home extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $primaryStudyProgram = Studyprogram::first();
        
        $historyContent = 'Sejarah program studi belum tersedia.';

        if (!$primaryStudyProgram) {
            return view('livewire.public.home', [
                'primaryStudyProgram' => null,
                'events' => collect(),
                'featuredEvents' => collect(),
                'achievements' => collect(),
                'featuredAchievements' => collect(),
                'number_students' => 0,
                'lectures' => collect(),
                'featuredLecturers' => collect(),
                'studyPrograms' => collect(),
                'totalDataDosen' => 0,
                'graduateProfiles' => collect(),
                'userinterface' => null,
                'curriculums' => collect(),
                'lecturerItemsPerPage' => 4,
                'totalLecturerPages' => 0,
                'initialLecturerPages' => [],
                'homeBackground' => asset('images/Background.png'),
                'homeLogo' => asset('images/LogoUmb.png'),
                'totalSubjects' => 0,
                'totalSks' => 0,
                'totalEvents' => 0,
                'totalAchievements' => 0,
                'historyParagraphs' => collect(),
                'historyContent' => $historyContent,
                'missionItems' => collect()
            ])->layout('components.layouts.public', ['title' => 'Program Studi']);
        }

        $quantity = $primaryStudyProgram->quantities()->first();
        $eventsQuery = $primaryStudyProgram->events()->orderByDesc('date');
        $achievementsQuery = $primaryStudyProgram->achievements()->orderByDesc('date');
        $lecturesQuery = $primaryStudyProgram->lecturers()->orderBy('name');
        
        $totalDataDosen = $primaryStudyProgram->lecturers()->count();
        $graduateProfiles = $primaryStudyProgram->graduateprofiles;
        $lecturerItemsPerPage = 4;

        $events = (clone $eventsQuery)->paginate(6, ['*'], 'eventsPage');
        $achievements = (clone $achievementsQuery)->paginate(6, ['*'], 'achievementsPage');
        $featuredEvents = (clone $eventsQuery)->take(3)->get();
        $featuredAchievements = (clone $achievementsQuery)->take(3)->get();
        $lectures = (clone $lecturesQuery)->get();

        $totalLecturerPages = (int) ceil(($lectures->count() ?: 0) / $lecturerItemsPerPage);
        $initialLecturerPages = $this->buildLecturerPages(1, $totalLecturerPages);

        $featuredLecturers = (clone $lecturesQuery)->take(3)->get();
        
        $studyPrograms = Studyprogram::paginate(6, ['*'], 'studyProgramsPage');
        $userinterface = $primaryStudyProgram->userinterfaces()->first();
        
        $curriculums = $primaryStudyProgram->curricula()->get()->groupBy('semester')->sortKeys();
        
        $flattenedCurriculums = $curriculums ? $curriculums->flatten() : collect();
        $historyContent = $primaryStudyProgram?->history ?? 'Sejarah program studi belum tersedia.';
        $historyParagraphs = collect(preg_split('/\r?\n\s*\r?\n/', trim($historyContent)))->filter();
        
        if ($historyParagraphs->isEmpty()) {
            $historyParagraphs = collect([$historyContent]);
        }
        
        $missionItems = $primaryStudyProgram?->mission
            ? collect(preg_split('/\r?\n/', trim($primaryStudyProgram->mission)))->filter()
            : collect(['Misi program studi belum tersedia.']);

        return view('livewire.public.home', [
            'events' => $events,
            'featuredEvents' => $featuredEvents,
            'achievements' => $achievements,
            'featuredAchievements' => $featuredAchievements,
            'number_students' => $quantity?->number_students ?? 0,
            'lectures' => $lectures,
            'featuredLecturers' => $featuredLecturers,
            'studyPrograms' => $studyPrograms,
            'primaryStudyProgram' => $primaryStudyProgram,
            'totalDataDosen' => $totalDataDosen,
            'graduateProfiles' => $graduateProfiles,
            'userinterface' => $userinterface,
            'curriculums' => $curriculums,
            'lecturerItemsPerPage' => $lecturerItemsPerPage,
            'totalLecturerPages' => $totalLecturerPages,
            'initialLecturerPages' => $initialLecturerPages,
            'homeBackground' => $userinterface?->image_background 
                ? asset('storage/' . $userinterface->image_background)
                : asset('images/Background.png'),
            'homeLogo' => $userinterface?->image_logo
                ? asset('storage/' . $userinterface->image_logo)
                : asset('images/LogoUmb.png'),
            'totalSubjects' => $flattenedCurriculums->count(),
            'totalSks' => $flattenedCurriculums->sum('number_sks'),
            'totalEvents' => $featuredEvents->count(),
            'totalAchievements' => $featuredAchievements->count(),
            'historyParagraphs' => $historyParagraphs,
            'historyContent' => $historyContent,
            'missionItems' => $missionItems
        ])->layout('components.layouts.public', [
            'title' => $primaryStudyProgram?->name ?? 'Program Studi',
        ]);
    }

    private function buildLecturerPages(int $currentPage, int $lastPage): array
    {
        if ($lastPage <= 0) {
            return [];
        }

        if ($lastPage <= 7) {
            return range(1, $lastPage);
        }

        $pages = [1];

        if ($currentPage <= 3) {
            $pages = array_merge($pages, range(2, min(5, $lastPage)));
            if ($lastPage > 5) {
                $pages[] = '...';
            }
            if ($lastPage > 6) {
                $pages[] = $lastPage;
            }
        } elseif ($currentPage >= $lastPage - 2) {
            if ($lastPage > 6) {
                $pages[] = '...';
            }
            $pages = array_merge($pages, range(max(2, $lastPage - 4), $lastPage));
        } else {
            $pages[] = '...';
            $pages = array_merge($pages, range($currentPage - 1, $currentPage + 1));
            $pages[] = '...';
            $pages[] = $lastPage;
        }

        return $pages;
    }
}

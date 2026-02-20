<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Achievement;
use App\Models\Lecturer;
use App\Models\Studyprogram;
use App\Models\Quantity;
use App\Models\Graduateprofile;
use App\Models\Curriculum;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    protected string $pageTitle = 'Dashboard';

    public function render()
    {
        $user = Auth::user();
        $userName = $user?->name ?? 'Admin';
        
        // Statistics
        $totalEvents = Event::count();
        $totalAchievements = Achievement::count();
        $totalLecturers = Lecturer::count();
        $totalStudyPrograms = Studyprogram::count();
        $totalGraduateProfiles = Graduateprofile::count();
        $totalCurriculums = Curriculum::count();
        $quantity = Quantity::first();
        $totalStudents = $quantity?->number_students ?? 0;
        
        // Recent events count (last 30 days)
        $recentEvents = Event::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        
        // Today's date info
        $today = Carbon::now();
        Carbon::setLocale('id');
        $dayOfWeek = $today->isoFormat('dddd');
        $date = $today->isoFormat('D MMMM YYYY');
        $time = $today->format('H.i.s');
        
        // Progress calculations
        $daysInMonth = $today->daysInMonth;
        $currentDay = $today->day;
        
        // Additional statistics for summary section
        $categoriesCount = Achievement::distinct('category')->count('category');
        $upcomingEvents = Event::where('date', '>=', $today)->count();
        $completedEvents = Event::where('date', '<', $today)->count();
        
        // Latest event (most recent)
        $latestEvent = Event::orderByDesc('date')->first();
        
        // Recent events that need attention (upcoming in next 7 days)
        $criticalEvents = Event::whereBetween('date', [$today, $today->copy()->addDays(7)])
            ->orderBy('date')
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'userName' => $userName,
            'totalEvents' => $totalEvents,
            'totalAchievements' => $totalAchievements,
            'totalLecturers' => $totalLecturers,
            'totalStudyPrograms' => $totalStudyPrograms,
            'totalGraduateProfiles' => $totalGraduateProfiles,
            'totalCurriculums' => $totalCurriculums,
            'totalStudents' => $totalStudents,
            'recentEvents' => $recentEvents,
            'dayOfWeek' => $dayOfWeek,
            'date' => $date,
            'time' => $time,
            'currentDay' => $currentDay,
            'daysInMonth' => $daysInMonth,
            'categoriesCount' => $categoriesCount,
            'upcomingEvents' => $upcomingEvents,
            'completedEvents' => $completedEvents,
            'latestEvent' => $latestEvent,
            'criticalEvents' => $criticalEvents,
            
            // Additional data for previews
            'recentEventsList' => Event::orderByDesc('date')->take(3)->get(),
            'recentAchievementsList' => Achievement::orderByDesc('date')->take(3)->get(),
            'recentLecturersList' => Lecturer::latest()->take(3)->get(),
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }
}

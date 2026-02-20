<?php

namespace App\Livewire\Admin\Achievement;

use App\Models\Achievement;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    protected string $pageTitle = 'Data Karya Dan Prestasi';

    protected $paginationTheme = 'tailwind';
    public $page = 1;
    public $search = '';
    public $category = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function imageExists($imagePath)
    {
        if (!$imagePath) {
            return false;
        }
        return Storage::disk('public')->exists($imagePath);
    }

    public function render()
    {
        $achievementsQuery = Achievement::query()
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('title', 'like', "%{$this->search}%")
                        ->orWhere('description', 'like', "%{$this->search}%");
                });
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->orderByDesc('created_at');

        $achievements = $achievementsQuery->paginate(5);

        // Add image exists check to each achievement
        $achievements->getCollection()->transform(function ($achievement) {
            $achievement->image_exists = $this->imageExists($achievement->image);
            return $achievement;
        });

        $categories = Achievement::query()
            ->select('category')
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('livewire.admin.achievement.index', [
            'achievements' => $achievements,
            'categories' => $categories,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }

    public function delete(int $achievementId): void
    {
        $achievement = Achievement::findOrFail($achievementId);

        if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        session()->flash('message', 'Achievement deleted successfully.');

        $totalAchievements = Achievement::count();
        $lastPage = max(1, (int) ceil($totalAchievements / 5));

        if ($this->page > $lastPage) {
            $this->gotoPage($lastPage);
        }
    }
}

<?php

namespace App\Livewire\Admin\Lecturer;

use App\Models\Lecturer;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected string $pageTitle = 'Data Dosen';

    protected $paginationTheme = 'tailwind';
    public $page = 1;
    public $search = '';

    public function photoExists($photoPath)
    {
        if (!$photoPath) {
            return false;
        }
        return Storage::disk('public')->exists($photoPath);
    }

    public function render()
    {
        $lecturers = Lecturer::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('major', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        // Add photo exists check to each lecturer
        $lecturers->getCollection()->transform(function ($lecturer) {
            $lecturer->photo_exists = $this->photoExists($lecturer->photo);
            return $lecturer;
        });

        return view('livewire.admin.lecturer.index', [
            'lecturers' => $lecturers,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function delete(int $lecturerId): void
    {
        $lecturer = Lecturer::findOrFail($lecturerId);

        if ($lecturer->photo && Storage::disk('public')->exists($lecturer->photo)) {
            Storage::disk('public')->delete($lecturer->photo);
        }

        $lecturer->delete();

        session()->flash('message', 'Lecturer deleted successfully.');

        $totalLecturers = Lecturer::count();
        $lastPage = max(1, (int) ceil($totalLecturers / 5));

        if ($this->page > $lastPage) {
            $this->gotoPage($lastPage);
        }
    }
}

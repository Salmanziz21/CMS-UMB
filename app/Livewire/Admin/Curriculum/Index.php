<?php

namespace App\Livewire\Admin\Curriculum;

use App\Models\Curriculum;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected string $pageTitle = 'Data Kurikulum';
    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $semester = '';

    // reset pagination saat filter berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSemester()
    {
        $this->resetPage();
    }

    public function render()
    {
        $curriculums = Curriculum::query()
            ->when($this->search, function ($query) {
                $query->where('subject', 'like', '%' . $this->search . '%');
            })
            ->when($this->semester, function ($query) {
                $query->where('semester', $this->semester);
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        $semesters = Curriculum::select('semester')
            ->distinct()
            ->orderBy('semester')
            ->pluck('semester');

        return view('livewire.admin.curriculum.index', [
            'curriculums' => $curriculums,
            'semesters'   => $semesters,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->semester = '';
        $this->resetPage();
    }

    public function delete(int $curriculumId): void
    {
        Curriculum::findOrFail($curriculumId)->delete();

        session()->flash('message', 'Curriculum deleted successfully.');

        $this->resetPage();
    }
}

<?php

namespace App\Livewire\Admin\Graduateprofile;

use App\Models\Graduateprofile;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected string $pageTitle = 'Data Profil Lulusan';
    protected $paginationTheme = 'tailwind';
    public $page = 1;
    public $search = '';

    public function render()
    {
        $graduateprofiles = Graduateprofile::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('livewire.admin.graduateprofile.index', [
            'graduateprofiles' => $graduateprofiles,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->resetPage();
    }
    public function delete(int $graduateprofileId): void
    {
        $graduateprofile = Graduateprofile::findOrFail($graduateprofileId);
        $graduateprofile->delete();

        session()->flash('message', 'Graduate profile deleted successfully.');

        $totalGraduateprofiles = Graduateprofile::count();
        $lastPage = max(1, (int) ceil($totalGraduateprofiles / 5));

        if ($this->page > $lastPage) {
            $this->gotoPage($lastPage);
        }
    }
}

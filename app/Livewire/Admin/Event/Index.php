<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    protected string $pageTitle = 'Data Kegiatan';

    protected $paginationTheme = 'tailwind';
    public $page = 1;
    public $search = '';

    public function documentationExists($documentationPath)
    {
        if (!$documentationPath) {
            return false;
        }
        return Storage::disk('public')->exists($documentationPath);
    }

    public function render()
    {
        $events = Event::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        // Add documentation exists check to each event
        $events->getCollection()->transform(function ($event) {
            $event->documentation_exists = $this->documentationExists($event->documentation);
            return $event;
        });

        return view('livewire.admin.event.index', [
            'events' => $events,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function delete(int $eventId): void
    {
        $event = Event::findOrFail($eventId);

        if ($event->documentation && Storage::disk('public')->exists($event->documentation)) {
            Storage::disk('public')->delete($event->documentation);
        }

        $event->delete();

        session()->flash('message', 'Event deleted successfully.');

        $totalEvents = Event::count();
        $lastPage = max(1, (int) ceil($totalEvents / 5));

        if ($this->page > $lastPage) {
            $this->gotoPage($lastPage);
        }
    }
}

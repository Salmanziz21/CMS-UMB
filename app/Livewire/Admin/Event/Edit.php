<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Edit Kegiatan';

    public $event;
    public $title;
    public $description;
    public $date;
    public $documentation;
    public $newDocumentation;
    public $documentationExists = false;

    public function mount($event)
    {
        $this->event = Event::findOrFail($event);
        $this->title = $this->event->title;
        $this->description = $this->event->description;
        $this->date = $this->event->date;
        $this->documentation = $this->event->documentation;
        $this->documentationExists = $this->checkDocumentationExists($this->documentation);
    }

    public function checkDocumentationExists($documentationPath)
    {
        if (!$documentationPath) {
            return false;
        }
        return Storage::disk('public')->exists($documentationPath);
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'newDocumentation' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $documentationPath = $this->documentation;

        if ($this->newDocumentation) {
            if ($documentationPath && Storage::disk('public')->exists($documentationPath)) {
                Storage::disk('public')->delete($documentationPath);
            }

            $documentationPath = $this->newDocumentation->store('event', 'public');
        }

        $this->event->update([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'documentation' => $documentationPath,
        ]);
        session()->flash('message', 'Data kegiatan berhasil diperbarui.');
        return redirect()->route('admin.event.index');
    }

    public function render()
    {
        return view('livewire.admin.event.edit', [
            'event' => $this->event,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }
}

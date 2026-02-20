<?php

namespace App\Livewire\Admin\Event;

use App\Models\Event;
use App\Models\Studyprogram;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Buat Kegiatan Baru';
    
    public $title, $description, $date, $documentation;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'documentation' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function updatedDocumentation(): void
    {
        $this->validateOnly('documentation');
    }
    
    public function save()
    {
        $validated = $this->validate();
        
        $imagePath = null;
        if ($this->documentation && method_exists($this->documentation, 'store')) {
            $imagePath = $this->documentation->store('event', 'public');
        }
        
        $studyprogram = Studyprogram::first();
        if ($studyprogram) {
            Event::create([
                'studyprogram_id' => $studyprogram->id,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'date' => $validated['date'],
                'documentation' => $imagePath,
            ]);
        } else {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }
        session()->flash('message', 'Data kegiatan berhasil ditambahkan.');
        return redirect()->route('admin.event.index');
    }

    public function render()
    {
        return view('livewire.admin.event.create')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}
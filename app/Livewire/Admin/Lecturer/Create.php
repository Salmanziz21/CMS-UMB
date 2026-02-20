<?php

namespace App\Livewire\Admin\Lecturer;

use App\Models\Studyprogram;
use App\Models\Lecturer;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Buat Dosen Baru';
    
    public $name, $major, $photo;

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'major' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function updatedPhoto(): void
    {
        $this->validateOnly('photo');
    }
    
    public function save()
    {
        $validated = $this->validate();
        
        $imagePath = null;
        if ($this->photo && method_exists($this->photo, 'store')) {
            $imagePath = $this->photo->store('lecturer', 'public');
        }
        
        $studyprogram = Studyprogram::first();
        if ($studyprogram) {
            Lecturer::create([
                'studyprogram_id' => $studyprogram->id,
                'name' => $validated['name'],
                'major' => $validated['major'],
                'photo' => $imagePath,
            ]);
        } else {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }
        
        session()->flash('message', 'Data dosen berhasil ditambahkan.');
        return redirect()->route('admin.lecturer.index');
    }

    public function render()
    {
        return view('livewire.admin.lecturer.create')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
    
}
<?php

namespace App\Livewire\Admin\Achievement;

use App\Models\Studyprogram;
use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Buat Karya Dan Prestasi Baru';
    
    public $title, $description, $image, $date, $category;
    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'date' => 'required|date',
            'category' => 'required|string',
        ];
    }

    public function updatedImage(): void
    {
        $this->validateOnly('image');
    }
    
    public function save()
    {
        $validated = $this->validate();
        
        $imagePath = '';

        if ($this->image && method_exists($this->image, 'store')) {
            $imagePath = $this->image->store('achievement', 'public');
        }
        
        $studyprogram = Studyprogram::first();
        if ($studyprogram) {
            Achievement::create([
                'studyprogram_id' => $studyprogram->id,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'image' => $imagePath,
                'date' => $validated['date'],
                'category' => $validated['category'],
            ]);
        } else {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }
        
        session()->flash('message', 'Data prestasi berhasil ditambahkan.');

        return redirect()->route('admin.achievement.index');
    }
    
    public function render()
    {
        return view('livewire.admin.achievement.create')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

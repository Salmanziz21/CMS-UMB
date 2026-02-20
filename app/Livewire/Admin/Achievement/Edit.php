<?php

namespace App\Livewire\Admin\Achievement;

use App\Models\Achievement;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Edit Karya Dan Prestasi';

    public $achievement;
    public $title;
    public $description;
    public $image;
    public $date;
    public $category;
    public $newImage;
    public $imageExists = false;

    public function mount($achievement)
    {
        $this->achievement = Achievement::findOrFail($achievement);
        $this->title = $this->achievement->title;
        $this->description = $this->achievement->description;
        $this->image = $this->achievement->image;
        $this->date = $this->achievement->date;
        $this->category = $this->achievement->category;
        $this->imageExists = $this->checkImageExists($this->image);
    }

    public function checkImageExists($imagePath)
    {
        if (!$imagePath) {
            return false;
        }
        return Storage::disk('public')->exists($imagePath);
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'newImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'category' => 'required|string',
        ]);

        $imagePath = $this->image;

        if ($this->newImage) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $this->newImage->store('achievement', 'public');
        }

        $this->achievement->update([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imagePath,
            'date' => $this->date,
            'category' => $this->category,
        ]);

        session()->flash('message', 'Data prestasi berhasil diperbarui.');
        return redirect()->route('admin.achievement.index');
    }

    public function render()
    {
        return view('livewire.admin.achievement.edit')
            ->layout('components.layouts.app', [
                'achievement' => $this->achievement,
                'title' => $this->pageTitle,
            ]);
    }
}

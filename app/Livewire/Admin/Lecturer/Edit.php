<?php

namespace App\Livewire\Admin\Lecturer;

use App\Models\Lecturer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Edit Dosen';

    public $lecturer;
    public $name;
    public $major;
    public $photo;
    public $newPhoto;
    public $photoExists = false;

    public function mount($lecturer)
    {
        $this->lecturer = Lecturer::findOrFail($lecturer);
        $this->name = $this->lecturer->name;
        $this->major = $this->lecturer->major;
        $this->photo = $this->lecturer->photo;
        $this->photoExists = $this->checkPhotoExists($this->photo);
    }

    public function checkPhotoExists($photoPath)
    {
        if (!$photoPath) {
            return false;
        }
        return Storage::disk('public')->exists($photoPath);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string',
            'newPhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = $this->photo;

        if ($this->newPhoto) {
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            $photoPath = $this->newPhoto->store('lecturer', 'public');
        }

        $this->lecturer->update([
            'name' => $this->name,
            'major' => $this->major,
            'photo' => $photoPath,
        ]);

        session()->flash('message', 'Data dosen berhasil diperbarui.');
        return redirect()->route('admin.lecturer.index');
    }

    public function render()
    {
        return view('livewire.admin.lecturer.edit', [
            'lecturer' => $this->lecturer,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }
}

<?php

namespace App\Livewire\Admin\Userinterface;

use App\Models\Userinterface;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Studyprogram;

class Index extends Component
{
    use WithFileUploads;

    protected string $pageTitle = 'Tampilan UI';

    public $userinterface;
    public $image_logo;
    public $image_background;
    public $logoExists = false;
    public $bgExists = false;

    public function mount()
    {
        $this->userinterface = Userinterface::first();
        if ($this->userinterface) {
            // Don't assign string paths to file upload properties.
            // $image_logo / $image_background stay null unless a new file is being uploaded.
            $this->logoExists = $this->checkImageExists($this->userinterface->image_logo);
            $this->bgExists   = $this->checkImageExists($this->userinterface->image_background);
        }
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
            'image_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        // Process logo upload
        $image_logoPath = $this->userinterface?->image_logo; // keep existing by default
        if ($this->image_logo && !is_string($this->image_logo)) {
            if ($this->userinterface?->image_logo && Storage::disk('public')->exists($this->userinterface->image_logo)) {
                Storage::disk('public')->delete($this->userinterface->image_logo);
            }
            $image_logoPath = $this->image_logo->store('userinterfaces', 'public');
        }

        // Process background upload
        $image_backgroundPath = $this->userinterface?->image_background; // keep existing by default
        if ($this->image_background && !is_string($this->image_background)) {
            if ($this->userinterface?->image_background && Storage::disk('public')->exists($this->userinterface->image_background)) {
                Storage::disk('public')->delete($this->userinterface->image_background);
            }
            $image_backgroundPath = $this->image_background->store('userinterfaces', 'public');
        }

        if (!$this->userinterface) {
            $studyprogram = Studyprogram::first();
            if ($studyprogram) {
                $this->userinterface = Userinterface::create([
                    'studyprogram_id'  => $studyprogram->id,
                    'image_logo'       => $image_logoPath,
                    'image_background' => $image_backgroundPath,
                ]);
            } else {
                session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
                return;
            }
        } else {
            $this->userinterface->update([
                'image_logo'       => $image_logoPath,
                'image_background' => $image_backgroundPath,
            ]);
        }

        $this->image_logo       = null; // reset so next upload is clean
        $this->image_background = null;
        $this->logoExists = $this->checkImageExists($this->userinterface->image_logo);
        $this->bgExists   = $this->checkImageExists($this->userinterface->image_background);

        session()->flash('message', 'Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.userinterface.index')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

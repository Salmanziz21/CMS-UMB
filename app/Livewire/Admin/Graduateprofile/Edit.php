<?php

namespace App\Livewire\Admin\Graduateprofile;

use Livewire\Component;
use App\Models\Graduateprofile;

class Edit extends Component
{
    protected string $pageTitle = 'Edit Profil Lulusan';
    public $title;
    public $description;
    public $graduateprofile;

    public function mount(Graduateprofile $graduateprofile)
    {
        $this->graduateprofile = $graduateprofile;
        $this->title = $this->graduateprofile->title;
        $this->description = $this->graduateprofile->description;
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $this->graduateprofile->update($validated);

        session()->flash('message', 'Data profil lulusan berhasil diperbarui.');

        return redirect()->route('admin.graduateprofile.index');
    }

    public function render()
    {
        return view('livewire.admin.graduateprofile.edit', [
            'graduateprofile' => $this->graduateprofile,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }
}

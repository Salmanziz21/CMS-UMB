<?php

namespace App\Livewire\Admin\Graduateprofile;

use App\Models\Studyprogram;
use App\Models\Graduateprofile;
use Livewire\Component;

class Create extends Component
{
    protected string $pageTitle = 'Buat Profil Lulusan Baru';
    public $title;
    public $description;

    public function save(){
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $studyprogram = Studyprogram::first();
        if ($studyprogram) {
            Graduateprofile::create([
                'studyprogram_id' => $studyprogram->id,
                'title' => $this->title,
                'description' => $this->description,
            ]);
        } else {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }

        session()->flash('message', 'Data profil lulusan berhasil ditambahkan.');

        return redirect()->route('admin.graduateprofile.index');
    }

    public function render()
    {
        return view('livewire.admin.graduateprofile.create')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

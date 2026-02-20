<?php

namespace App\Livewire\Admin\Curriculum;

use App\Models\Studyprogram;
use App\Models\Curriculum;
use Livewire\Component;

class Create extends Component
{
    protected string $pageTitle = 'Buat Kurikulum Baru';
    public $semester;
    public $subject;
    public $number_sks;

    public function save(){
        $validated = $this->validate([
            'semester' => 'required|string|max:255',
            'subject' => 'required|string',
            'number_sks' => 'required|numeric',
        ]);

        $studyprogram = Studyprogram::first();
        if ($studyprogram) {
            Curriculum::create(array_merge($validated, ['studyprogram_id' => $studyprogram->id]));
        } else {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }

        session()->flash('message', 'Data kurikulum berhasil ditambahkan.');

        return redirect()->route('admin.curriculum.index');
    }

    public function render()
    {
        return view('livewire.admin.curriculum.create')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

<?php

namespace App\Livewire\Admin\Curriculum;

use App\Models\Curriculum;
use Livewire\Component;

class Edit extends Component
{
    protected string $pageTitle = 'Edit Kurikulum';

    public $curriculum;
    public $semester;
    public $subject;
    public $number_sks;
    
    public function mount($curriculum)
    {
        $this->curriculum = Curriculum::findOrFail($curriculum);
        $this->semester = $this->curriculum->semester;
        $this->subject = $this->curriculum->subject;
        $this->number_sks = $this->curriculum->number_sks;
    }
    
    public function update(){
        $validated = $this->validate([
            'semester' => 'required|string|max:255',
            'subject' => 'required|string',
            'number_sks' => 'required|numeric',
        ]);

        $this->curriculum->update($validated);

        session()->flash('message', 'Data kurikulum berhasil diperbarui.');
        return redirect()->route('admin.curriculum.index');
    }

    public function render()
    {
        return view('livewire.admin.curriculum.edit', [
            'curriculum' => $this->curriculum,
        ])->layout('components.layouts.app', [
            'title' => $this->pageTitle,
        ]);
    }
}

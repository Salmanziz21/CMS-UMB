<?php

namespace App\Livewire\Admin\Studyprogram;

use Livewire\Component;
use App\Models\Studyprogram;

class Index extends Component
{
    protected string $pageTitle = 'Data Program Studi';

    public $studyprogram;
    public $name;
    public $description;
    public $vision;
    public $mission;
    public $profilestudy;
    public $history;
    public $accreditation;

    public function mount()
    {
        $this->studyprogram = Studyprogram::first();
        if ($this->studyprogram) {
            $this->name = $this->studyprogram->name ?? '';
            $this->description = $this->studyprogram->description ?? '';
            $this->vision = $this->studyprogram->vision ?? '';
            $this->mission = $this->studyprogram->mission ?? '';
            $this->profilestudy = $this->studyprogram->profilestudy ?? '';
            $this->history = $this->studyprogram->history ?? '';
            $this->accreditation = $this->studyprogram->accreditation ?? '';
        }
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'profilestudy' => 'required|string',
            'history' => 'required|string',
            'accreditation' => 'required|string',
        ]);

        if (!$this->studyprogram) {
            $this->studyprogram = Studyprogram::create([
                'name' => $this->name,
                'description' => $this->description,
                'vision' => $this->vision,
                'mission' => $this->mission,
                'profilestudy' => $this->profilestudy,
                'history' => $this->history,
                'accreditation' => $this->accreditation,
            ]);
        } else {
            $this->studyprogram->update([
                'name' => $this->name,
                'description' => $this->description,
                'vision' => $this->vision,
                'mission' => $this->mission,
                'profilestudy' => $this->profilestudy,
                'history' => $this->history,
                'accreditation' => $this->accreditation,
            ]);
        }

        session()->flash('message', 'Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.studyprogram.index')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

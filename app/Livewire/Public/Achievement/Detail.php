<?php

namespace App\Livewire\Public\Achievement;

use App\Models\Achievement;
use Livewire\Component;

class Detail extends Component
{
    public Achievement $achievement;

    public function mount(Achievement $achievement): void
    {
        $this->achievement = $achievement;
    }

    public function render()
    {
        return view('livewire.public.achievement.detail', [
            'achievement' => $this->achievement,
        ])->layout('components.layouts.public', [
            'title' => 'Karya & Prestasi - ' . $this->achievement->title,
        ]);
    }
}

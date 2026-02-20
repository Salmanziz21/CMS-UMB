<?php

namespace App\Livewire\Settings;

use Livewire\Component;

class Appearance extends Component
{
    protected string $pageTitle = 'Pengaturan Tampilan';

    public function render()
    {
        return view('livewire.settings.appearance')
            ->layout('components.layouts.settings', [
                'title' => $this->pageTitle,
            ]);
    }
}

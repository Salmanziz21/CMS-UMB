<?php

namespace App\Livewire\Public\Event;

use App\Models\Event;
use Livewire\Component;

class Detail extends Component
{
    public Event $event;

    public function mount(Event $event): void
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.public.event.detail', [
            'event' => $this->event,
        ])->layout('components.layouts.public', [
            'title' => 'Agenda - ' . $this->event->title,
        ]);
    }
}

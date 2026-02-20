<?php

namespace App\Livewire\Admin\Contact;

use App\Models\Studyprogram;
use App\Models\Contact;
use Livewire\Component;

class Index extends Component
{
    protected string $pageTitle = 'Kontak';

    public $contact;
    public $email;
    public $phone;
    public $address;

    public function mount()
    {
        $this->contact = Contact::first();
        if ($this->contact) {
            $this->email = $this->contact->email ?? '';
            $this->phone = $this->contact->phone ?? '';
            $this->address = $this->contact->address ?? '';
        }
    }

    public function update()
    {
        $this->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        if (!$this->contact) {
            $studyprogram = Studyprogram::first();
            if ($studyprogram) {
                $this->contact = Contact::create([
                    'studyprogram_id' => $studyprogram->id,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                ]);
            } else {
                session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
                return;
            }
        } else {
            $this->contact->update([
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
            ]);
        }

        session()->flash('message', 'Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.contact.index')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}

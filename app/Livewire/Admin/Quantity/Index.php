<?php

namespace App\Livewire\Admin\Quantity;

use App\Models\Studyprogram;
use App\Models\Quantity;
use Livewire\Component;

class Index extends Component
{
    protected string $pageTitle = 'Jumlah Mahasiswa Aktif';

    public $quantity;
    public $number_students;

    public function mount()
    {
        $this->quantity = Quantity::first();
        $this->number_students = $this->quantity?->number_students ?? 0;
    }

    public function update()
    {
        $this->validate([
            'number_students' => 'required|integer|min:0',
        ]);

        if (!$this->quantity) {
            $studyprogram = Studyprogram::first();
            if ($studyprogram) {
                $this->quantity = Quantity::create([
                    'studyprogram_id' => $studyprogram->id,
                    'number_students' => $this->number_students,
                ]);
            } else {
                session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
                return;
            }
        } else {
            $this->quantity->update([
                'number_students' => $this->number_students,
            ]);
        }

        session()->flash('message', 'Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.quantity.index')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}       

<?php

namespace App\Livewire\App;

use App\Models\Kontak;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Hub extends Component
{
    public $nama, $nomer, $akun, $pesan;

    public function submit()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'nomer' => 'required|string|max:20',
            'akun' => 'required|string|max:100',
            'pesan' => 'required|string|max:500',
        ]);

        Kontak::create([
            'nama' => $this->nama,
            'nomer' => $this->nomer,
            'akun' => $this->akun,
            'pesan' => $this->pesan,
        ]);

        session()->flash('message', 'Pesan berhasil dikirim!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.app.hub');
    }
}


<?php

namespace App\Livewire\Admin;

use App\Models\Kontak;
use App\Models\RekapPenjualan;
use Livewire\Component;
use Livewire\WithPagination;

class Report extends Component
{
    use WithPagination;
    public function render()
    {
        $reports = Kontak::paginate(10);
        $headers = [
            ['key' => 'nama','label' => 'Nama'],
            ['key' => 'nomor','label' => 'Nomor'],
            ['key' => 'akun','label' => 'Email'],
            ['key' => 'pesan','label' => 'Pesan'],
        ];
        
        return view('livewire.admin.report', compact('reports', 'headers'));
    }
}

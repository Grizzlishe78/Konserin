<?php

namespace App\Livewire\Admin;

use App\Models\RekapPenjualan;
use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class SalesReport extends Component
{
    use WithPagination;

    public function render()
    {
        $sales = Ticket::paginate(10); // Pagination
        $rekaps = RekapPenjualan::with('batch.event')->paginate(10);

        $headers = [
            ['key' => 'kode_tiket', 'label' => 'Kode Tiket'],
            ['key' => 'nama_pembeli', 'label' => 'Nama Pembeli'],
            ['key' => 'status', 'label' => 'Status'],
            ['key' => 'tanggal_beli', 'label' => 'Tanggal Beli'],
        ];

        $rekapHeaders = [
            ['key' => 'batch.event.name', 'label' => 'Event'],
            ['key' => 'batch.nama_batch', 'label' => 'Batch'],
            ['key' => 'total_penjualan', 'label' => 'Total Penjualan'],
        ];


        return view('livewire.admin.sales-report', compact('sales', 'headers','rekaps','rekapHeaders'));
    }
}

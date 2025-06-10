<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\TicketBatch;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class AddTicketBatch extends Component
{
    public $event_id, $nama_batch, $harga, $stok, $tanggal_mulai_penjualan, $tanggal_akhir_penjualan;
    use WithPagination;
    
    public function addTicketBatch()
    {
        $this->validate([
            'event_id' => 'required|exists:events,id',
            'nama_batch' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'tanggal_mulai_penjualan' => 'required|date',
            'tanggal_akhir_penjualan' => 'required|date|after:tanggal_mulai_penjualan',
        ]);

        TicketBatch::create([
            'event_id' => $this->event_id,
            'nama_batch' => $this->nama_batch,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'tanggal_mulai_penjualan' => $this->tanggal_mulai_penjualan,
            'tanggal_akhir_penjualan' => $this->tanggal_akhir_penjualan,
        ]);

        session()->flash('message', 'Batch tiket berhasil ditambahkan!');
        $this->reset();
    }
    public $eventOptions = []; 
    public function mount()
    {
    $this->eventOptions = collect(Event::all())->map(fn($e) => [
        'id' => $e->id,
        'name' => $e->name,
    ])->toArray();
    }

    public function render()
    {
        $batches = TicketBatch::with('event')->paginate(10);

        $headers = [
            ['key' => 'id', 'label' => 'ID'],
            ['key' => 'event.name', 'label' => 'Event Name'],
            ['key' => 'nama_batch', 'label' => 'Batch Name'],
            ['key' => 'harga', 'label' => 'Price'],
            ['key' => 'stok', 'label' => 'Stock'],
            ['key' => 'tanggal_mulai_penjualan', 'label' => 'Sale Start'],
            ['key' => 'tanggal_akhir_penjualan', 'label' => 'Sale End'],
        ];
        
    return view('livewire.admin.add-ticket-batch', [
    'events' => Event::all(),
    'batches' => $batches,
    'headers' => $headers,
]);

    }
}

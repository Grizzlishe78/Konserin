<?php

namespace App\Livewire\App;

use App\Models\RekapPenjualan;
use App\Models\Ticket;
use App\Models\TicketBatch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;


class FormPembayaran extends Component
{
    public $showForm = false;
    public $ticketBatchId;
    public $nama, $email, $no_hp, $alamat, $catatan;

    protected $listeners = ['beli-tiket' => 'beliTiket'];

    public function beliTiket($id)
    {
        $this->ticketBatchId = $id;
        $this->showForm = true;
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $batch = TicketBatch::findOrFail($this->ticketBatchId);

        if ($batch->stok < 1) {
            $this->addError('stok', 'Stok tiket habis.');
            return;
        }

        Ticket::create([
            'batch_id' => $batch->id,
            'user_id' => Auth::id(),
            'kode_tiket' => strtoupper(Str::random(10)),
            'tanggal_beli' => Carbon::now(),
            'nama_pembeli' => $this->nama,
            'email_pembeli' => $this->email,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'catatan_lain' => $this->catatan,
        ]);

        $batch->decrement('stok');

        RekapPenjualan::updateOrCreate(
            ['batch_id' => $batch->id],
            ['total_penjualan' => DB::raw("COALESCE(total_penjualan,0) + {$batch->harga}")]
        );

        session()->flash('message', 'Tiket berhasil dibeli.');
        $this->reset(['showForm', 'ticketBatchId', 'nama', 'email', 'no_hp', 'alamat', 'catatan']);
    }

    public function render()
    {
        return view('livewire.app.form-pembayaran');
    }
}

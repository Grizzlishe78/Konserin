<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_batch',
        'harga',
        'stok',
        'tanggal_mulai_penjualan',
        'tanggal_akhir_penjualan',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

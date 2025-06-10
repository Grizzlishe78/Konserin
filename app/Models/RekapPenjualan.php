<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapPenjualan extends Model
{
    protected $table = 'rekap_penjualan';
    protected $fillable = ['batch_id', 'total_penjualan'];

    public function batch()
    {
        return $this->belongsTo(TicketBatch::class, 'batch_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'user_id',
        'kode_tiket',
        'status',
        'tanggal_beli',
        'nama_pembeli',
        'email_pembeli',
        'no_hp',
        'alamat',
        'catatan_lain',
    ];

    public function batch()
    {
        return $this->belongsTo(TicketBatch::class, 'batch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

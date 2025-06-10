<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'location',
        'image',  // kolom gambar
    ];

    // Jika mau tambahkan relasi, misal ke batches (jika ada)
    public function batches()
    {
        return $this->hasMany(TicketBatch::class);
    }
}

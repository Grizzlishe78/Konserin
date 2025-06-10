<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketBatchesTable extends Migration
{
    public function up()
    {
        Schema::create('ticket_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('nama_batch');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->dateTime('tanggal_mulai_penjualan');
            $table->dateTime('tanggal_akhir_penjualan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_batches');
    }
}

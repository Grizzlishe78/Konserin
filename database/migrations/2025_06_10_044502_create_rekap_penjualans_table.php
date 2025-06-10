<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPenjualansTable extends Migration
{
    public function up()
    {
        Schema::create('rekap_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('ticket_batches')->onDelete('cascade');
            $table->decimal('total_penjualan', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekap_penjualan');
    }
}

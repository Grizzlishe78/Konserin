<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('ticket_batches')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('kode_tiket')->unique();
            $table->enum('status', ['aktif', 'batal', 'refund'])->default('aktif');
            $table->dateTime('tanggal_beli');
            // Data identitas pembeli yang bisa berbeda dari data user
            $table->string('nama_pembeli')->nullable();
            $table->string('email_pembeli')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('catatan_lain')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}

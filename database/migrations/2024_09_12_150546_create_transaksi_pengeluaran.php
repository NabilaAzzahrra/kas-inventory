<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_tpengeluaran');
            $table->integer('id_uraian_pengeluaran');
            $table->string('pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->date('tanggal_faktur1')->nullable();
            $table->date('tanggal_faktur2')->nullable();
            $table->integer('tagihan');
            $table->text('keterangan');
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluaran');
    }
};

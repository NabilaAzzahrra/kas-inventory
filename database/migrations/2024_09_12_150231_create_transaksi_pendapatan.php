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
        Schema::create('transaksi_pendapatan', function (Blueprint $table) {
            $table->id();
            $table->string('id_tpendapatan');
            $table->integer('id_uraian_pendapatan');
            $table->integer('id_pendapatan');
            $table->date('tanggal_pendapatan');
            $table->date('tanggal_faktur1')->nullable();
            $table->date('tanggal_faktur2')->nullable();
            $table->integer('gross')->default(0);
            $table->integer('retur')->default(0);
            $table->integer('netto');
            $table->integer('kurang_bayar')->default(0);
            $table->integer('lebih_bayar')->default(0);
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
        Schema::dropIfExists('transaksi_pendapatan');
    }
};

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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('nisn')->constrained('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_petugas')->constrained('petugas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_spp')->constrained('spp')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 8);
            $table->string('tahun_dibayar', 4);
            $table->integer('jumlah_bayar');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

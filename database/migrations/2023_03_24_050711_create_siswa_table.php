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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('nisn');
            $table->char('nis', 8);
            $table->string('nama_siswa', 35);
            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_spp')->constrained('spp')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};

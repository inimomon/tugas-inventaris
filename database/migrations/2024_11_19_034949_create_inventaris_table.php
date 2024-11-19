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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id('id_inventaris');
            $table->string('nama');
            $table->string('kondisi');
            $table->text('keterangan')->nullable();
            $table->integer('jumlah');
            $table->date('tanggal_register');
            $table->foreignId('id_jenis')->constrained('jenis')->onDelete('cascade');
            $table->foreignId('id_ruang')->constrained('ruang')->onDelete('cascade');
            $table->foreignId('id_petugas')->constrained('petugas')->onDelete('cascade');
            $table->string('kode_inventaris')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};

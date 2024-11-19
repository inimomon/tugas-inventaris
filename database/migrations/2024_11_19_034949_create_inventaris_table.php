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
            $table->unsignedBigInteger('id_jenis');
            $table->unsignedBigInteger('id_ruang');
            $table->unsignedBigInteger('id_petugas');

            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
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

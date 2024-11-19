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
        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->id('id_detail_pinjam');
            $table->unsignedBigInteger('id_inventaris');
            $table->unsignedBigInteger('id_peminjaman');

            $table->foreign('id_inventaris')->references('id_inventaris')->on('inventaris')->onDelete('cascade');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pinjam');
    }
};

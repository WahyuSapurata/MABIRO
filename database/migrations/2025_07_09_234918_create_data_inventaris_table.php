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
        Schema::create('data_inventaris', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('no_inventaris'); // NO. INVENTARIS
            $table->string('nama_barang'); // NAMA BARANG
            $table->integer('jumlah'); // JUMLAH
            $table->string('satuan'); // SATUAN
            $table->integer('baik')->default(0); // JUMLAH kondisi BAIK
            $table->integer('kurang_baik')->default(0); // JUMLAH kondisi KURANG BAIK
            $table->integer('rusak')->default(0); // JUMLAH kondisi RUSAK
            $table->text('keterangan')->nullable(); // KETERANGAN
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_inventaris');
    }
};

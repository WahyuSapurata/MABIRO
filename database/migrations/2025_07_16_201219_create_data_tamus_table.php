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
        Schema::create('data_tamus', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nama_tamu');
            $table->string('alamat');
            $table->string('tujuan');
            $table->string('tanggal_masuk');
            $table->string('tanggal_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tamus');
    }
};

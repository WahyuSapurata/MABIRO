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
        Schema::create('data_peminjamen', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('penanggung_jawab');
            $table->string('barang');
            $table->string('nomor_telepon');
            $table->string('surat');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_peminjamen');
    }
};

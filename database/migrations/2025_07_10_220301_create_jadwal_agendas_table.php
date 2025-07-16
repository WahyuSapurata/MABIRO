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
        Schema::create('jadwal_agendas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('nama_agenda');
            $table->string('jadwal_pelaksanaan');
            $table->string('foto_absen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_agendas');
    }
};

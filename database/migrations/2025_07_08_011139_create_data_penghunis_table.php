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
        Schema::create('data_penghunis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->uuid('uuid_user');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('universitas');
            $table->string('program_studi');
            $table->string('riwayat_pendidikan');
            $table->string('no_hp');
            $table->string('alasan');
            $table->boolean('persetujuan');
            $table->string('kamar')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penghunis');
    }
};

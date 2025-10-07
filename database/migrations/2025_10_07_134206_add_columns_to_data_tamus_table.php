<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('data_tamus', function (Blueprint $table) {
            // Menambahkan kolom setelah kolom 'alamat'
            $table->string('kerabat')->nullable()->after('alamat');
            $table->string('no_handphone')->nullable()->after('kerabat');

            // Menambahkan kolom setelah kolom 'tanggal_keluar'
            $table->string('identitas')->nullable()->after('tanggal_keluar');
        });
    }

    public function down(): void
    {
        Schema::table('data_tamus', function (Blueprint $table) {
            $table->dropColumn(['kerabat', 'no_handphone', 'identitas']);
        });
    }
};

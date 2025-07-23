<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataPenghuni;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::updateOrCreate(
            ['username' => 'biro'],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'nama' => 'Biro Asrama',
                'role' => 'biro',
                'password_hash' => '<>password',
                'password' => Hash::make('<>password'),
            ]
        );

        $data_penghuni = User::updateOrCreate(
            ['username' => 'wahyu'],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'nama' => 'Wahyu Hidayat',
                'role' => 'penghuni',
                'password_hash' => '<>password',
                'password' => Hash::make('<>password'),
            ]
        );

        $uuid_penghuni = $data_penghuni->uuid;
        DataPenghuni::updateOrCreate(
            [
                'uuid' => Uuid::uuid4()->toString(),
                'uuid_user' => $uuid_penghuni,
                'tempat_lahir' => 'Sinjai',
                'tanggal_lahir' => '26-02-2000',
                'agama' => 'Islam',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Sinjai',
                'universitas' => 'UINAM',
                'program_studi' => 'SI',
                'riwayat_pendidikan_sd' => 'SD 45',
                'riwayat_pendidikan_smp' => 'SMP 6',
                'riwayat_pendidikan_sma' => 'SMA 1',
                'no_hp' => '085xxxxxx',
                'alasan' => 'Coba coba',
                'persetujuan' => 1,
                'kamar' => 'F4',
                'status' => 'Belum Dikonfirmasi',
            ]
        );
    }
}

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
            ['username' => 'ozan'],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'nama' => 'Ozan',
                'role' => 'penghuni',
                'password_hash' => '123',
                'password' => Hash::make('123'),
            ]
        );

        $uuid_penghuni = $data_penghuni->uuid;
        DataPenghuni::updateOrCreate(
            ['uuid_user' => $uuid_penghuni],
            [
                'uuid' => Uuid::uuid4()->toString(),
                'tempat_lahir' => 'Balikpapan',
                'tanggal_lahir' => '17-05-2000',
                'agama' => 'Islam',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Manggar',
                'universitas' => 'UIN Alauddin Makassar',
                'program_studi' => 'Sistem Informasi',
                'riwayat_pendidikan_sd' => 'SDN 013 Balikpapan Timur',
                'riwayat_pendidikan_smp' => 'SMPN 8 Balikpapan',
                'riwayat_pendidikan_sma' => 'SMAN 7 Balikpapan',
                'no_hp' => '0812xxxxxx',
                'alasan' => 'Tertarik & Ingin Mendapatkan Wadah Bersosial',
                'persetujuan' => 1,
                'kamar' => 'M09',
                'status' => 'Belum Dikonfirmasi',
            ]
        );
    }
}

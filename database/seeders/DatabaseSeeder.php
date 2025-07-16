<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
    }
}

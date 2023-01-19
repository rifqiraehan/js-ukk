<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Rifqi Raehan Hermawan',
            'email' => 'rifqiraehan86@gmail.com',
            'username' => 'rifqiraehan',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '1',
        ]);

        User::create([
            'name' => 'Bu Jane',
            'email' => 'penjual@gmail.com',
            'username' => 'penjual',
            'lokasi' => 'Lokasi A',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);

        User::create([
            'name' => 'Pak John',
            'email' => 'partner@gmail.com',
            'username' => 'partner',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'murid@gmail.com',
            'username' => 'murid',
            'kelas' => 'X',
            'jurusan' => 'RPL 1',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '4',
        ]);

        User::factory(5)->penjual()->create();

        User::factory(5)->kurir()->create();

        User::factory(5)->murid()->create();
    }
}

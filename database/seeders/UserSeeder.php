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
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);

        User::factory(5)->penjual()->create();

        User::create([
            'name' => 'John Doe',
            'email' => 'murid@gmail.com',
            'username' => 'murid',
            'kelas' => 'X',
            'jurusan' => 'RPL 1',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'Muhammad Raihan',
            'email' => 'raeihann.jo@gmail.com',
            'username' => 'th6man5',
            'kelas' => 'XII',
            'jurusan' => 'RPL 2',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '3',
        ]);

        User::create([
            'name' => 'Akmal Luthfi',
            'email' => 'akmalluthfi@gmail.com',
            'username' => 'alfi',
            'kelas' => 'XII',
            'jurusan' => 'RPL 2',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '3',
        ]);

        User::factory(5)->murid()->create();
    }
}

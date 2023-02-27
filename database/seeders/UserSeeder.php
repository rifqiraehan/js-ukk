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

        // Start Penjual
        User::create([
            'name' => 'Aris 123',
            'email' => 'aris123@gmail.com',
            'username' => 'aris123',
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Cak Man',
            'email' => 'cakman@gmail.com',
            'username' => 'cakman',
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Bu As',
            'email' => 'buas@gmail.com',
            'username' => 'buas',
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Bu Wiwik',
            'email' => 'buwiwik@gmail.com',
            'username' => 'buwiwik',
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Mbak Tina',
            'email' => 'mbaktina@gmail.com',
            'username' => 'mbaktina',
            'lokasi' => 'Kantin Utama',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Bakso Bu Suharti',
            'email' => 'baksobusuharti@gmail.com',
            'username' => 'baksobusuharti',
            'lokasi' => 'Kantin Utara',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Mas Rahardian',
            'email' => 'masrahardian@gmail.com',
            'username' => 'masrahardian',
            'lokasi' => 'Kantin Utara',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Sowan Pak De',
            'email' => 'sowanpakde@gmail.com',
            'username' => 'sowanpakde',
            'lokasi' => 'Kantin Utara',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '2',
        ]);

        // End Penjual



        // User::factory(5)->penjual()->create();

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

        // User::factory(5)->murid()->create();
    }
}

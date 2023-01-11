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

        User::factory(3)->penjual()->create();

        User::factory(3)->kurir()->create();

        User::factory(3)->murid()->create();
    }
}

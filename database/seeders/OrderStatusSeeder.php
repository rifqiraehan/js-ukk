<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'status' => 'Menunggu Konfirmasi',
        ]);

        OrderStatus::create([
            'status' => 'Pesanan Dikonfirmasi',
        ]);

        OrderStatus::create([
            'status' => 'Pesanan Siap',
        ]);

        OrderStatus::create([
            'status' => 'Pesanan Selesai',
        ]);
    }
}

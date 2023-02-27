<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Aris 123
        Product::create([
            'name' => 'Es Krim',
            'detail' => 'Produk makanan yang terbuat dari campuran susu, gula, dan bahan-bahan lainnya yang dibekukan menjadi tekstur lembut yang dingin.',
            'harga' => '8000',
            'stok' => '10',
            'foto' => 'images\data-real\Aris 123\ice-cream.jpg',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Mie Instan',
            'detail' => 'Mie yang sudah diproses dan dikemas dalam kemasan siap saji, biasanya hanya perlu direbus dan dicampur dengan bumbu yang sudah disediakan.',
            'harga' => '5000',
            'stok' => '5',
            'foto' => 'images\data-real\Aris 123\mie-instant.jpg',
            'user_id' => '2'
        ]);

        Product::create([
            'name' => 'Pop Mie',
            'detail' => 'Merek mie instant yang sudah terkenal dan populer di Indonesia, dengan berbagai varian rasa dan bentuk mie yang berbeda.',
            'harga' => '9000',
            'stok' => '3',
            'foto' => 'images\data-real\Aris 123\pop-mie.jpg',
            'user_id' => '2'
        ]);

        // Cak Man
        Product::create([
            'name' => 'Es Buah',
            'detail' => 'Minuman segar yang terbuat dari campuran buah-buahan yang dicampur dengan es serut dan sirup atau susu kental manis.',
            'harga' => '6000',
            'stok' => '11',
            'foto' => 'images\data-real\Cak Man\es-buah.jpg',
            'user_id' => '3'
        ]);

        Product::create([
            'name' => 'Es Teh',
            'detail' => 'Minuman teh yang disajikan dingin dengan tambahan es batu.',
            'harga' => '4000',
            'stok' => '12',
            'foto' => 'images\data-real\Cak Man\es-teh.jpg',
            'user_id' => '3'
        ]);

        Product::create([
            'name' => 'Minuman Soda',
            'detail' => 'Minuman bersoda yang terdiri dari campuran air soda dan sirup, dengan berbagai macam rasa yang tersedia.',
            'harga' => '700',
            'stok' => '13',
            'foto' => 'images\data-real\Cak Man\soda.jpg',
            'user_id' => '3'
        ]);

        // Bu As
        Product::create([
            'name' => 'Es Teh Lemon',
            'detail' => 'Variasi dari es teh yang ditambahkan dengan perasan jeruk lemon.',
            'harga' => '7000',
            'stok' => '11',
            'foto' => 'images\data-real\Bu As\es-teh-lemon.jpg',
            'user_id' => '4'
        ]);

        Product::create([
            'name' => 'Gado-Gado',
            'detail' => 'Hidangan Indonesia yang terdiri dari campuran sayuran segar, tahu, tempe, dan telur rebus, yang disajikan dengan bumbu kacang yang kental dan pedas.',
            'harga' => '9000',
            'stok' => '13',
            'foto' => 'images\data-real\Bu As\gado-gado.jpg',
            'user_id' => '4'
        ]);

        Product::create([
            'name' => 'Nasi Goreng',
            'detail' => 'Hidangan nasi yang digoreng dengan bumbu-bumbu tertentu dan ditambahkan dengan berbagai macam bahan seperti telur, sayuran, dan daging.',
            'harga' => '10000',
            'stok' => '23',
            'foto' => 'images\data-real\Bu As\nasi-goreng.jpg',
            'user_id' => '4'
        ]);

        // Bu Wiwik
        Product::create([
            'name' => 'Es Cincau',
            'detail' => 'Minuman segar yang terbuat dari cincau, yang memiliki tekstur kenyal dan disajikan dengan es serut dan sirup.',
            'harga' => '4000',
            'stok' => '12',
            'foto' => 'images\data-real\Bu Wiwik\es-cincau.jpg',
            'user_id' => '5'
        ]);

        Product::create([
            'name' => 'Es Milo',
            'detail' => 'Minuman dingin yang terbuat dari campuran susu, bubuk milo, dan es serut.',
            'harga' => '5000',
            'stok' => '3',
            'foto' => 'images\data-real\Bu Wiwik\es-milo.jpg',
            'user_id' => '5'
        ]);

        Product::create([
            'name' => 'Gorengan',
            'detail' => 'Jenis makanan yang terdiri dari bahan-bahan yang digoreng seperti tempe, tahu, pisang, atau ubi jalar.',
            'harga' => '2000',
            'stok' => '23',
            'foto' => 'images\data-real\Bu Wiwik\gorengan.jpg',
            'user_id' => '5'
        ]);

        // Mbak Tina
        Product::create([
            'name' => 'Kopi',
            'detail' => 'Minuman yang terbuat dari biji kopi yang diseduh dengan air panas.',
            'harga' => '5000',
            'stok' => '13',
            'foto' => 'images\data-real\Mbak Tina\kopi.jpg',
            'user_id' => '6'
        ]);

        Product::create([
            'name' => 'Nasi Campur',
            'detail' => 'Hidangan nasi yang dicampur dengan berbagai macam lauk seperti ayam, ikan, atau daging sapi, dan biasanya disajikan dengan acar dan sambal.',
            'harga' => '9000',
            'stok' => '11',
            'foto' => 'images\data-real\Mbak Tina\nasi-campur.jpg',
            'user_id' => '6'
        ]);

        Product::create([
            'name' => 'Pecel',
            'detail' => 'Hidangan Indonesia yang terdiri dari sayuran segar seperti kacang panjang dan kangkung, yang disajikan dengan bumbu kacang yang kental dan pedas.',
            'harga' => '8000',
            'stok' => '5',
            'foto' => 'images\data-real\Mbak Tina\pecel.jpg',
            'user_id' => '6'
        ]);

        // Bakso Bu Suharti
        Product::create([
            'name' => 'Bakso',
            'detail' => 'Bola daging yang terbuat dari campuran daging sapi, tepung, dan bahan-bahan lainnya, biasanya dimasak dalam kuah kaldu atau digoreng.',
            'harga' => '8000',
            'stok' => '29',
            'foto' => 'images\data-real\Bakso Bu Suharti\bakso.jpg',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Es Buah',
            'detail' => 'Minuman segar yang terbuat dari campuran buah-buahan yang dicampur dengan es serut dan sirup atau susu kental manis.',
            'harga' => '4000',
            'stok' => '15',
            'foto' => 'images\data-real\Bakso Bu Suharti\es-buah.jpg',
            'user_id' => '7'
        ]);

        Product::create([
            'name' => 'Es Teh',
            'detail' => 'Minuman teh yang disajikan dingin dengan tambahan es batu.',
            'harga' => '3000',
            'stok' => '5',
            'foto' => 'images\data-real\Bakso Bu Suharti\es-teh.jpg',
            'user_id' => '7'
        ]);

        // Mas Rahardian
        Product::create([
            'name' => 'Bakso',
            'detail' => 'Bola daging yang terbuat dari campuran daging sapi, tepung, dan bahan-bahan lainnya, biasanya dimasak dalam kuah kaldu atau digoreng.',
            'harga' => '7000',
            'stok' => '15',
            'foto' => 'images\data-real\Mas Rahardian\bakso.jpg',
            'user_id' => '8'
        ]);

        Product::create([
            'name' => 'Mie Ayam',
            'detail' => 'Hidangan mie yang disajikan dengan irisan daging ayam dan bumbu-bumbu tertentu.',
            'harga' => '5000',
            'stok' => '15',
            'foto' => 'images\data-real\Mas Rahardian\mie-ayam.jpg',
            'user_id' => '8'
        ]);

        // Sowan Pak De
        Product::create([
            'name' => 'Ayam Goreng',
            'detail' => 'Hidangan ayam yang digoreng dengan bumbu-bumbu tertentu, biasanya disajikan dengan nasi dan sambal.',
            'harga' => '6000',
            'stok' => '15',
            'foto' => 'images\data-real\Sowan Pak De\ayam-goreng.jpg',
            'user_id' => '9'
        ]);

        Product::create([
            'name' => 'Bakso',
            'detail' => 'Bola daging yang terbuat dari campuran daging sapi, tepung, dan bahan-bahan lainnya, biasanya dimasak dalam kuah kaldu atau digoreng.',
            'harga' => '3000',
            'stok' => '5',
            'foto' => 'images\data-real\Sowan Pak De\bakso.jpg',
            'user_id' => '9'
        ]);

        Product::create([
            'name' => 'Bakwan',
            'detail' => 'Jenis makanan yang terdiri dari adonan tepung yang dicampur dengan berbagai macam bahan seperti sayuran atau udang, yang digoreng hingga matang.',
            'harga' => '3000',
            'stok' => '5',
            'foto' => 'images\data-real\Sowan Pak De\bakwan.jpg',
            'user_id' => '9'
        ]);

        // Product::factory(20)->create();
    }
}

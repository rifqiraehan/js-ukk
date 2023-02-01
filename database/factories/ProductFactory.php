<?php

namespace Database\Factories;

use GuzzleHttp\Client as GuzzleClient;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'detail' => $this->faker->sentence(),
            'harga' => $this->faker->randomNumber(5),
            'stok' => $this->faker->randomNumber(2),
            'foto' => 'default/product.jpeg',
            'user_id' => rand(2, 7),
        ];
    }

}


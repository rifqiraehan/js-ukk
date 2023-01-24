<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        $userIds = \App\Models\User::pluck('id')->toArray();
        
        return [
            'name' => $this->faker->word(),
            'detail' => $this->faker->sentences(),
            'harga' => $this->faker->randomNumber(5),
            'stok' => $this->faker->randomNumber(2),
            'foto' => $this->faker->image(storage_path('app/public/product'), 50, 50, null, false),
            'user_id' => $this->faker->randomElement($userIds),

        ];
    }
}

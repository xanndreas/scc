<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->text(),
            'type' => 'type',
            'category_id' => 1,
            'stock_minimum' => 5,
            'price_buy' => 10000,
            'price_sell' => 12000,
            'packaging_unit' => 'pcs',
            'slug' => Str::slug($this->faker->text()),
            'product_code' => Str::random(6),
            'description' => $this->faker->paragraph(),
        ];
    }
}

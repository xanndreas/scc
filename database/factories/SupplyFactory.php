<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supply>
 */
class SupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity_needs' => 10,
            'initial_price' => 10000,
            'product_id' => Product::all()->random()->id,
            'start_date' => '2023-09-18 12:15:32',
            'end_date' => '2023-09-23 12:15:32',
            'status' => 'enabled',
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Nazi Goreng',
                'type' => 'type',
                'category_id' => 1,
                'stock_minimum' => 5,
                'price_buy' => 10000,
                'price_sell' => 12000,
                'packaging_unit' => 'pcs',
                'slug' => 'nazi-goreng',
                'product_code' => 'ng001',
                'description' => 'dummy',
            ],
        ];

        Product::insert($categories);
    }
}

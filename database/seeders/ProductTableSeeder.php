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
            ],            [
                'id' => 2,
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
            ],            [
                'id' => 3,
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
            ],            [
                'id' => 4,
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
            ],            [
                'id' => 5,
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
            ],            [
                'id' => 6,
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
            ],            [
                'id' => 7,
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
            ],            [
                'id' => 8,
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
            ],            [
                'id' => 9,
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

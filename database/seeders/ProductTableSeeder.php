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
                'name' => 'Nasi Goreng',
                'type' => 'type',
                'category_id' => 1,
                'stock_minimum' => 5,
                'price_buy' => 10000,
                'price_sell' => 12000,
                'packaging_unit' => 'pcs',
                'slug' => 'nasi-goreng',
                'product_code' => 'nasi-goreng',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur tempor dolor, nec tempus turpis finibus ac. Mauris tincidunt libero felis, ac ultricies orci aliquet quis. Donec varius, ex ut tincidunt blandit, nisl sem consectetur ex, sed laoreet libero nibh quis eros. Aenean congue at arcu quis bibendum. Vivamus accumsan nulla ac ornare suscipit. Maecenas purus est, gravida at nunc id, porttitor vehicula orci. Mauris a nisi id ipsum sodales ullamcorper ut nec nunc. Pellentesque risus dolor, pharetra in urna vel, ultrices condimentum tortor. Maecenas ut nibh lectus. Morbi ornare leo vitae justo volutpat, at iaculis lorem venenatis. Nam venenatis ante nec porta volutpat. Integer quis eros laoreet, euismod leo id, commodo felis. Vivamus lorem libero, euismod ac sem eleifend, rhoncus commodo nunc.',
            ]
        ];

        Product::insert($categories);
    }
}
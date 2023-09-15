<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'id'    => 1,
                'name' => 'Makanan',
            ],
            [
                'id'    => 2,
                'name' => 'Minuman',
            ],
        ];

        Category::insert($categories);
    }
}

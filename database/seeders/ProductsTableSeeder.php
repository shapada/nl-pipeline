<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'id' => 1 ,
                'name' => 'First Reserve',
            ],
            [
                'id' => 2,
                'name' => '1 Year ARM',

            ],
            [
                'id' =>3,
                'name' => '3 Year ARM',

            ],
            [
                'id' => 4,
                'name' => '5 Year ARM',

            ],
            [
                'id' => 5,
                'name' => '7/1 ARM',
            ],
            [
                'id' => 6,
                'name' => '10/1 ARM',

            ],
            [
                'id' => 7,
                'name' => '15 Year Fixed (15 Year AM)'

            ],
            [
                'id' => 8,
                'name' => 'Construction'
            ],
            [
                'id' => 9,
                'name' => '15 Year Fixed (FHLB)'

            ],
            [
                'id' => 10,
                'name' => '20 Year Fixed (FHLB)'
            ],
            [
                'id' => 11,
                'name' => '30 Year Fixed (FHLB)'
            ]
        ];

        Product::insert($products);
    }
}

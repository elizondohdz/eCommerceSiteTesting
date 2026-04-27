<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $products = [
            [
                'name' => 'Gaming Mouse',
                'description' => 'High precision gaming mouse',
                'price' => 49.99,
                'image_url' => null,
                'is_active' => true
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard',
                'price' => 89.99,
                'image_url' => null,
                'is_active' => true
            ],
            [
                'name' => 'Gaming Headset',
                'description' => 'Surround sound gaming headset',
                'price' => 79.99,
                'image_url' => null,
                'is_active' => true
            ],
            [
                'name' => 'Monitor 27"',
                'description' => '144Hz gaming monitor',
                'price' => 249.99,
                'image_url' => null,
                'is_active' => true
            ],
            [
                'name' => 'Mouse Pad XL',
                'description' => 'Large gaming mouse pad',
                'price' => 19.99,
                'image_url' => null,
                'is_active' => true
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

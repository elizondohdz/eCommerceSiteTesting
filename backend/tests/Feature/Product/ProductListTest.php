<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_returns_product_list()
    {        
        // Arrange
        Product::factory()->count(3)->create([
            'is_active' => true,
        ]);

        // Act 
        $response = $this->getJson('/api/products');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonCount(3);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'description',
                'price',
                'image_url',
                'is_active',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}

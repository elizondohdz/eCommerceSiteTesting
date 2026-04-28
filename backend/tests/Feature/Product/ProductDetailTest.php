<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductDetailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_it_returns_single_product_successfully(): void
    {
        
        // Arrange
        $product = Product::factory()->create();
                
        // Act 
        $response = $this->getJson("/api/products/{$product->id}");

        // Assert
        $response->assertStatus(200);

        $response->assertJson([
            'id' => $product->id,
            'name' => $product->name,
        ]);
    }

    public function test_it_returns_404_if_product_not_found(): void
    {
        // Act 
        $response = $this->getJson("/api/products/999");

        // Assert
        $response->assertStatus(404);
    }


}

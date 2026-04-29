<?php

namespace Tests\Feature\Cart;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AddToCartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_can_add_product_to_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $token = JWTAuth::fromUser($user);
    
        $response = $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->postJson('/api/cart/items' , [
            'product_id' => $product->id
        ]);
        
        $response->assertStatus(201);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'quantity' => 1
        ]);
    }

    public function test_quantity_increments_if_product_already_exists(): void 
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $token = JWTAuth::fromUser($user);

        $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->postJson('/api/cart/items', [
            'product_id' => $product->id
        ]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->postJson('/api/cart/items', [
            'product_id' => $product->id
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'quantity' => 2
        ]);
    }


}

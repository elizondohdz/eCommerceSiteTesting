<?php

namespace Tests\Feature\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RemoveFromCartTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_remove_item_from_cart(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();
        $cart = Cart::create([
            'user_id' => $user->id
        ]);

        $item = $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => "Bearer {$token}"
        ])->deleteJson("/api/cart/items/{$item->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('cart_items', [
            'id' => $item->id
        ]);
    }
}

<?php

namespace Tests\Feature\Checkout;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_checkout_successfully(): void
    {
        $user = User::factory()->create();

        $cart = Cart::factory()->create([
            'user_id' => $user->id
        ]);

        $product = Product::factory()->create([
            'price' => 100
        ]);

        $cart->items()->create([
            'product_id' => $product->id,
            'quantity' => 2
        ]);

        $response = $this->actingAs($user)
            ->postJson('/api/checkout');

        $response->assertStatus(201);
        
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $product->id,
            'quantity' => 2,
            'price' => 100
        ]);

        $this->assertDatabaseMissing('cart_items', [
            'product_id' => $product->id
        ]);
    }

    public function test_user_cannot_checkout_empty_cart(): void
    {
        $user = User::factory()->create();

        Cart::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)
            ->postJson('api/checkout');

        $response->assertStatus(400);
    }

    public function test_guest_cannot_checkout(): void
    {
        $response = $this->postJson('api/checkout');

        $response->assertStatus(401);
    }
}

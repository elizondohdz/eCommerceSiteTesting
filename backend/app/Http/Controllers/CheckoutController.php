<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::with('items.products')
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        if($cart->items->isEmpty()) {
            return response()->json([
                'message' => 'Cart is empty'
            ], 400);
        }

            $total = collect($cart->items->price)->sum();

            $order = Order::create([
                'user_id' => $request->user()->id,
                'total_amount' => $total
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
            }

            $cart->items()->delete();
            return $order->load('items.product');
        });

        return response()->json($order, 201);
    }
}

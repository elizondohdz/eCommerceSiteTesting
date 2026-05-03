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
        $user = $request->user();
        
        return DB::transaction(function () use ($user) {
            $cart = Cart::with('items.product')
                ->where('user_id', $user->id)
                ->firstOrFail();
            
            if ($cart->items->isEmpty()) {
                abort(400, 'Cart is empty');
            }

            $order = Order::create([
                'user_id' => $user->id,
            ]);
            
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $cart->items()->delete();

            return response()->json([
                'message' => 'Order created successfully'
                ], 201);
            });
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Get authenticated user's cart
     */
    public function index(Request $request)
    {
        $cart = Cart::with('items.product')
            ->firstOrCreate([
                'user_id' => $request->user()->id
            ]);
        
        return response()->json($cart);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);
        
        $cart = Cart::firstOrCreate([
            'user_id' => $request->user()->id
        ]);

        $existingItem = $cart->items()
            ->where('product_id', $validated['product_id'])
            ->first();
        
        if($existingItem) {
            $existingItem->increment('quantity');

            return response()->json($existingItem);
        }
        
        $item = $cart->items()->create([
            'product_id' => $validated['product_id'],
            'quantity' => 1
        ]);
    
        return response()->json($item, 201);
    }

    public function destroy(Request $request, int $id)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->firstOrFail();

        $item = $cart->items()
            ->findOrFail($id);

        $item->delete();

        return response()->json([
            'message' => 'Item removed successfully'
        ]);
    }


}

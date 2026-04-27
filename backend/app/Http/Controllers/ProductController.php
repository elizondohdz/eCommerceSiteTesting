<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Return all active products
     */
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        return response()->json($products);
    }

    /**
     * Return single product by ID
     */
    public function show($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        return response()->json($product);
    }
}

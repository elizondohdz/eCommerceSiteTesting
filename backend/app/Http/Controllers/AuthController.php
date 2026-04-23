<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        // Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Login attempt
        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        // Login successful, return token
        return response()->json([
            'token' => $token,
            'type' => 'bearer'
        ], 200);
    }

        // Get authenticated user
        public function me()
    {
        return response()->json(Auth::user());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validation
        // TODO : use a FormRequest for validation instead of inline validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        

        // Login attempt
        $token = JWTAuth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);

        
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        // Login successful, return token
        // TODO: return a TokenResource instead of raw token
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

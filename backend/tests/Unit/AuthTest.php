<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_hashing_is_working_correctly(): void
    {
        // Arrange
        $password = 'password123';

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'name' => 'testuser',
            'password' => Hash::make($password),
        ]);

        // Act
        $token = JWTAuth::attempt([
            'email' => $user->email,
            'password' => $password
        ]);

        // Assert
        $this->assertNotNull($token);
        $this->assertIsString($token);
    }
}

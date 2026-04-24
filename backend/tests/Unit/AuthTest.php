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
        $password = '12345';

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
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

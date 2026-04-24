<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_user_can_login_successfully_and_receive_token(): void
    {
        // Arrange
        $password = 'password123';

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make($password),
        ]);

       // Act
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

         // Assert
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'token'
                 ]);

        $response->assertHeader('Content-Type', 'application/json');
        
        $this->assertIsString($response['token']);
    }
}

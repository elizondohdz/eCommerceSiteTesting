<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = '12345';

        User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make($password) // => Do not hash here cause Lavarel mutators will hash it later
        ]);
    }
}

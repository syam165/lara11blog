<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the user seeds.
     */

    public function run(): void
    {
        User::create([
            'name' => 'Arebos',
            'username' => 'arebos',
            'email' => 'arebos@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' =>Str::random(10)
        ]);
    
        User::factory(5)->create();
        
    }
}

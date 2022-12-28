<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
                'id' =>2,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('guestguest'),
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>1,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('guestguest'),
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>3,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('guestguest'),
                'remember_token' => Str::random(10),
            ],
            [
                'id' =>4,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => Hash::make('guestguest'), // password
             
            ],
             
           ];
        
        
           foreach($users as $user)
             
                   User::create(
                    $user
                    
                );
                
        
    }
}

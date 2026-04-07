<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'email'    => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role'     => fake()->randomElement([
                              'Admin','Sales','Purchasing','Warehouse','Route'
                          ]),
            'active'   => fake()->boolean(80), // 80% chance of being active
        ];
    }
}
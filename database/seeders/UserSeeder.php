<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Guaranteed Admin account for testing
        User::create([
            'name'     => 'Admin Halcon',
            'email'    => 'admin@halcon.com',
            'password' => Hash::make('password'),
            'role'     => 'Admin',
            'active'   => true,
        ]);

        // One user per role for testing
        $roles = ['Sales', 'Purchasing', 'Warehouse', 'Route'];
        foreach ($roles as $role) {
            User::create([
                'name'     => $role . ' User',
                'email'    => strtolower($role) . '@halcon.com',
                'password' => Hash::make('password'),
                'role'     => $role,
                'active'   => true,
            ]);
        }

        // 10 random additional users
        User::factory(10)->create();
    }
}
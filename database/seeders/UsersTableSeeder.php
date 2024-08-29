<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin users
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => 'Admin User ' . $i,
                'email' => 'admin' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('Admin');
        }

        // Wholesaler users
        for ($i = 1; $i <= 17; $i++) {
            $user = User::create([
                'name' => 'Wholesaler User ' . $i,
                'email' => 'wholesaler' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('Wholesaler');
        }

        //  Retailer users
        for ($i = 1; $i <= 33; $i++) {
            $user = User::create([
                'name' => 'Retailer User ' . $i,
                'email' => 'retailer' . $i . '@example.com',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole('Retailer');
        }

    }
}

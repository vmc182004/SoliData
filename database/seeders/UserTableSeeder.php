<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'cliente_id' => 1,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Val',
            'email' => 'val@example.com',
            'password' => Hash::make('123'),
            'cliente_id' => 1,
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

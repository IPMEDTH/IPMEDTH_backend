<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create(
            [
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => Hash::make('testtest'),
                'remember_token' => null,
                'email_verified_at' => null,
            ]
        );
    }
}

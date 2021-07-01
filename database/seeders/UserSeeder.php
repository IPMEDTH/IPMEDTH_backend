<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::factory(1)->create(
            [
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => Hash::make('testtest'),
                'image_url' => 'https://picsum.photos/200/200',
                'knowledge' => 'Lasersnijder, 3D Printer',
                'available' => 'Elke week',
                'remember_token' => null,
                'email_verified_at' => null,
            ]
        );

        User::factory()->count(10)->create();
    }
}

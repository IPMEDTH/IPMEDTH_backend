<?php

namespace Database\Seeders;

use App\Models\Location;
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

        Location::insert([
            'name' => '3D Printer',
            'description' => 'Dit is een mooie 3D Printer',
            'amount' => 2,
            'image_url' => 'https://picsum.photos/200/300'
        ]);
      
        Location::insert([
            'name' => 'Lasersnijder',
            'description' => 'Dit is een mooie lasersnijder',
            'amount' => 1,
            'image_url' => 'https://api.ipmedth.meulen.dev/1.jpeg'
        ]);

        $this->call(MaterialSeeder::class);
    }
}

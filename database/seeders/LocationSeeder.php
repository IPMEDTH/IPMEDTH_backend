<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::insert([
            'name' => '3D Printer',
            'description' => 'Dit is een mooie 3D Printer',
            'amount' => 2,
            'image_url' => 'https://picsum.photos/200/200'
        ]);

        Location::insert([
            'name' => 'Lasersnijder',
            'description' => 'Dit is een mooie lasersnijder',
            'amount' => 1,
            'image_url' => 'https://api.ipmedth.meulen.dev/1.jpeg'
        ]);
    }
}

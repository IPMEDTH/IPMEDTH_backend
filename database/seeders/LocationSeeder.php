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
            'description' => '2 Ultimaker 3D printers',
            'amount' => 2,
            'image_url' => 'https://api.ipmedth.meulen.dev/1.jpeg'
        ]);

        Location::insert([
            'name' => 'Lasersnijder',
            'description' => 'Een lasersnijder in een aparte ruimte',
            'amount' => 1,
            'image_url' => 'https://api.ipmedth.meulen.dev/lasersnijder.jpg'
        ]);

        Location::insert([
            'name' => 'Houtbewerkingslokaal',
            'description' => 'Een plek om te werken in het houtbewerkingslokaal',
            'amount' => 10,
            'image_url' => 'https://api.ipmedth.meulen.dev/houtbewerking.jpeg'
        ]);

        Location::insert([
            'name' => 'Werkplek',
            'description' => 'Een werkplek om aan te werken, zonder apparaten',
            'amount' => 30,
            'image_url' => 'https://api.ipmedth.meulen.dev/werkplek.jpg'
        ]);
    }
}

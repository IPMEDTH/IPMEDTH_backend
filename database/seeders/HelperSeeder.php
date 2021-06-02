<?php

namespace Database\Seeders;

use App\Models\Helper;
use Illuminate\Database\Seeder;

class HelperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Helper::insert([
            'location_id' => 1,
            'user_id' => 1,
        ]);

        Helper::insert([
            'location_id' => 1,
            'user_id' => 2,
        ]);
    }
}

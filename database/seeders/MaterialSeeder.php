<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::factory()->count(10)->create();
    }
}

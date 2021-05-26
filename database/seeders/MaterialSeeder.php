<?php

namespace Database\Seeders;

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
      DB::table('material')->insert([
        'name' => 'Test Material',
        'description' => 'This material is meant for Testing',
        'amount' => 5,
        'unit' => 'Liter',
        'added_by' => 'Jordan Mains',
        'img_url' => 'https://picsum.photos/id/1058/4608/3072',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]);
    }
}

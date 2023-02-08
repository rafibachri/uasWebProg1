<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VegetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vegetables')->insert([
            'name' => 'Carrot',
            'price' => 20000,
            'description' => 'carrot weawdkasdas ',
            'image' => 'itemicon.png',
        ]);

        DB::table('vegetables')->insert([
            'name' => 'Vegetable 2',
            'price' => 20000,
            'description' => 'carrot weawdkasdas ',
            'image' => 'itemicon.png',
        ]);
        DB::table('vegetables')->insert([
            'name' => 'Vegetable 3',
            'price' => 20000,
            'description' => 'carrot weawdkasdas ',
            'image' => 'itemicon.png',
        ]);

        DB::table('vegetables')->insert([
            'name' => 'Vegetable 4',
            'price' => 20000,
            'description' => 'carrot weawdkasdas ',
            'image' => 'itemicon.png',
        ]);
    }
}

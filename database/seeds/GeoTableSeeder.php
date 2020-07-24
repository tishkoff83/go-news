<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
            [
                'iso' => 'RU'
            ],
            [
                'iso' => 'BY'
            ],
            [
                'iso' => 'UA'
            ],
            [
                'iso' => 'KZ'
            ],
            [
                'iso' => 'MD'
            ],
        ]);
    }
}

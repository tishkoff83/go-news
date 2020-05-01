<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'title' => 'Общество',
                'slug' => 'obshhestvo',
            ],
            [
                'title' => 'Шоу-бизнес',
                'slug' => 'shoubiznes',
            ],
            [
                'title' => 'Экономика',
                'slug' => 'jekonomika',
            ],
            [
                'title' => 'Интересное',
                'slug' => 'interesnoe',
            ],
            [
                'title' => 'События',
                'slug' => 'sobytija',
            ],
            [
                'title' => 'Здоровье',
                'slug' => 'zdorove',
            ],
            [
                'title' => 'Наука',
                'slug' => 'nauka',
            ],
            [
                'title' => 'Происшествия',
                'slug' => 'proisshestvija',
            ],
        ]);
    }
}

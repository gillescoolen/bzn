<?php

use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipality')->insert([
            [
                'name' => 'Horst',
                'long' => 6.0303174,
                'lat' => 51.4232255,
                'imgpath' => 'horst.png',
                'hexcolor' => '#fd9644'
            ],
            [
                'name' => 'Weert',
                'long' => 5.70694,
                'lat' => 51.25167,
                'imgpath' => 'weert.png',
                'hexcolor' => '#2d98da'
            ],
            [
                'name' => 'Tilburg',
                'long' => 5.0913,
                'lat' => 51.55551,
                'imgpath' => 'tilburg.png',
                'hexcolor' => '#26de81'
            ],
            [
                'name' => 'Den Haag',
                'long' => 4.28823,
                'lat' => 52.07248,
                'imgpath' => 'denhaag.png',
                'hexcolor' => '#f7b731'
            ]
        ]);
    }
}

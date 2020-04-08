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
                'lat' => 51.4232255
            ],
            [
                'name' => 'Weert',
                'long' => 5.70694,
                'lat' => 51.25167
            ],
            [
                'name' => 'Tilburg',
                'long' => 5.0913,
                'lat' => 51.55551
            ],
            [
                'name' => '\'s-Hertogenbosch',
                'long' => 5.30417,
                'lat' => 51.69917
            ]
        ]);
    }
}

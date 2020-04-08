<?php

use Illuminate\Database\Seeder;

class LegendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('legend')->insert([
            [
                'label' => 'Snelweg',
                'color' => '#E892A2'
            ],
            [
                'label' => 'Normale weg',
                'color' => '#FFFFFF'
            ],
            [
                'label' => 'Water',
                'color' => '#ABD3DF'
            ],
            [
                'label' => 'Groengebied',
                'color' => '#CDEBB0'
            ],
            [
                'label' => 'Bebouwd',
                'color' => '#D9D0C9'
            ],
        ]);        
    }
}
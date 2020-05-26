<?php


use Illuminate\Database\Seeder;

class MeasureSeeder extends Seeder
{
    public function run() {
        DB::table('measure_types')->insert([
            [
                'measure_type' => 'Landgebonden'
            ],
            [
                'measure_type' => 'Advies'
            ],
            [
                'measure_type' => 'Watergebonden'
            ],
            [
                'measure_type' => 'Natuurinclusief bouwen'
            ],
        ]);

        DB::table('measures')->insert([
            [
                'name' => 'Meer groen in de buurt',
                'description' => 'Meer groen in de buurt rond ziekenhuis, scholen etc.',
                'measure_type_id' => 1,
            ],
            [
                'name' => 'Het doorbreken van een monocultuur',
                'description' => 'Het doorbreken van een monocultuur',
                'measure_type_id' => 2
            ],
            [
                'name' => 'Beekloop herstellen',
                'description' => 'Beekloop herstellen',
                'measure_type_id' => 3
            ],
            [
                'name' => 'Aanleg waterdaken',
                'description' => 'Aanleg waterdaken',
                'measure_type_id' => 4
            ],
        ]);

        DB::table('measures_guide_type')->insert([
            [
                'measures_id' => 1,
                'guide_type_id' => 1
            ],
            [
                'measures_id' => 1,
                'guide_type_id' => 2
            ],
            [
                'measures_id' => 1,
                'guide_type_id' => 3
            ],
        ]);
    }
}

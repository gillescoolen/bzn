<?php


use Illuminate\Database\Seeder;

class StatementSeeder extends Seeder
{
    public function run() {
        DB::table('statements')->insert([
            [
                'name' => 'Straatvuil verminderen',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat er minder sprake is van straatvuil.'
            ],
            [
                'name' => 'Verlagen hittestress',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat er minder sprake is van hittestress.'
            ],
            [
                'name' => 'Verminderen bestrating',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat er minder sprake is van bestrating.'
            ],
            [
                'name' => 'Biodiversiteit verhogen',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat er meer sprake is van biodiversiteit.'
            ],
            [
                'name' => 'Meer ruimte voor groen',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat er meer ruimte is voor groen.'
            ],
            [
                'name' => 'Ruimtes multifunctioneel inrichten',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat ruimtes multifunctioneel ingericht worden.'
            ],
            [
                'name' => 'Gezondheid burgers waarborgen',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat de gezondheid van burgers gewaarborgd wordt.'
            ],
            [
                'name' => 'Jeugd meer naar buiten laten gaan',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat de jeugd meer naar buiten gaat.'
            ],
            [
                'name' => 'Jeugd gezonder krijgen',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat de jeugd gezonder wordt.'
            ],
            [
                'name' => 'Verminderen eikenprocessierups problematiek',
                'description' => 'Ten voordele van de natuur is het voor ons van belang dat de eikenprocessierupsproblematiek verminderd wordt.'
            ],
        ]);

        DB::table('statements_measures')->insert([
            [
                'statement_id' => 1,
                'measure_id' => 1
            ],
            [
                'statement_id' => 2,
                'measure_id' => 1
            ],
            [
                'statement_id' => 3,
                'measure_id' => 2
            ],
            [
                'statement_id' => 4,
                'measure_id' => 2
            ],
            [
                'statement_id' => 5,
                'measure_id' => 2
            ],
            [
                'statement_id' => 6,
                'measure_id' => 3
            ],
            [
                'statement_id' => 7,
                'measure_id' => 3
            ]
            ,
            [
                'statement_id' => 8,
                'measure_id' => 4
            ]
            ,
            [
                'statement_id' => 9,
                'measure_id' => 4
            ]
            ,
            [
                'statement_id' => 10,
                'measure_id' => 4
            ]
        ]);
    }
}

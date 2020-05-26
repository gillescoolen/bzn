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
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Verminderen bestrating',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Biodiversiteit verhogen',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Meer ruimte voor groen',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Ruimtes multifunctioneel inrichten',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Gezondheid burgers waarborgen',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Jeugd meer naar buiten laten gaan',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Jeugd gezonder krijgen',
                'description' => 'Placeholder 1'
            ],
            [
                'name' => 'Verminderen eikenprocessierups problematiek',
                'description' => 'Placeholder 1'
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
                'measure_id' => 1
            ],
            [
                'statement_id' => 4,
                'measure_id' => 1
            ],
            [
                'statement_id' => 5,
                'measure_id' => 1
            ],
        ]);
    }
}

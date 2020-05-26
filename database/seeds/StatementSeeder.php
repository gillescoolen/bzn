<?php


use Illuminate\Database\Seeder;

class StatementSeeder extends Seeder
{
    public function run() {
        DB::table('statements')->insert([
            [
                'name' => 'Straatvuil verminderen'
            ],
            [
                'name' => 'Verlagen hittestress'
            ],
            [
                'name' => 'Verminderen bestrating'
            ],
            [
                'name' => 'Biodiversiteit verhogen'
            ],
            [
                'name' => 'Meer ruimte voor groen'
            ],
            [
                'name' => 'Ruimtes multifunctioneel inrichten'
            ],
            [
                'name' => 'Gezondheid burgers waarborgen'
            ],
            [
                'name' => 'Jeugd meer naar buiten laten gaan'
            ],
            [
                'name' => 'Jeugd gezonder krijgen'
            ],
            [
                'name' => 'Verminderen eikenprocessierups problematiek'
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

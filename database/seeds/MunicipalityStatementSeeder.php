<?php

use Illuminate\Database\Seeder;

class MunicipalityStatementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statements_municipality')->insert([
            [
                'statement_id' => 1,
                'municipality_id' => 1
            ],
            [
                'statement_id' => 2,
                'municipality_id' => 1
            ],
            [
                'statement_id' => 3,
                'municipality_id' => 1
            ],
            [
                'statement_id' => 4,
                'municipality_id' => 2
            ],
            [
                'statement_id' => 5,
                'municipality_id' => 2
            ],
            [
                'statement_id' => 6,
                'municipality_id' => 3
            ],
            [
                'statement_id' => 7,
                'municipality_id' => 3
            ],
            [
                'statement_id' => 8,
                'municipality_id' => 4
            ],
            [
                'statement_id' => 9,
                'municipality_id' => 4
            ],
            [
                'statement_id' => 10,
                'municipality_id' => 4
            ]
        ]);
    }
}

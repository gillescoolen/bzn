<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer')->insert([
            [
                'answer' => 'Konijnen',
                'question_id' => 1,
                'layer' => 'Alle_insecten_soortenrijkdom'
            ],
            [
                'answer' => 'Koeien',
                'question_id' => 1,
                'layer' => 'Alle_insecten_std'
            ],
            [
                'answer' => 'Kippen',
                'question_id' => 1,
                'layer' => 'Amfibieen_std'
            ],
            [
                'answer' => 'Honden',
                'question_id' => 1,
                'layer' => 'Dagvlinders_std'
            ],
            [
                'answer' => 'Bevers',
                'question_id' => 1,
                'layer' => 'Frag03_gewone_dwergvleermuis'
            ],
            [
                'answer' => 'Blauwe kaas',
                'question_id' => 2,
                'layer' => 'Frag09_gewone_dwergvleermuis'
            ],
            [
                'answer' => 'Jong belegen',
                'question_id' => 2,
                'layer' => 'Geleedpotigen_excl_insecten_std'
            ],
            [
                'answer' => 'Amerikaanse eiken',
                'question_id' => 3,
                'layer' => 'Gewone_dwergvleermuis_Stressfactoren'
            ],
            [
                'answer' => 'Dennenbomen',
                'question_id' => 3,
                'layer' => 'Habitat_gewone_dwergvleermuis'
            ],
            [
                'answer' => 'Wilgen',
                'question_id' => 3,
                'layer' => 'Libellen_std'
            ],
        ]);
    }
}

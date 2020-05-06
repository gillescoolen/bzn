<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert([
            [
                'question' => 'Welk dier vind je belangrijk?',
            ],
            [
                'question' => 'Welke kaas vind je goed bij de regio passen?'
            ],
            [
                'question' => 'Welke soort bomen vind je mooi?'
            ],
        ]);
    }
}

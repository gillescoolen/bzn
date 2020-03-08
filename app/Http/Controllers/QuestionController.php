<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {

        $answers = [
            new Answer([
                'id' => 1,
                'answer' => 'Konijnen',
                'question_id' => 1
            ]),
            new Answer([
                'id' => 2,
                'answer' => 'Koeien',
                'question_id' => 1
            ]),
            new Answer([
                'id' => 3,
                'answer' => 'Kippen',
                'question_id' => 1
            ]),
            new Answer([
                'id' => 4,
                'answer' => 'Honden',
                'question_id' => 1
            ]),
            new Answer([
                'id' => 5,
                'answer' => 'Bevers',
                'question_id' => 1
            ]),

            new Answer([
                'id' => 6,
                'answer' => 'Blauwe kaas',
                'question_id' => 2
            ]),
            new Answer([
                'id' => 7,
                'answer' => 'Jong belegen',
                'question_id' => 2
            ]),

            new Answer([
                'id' => 8,
                'answer' => 'Amerikaanse eiken',
                'question_id' => 3
            ]),
            new Answer([
                'id' => 9,
                'answer' => 'Dennenbomen',
                'question_id' => 3
            ]),
            new Answer([
                'id' => 10,
                'answer' => 'Wilgen',
                'question_id' => 3
            ])
        ];

        $questionTitleIndex = 1;
        $questions = [
            new Question([
                'id' => 1,
                'question' => 'Welk dier vind je belangrijk?'
            ]),
            new Question([
                'id' => 2,
                'question' => 'Welke kaas vind je goed bij de regio passen?'
            ]),
            new Question([
                'id' => 3,
                'question' => 'Welke soort bomen vind je mooi?'
            ])
        ];

        foreach($questions as $q) {
            $q->title = 'Vraag ' . $questionTitleIndex++;
            $q->answers = $this->filterAnswers($answers, $q->id);
        }

        return response()->json($questions);
    }

    private function filterAnswers($answers, $questionId) {
        $matches = [];
        foreach($answers as $a) {
            if($a['question_id'] == $questionId) {
                $matches[] = $a;
            }
        }
        return $matches;
    }
}

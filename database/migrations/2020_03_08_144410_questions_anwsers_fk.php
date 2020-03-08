<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionsAnwsersFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer', function($table) {
            $table->unsignedBigInteger('question_id');
        });

        Schema::table('answer', function($table) {
            $table->foreign('question_id')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer', function($table) {
            $table->dropForeign(['question_id']);
        });

        Schema::table('answer', function($table) {
            $table->dropColumn('question_id');
        });
    }
}

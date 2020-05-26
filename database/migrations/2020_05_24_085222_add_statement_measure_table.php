<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatementMeasureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements_measures', function(Blueprint $table) {
            $table->unsignedInteger('statement_id');
            $table->unsignedInteger('measure_id');
        });

        Schema::table('statements_measures', function(Blueprint $table) {
            $table->foreign('statement_id')->references('id')->on('statements');
            $table->foreign('measure_id')->references('id')->on('measures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements_measures');
    }
}

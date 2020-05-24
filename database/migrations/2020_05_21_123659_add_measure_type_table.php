<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeasureTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('measure_type');
        });

        Schema::table('measures', function (Blueprint $table) {
            $table->foreign('measure_type_id')->references('id')->on('measure_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measure_type');
    }
}

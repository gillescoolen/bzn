<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeasureMeasureGuideTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measures_guide_type', function (Blueprint $table) {
            $table->unsignedInteger('measures_id');
            $table->unsignedInteger('guide_type_id');
            $table->foreign('measures_id')->references('id')->on('measures');
            $table->foreign('guide_type_id')->references('id')->on('guide_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measures_guide_type');
    }
}

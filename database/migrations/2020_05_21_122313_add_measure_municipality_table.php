<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeasureMunicipalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measures_municipality', function (Blueprint $table) {
            $table->unsignedInteger('measures_id');
            $table->unsignedInteger('municipality_id');
            $table->foreign('measures_id')->references('id')->on('measures');
            $table->foreign('municipality_id')->references('id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measures_municipality');
    }
}

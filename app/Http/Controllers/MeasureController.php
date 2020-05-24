<?php


namespace App\Http\Controllers;


use App\Http\Resources\MeasureResource;
use App\Measure;

class MeasureController extends Controller
{
    public function allMeasures() {
        $measures = MeasureResource::collection(Measure::all());
        return $measures;
    }
}

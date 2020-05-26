<?php


namespace App\Http\Controllers;


use App\Http\Resources\MeasureResource;
use App\Measure;

class MeasureController extends Controller
{
    public function getMeasure(Measure $measure) {
        return MeasureResource::make($measure);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Legend;
use App\Http\Resources\LegendResource;

class LegendController extends Controller
{
    public function index() 
    {
        $legend = Legend::all();

        return LegendResource::collection($legend);
    }
}

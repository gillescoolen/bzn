<?php

namespace App\Http\Controllers;

use App\GuideType;
use App\Http\Resources\GuideTypeResource;
use Illuminate\Http\Request;

class GuideTypeController extends Controller
{
    public function index()
    {
        $guidetypes = GuideType::all();

        return GuideTypeResource::collection($guidetypes);
    }
}

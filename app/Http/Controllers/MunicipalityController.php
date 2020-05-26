<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;
use App\Http\Resources\MunicipalityResource;

class MunicipalityController extends Controller
{
    public function index()
    {
        $municipalities = Municipality::all();

        return MunicipalityResource::collection($municipalities);
    }
}

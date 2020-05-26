<?php

namespace App\Http\Controllers;

use App\Partner;

class PartnerController extends Controller
{
    public function index() {
        $allPartners = Partner::all();
        return response()->json($allPartners, 200);
    }
}

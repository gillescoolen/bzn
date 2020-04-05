<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function current(Request $request)
    {
        return Auth::user();
    }
}

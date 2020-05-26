<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TextBlock;
use App\Http\Resources\TextBlockResource;

class TextBlockController extends Controller
{
    public function index(Request $request) {
        $keys = $request->query('keys');
        if (!$keys) {
            return response("No 'keys' query specified", 400);
        }

        $textBlocks = TextBlock::whereIn('key', $keys)->get();
        return TextBlockResource::collection($textBlocks);
    }
}

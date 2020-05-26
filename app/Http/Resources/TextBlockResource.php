<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TextBlockResource extends JsonResource 
{
    public function toArray($request)
    {
        return [
            'key' => $this->key,
            'content' => $this->content
        ];
    }
}
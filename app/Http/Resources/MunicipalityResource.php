<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MunicipalityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'longitude' => $this->long,
            'latitude' => $this->lat,
            'imgpath' => $this->imgpath,
            'hexcolor' => $this->hexcolor,
            'statements' => $this->statements
        ];
    }
}

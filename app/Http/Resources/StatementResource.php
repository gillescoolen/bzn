<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class StatementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'measure_ids' => $this->getMeasureIds()
        ];
    }

    private function getMeasureIds () {
        $ids = [];

        foreach ($this->measures as $measure) {
            array_push($ids, $measure->id);
        }

        return $ids;
    }
}

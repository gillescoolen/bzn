<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideType extends Model
{
    protected $table = 'guide_types';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'layer_name',
    ];

    public function measures() {
        return $this->belongsToMany(Measure::class, 'measures_guide_type', 'guide_type_id', 'measures_id');
    }
}

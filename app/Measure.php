<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $table = 'measures';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'measure_type',
    ];

    public function guidetypes() {
        return $this->belongsToMany(GuideType::class, 'measures_guide_type', 'measures_id', 'guide_type_id');
    }

    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class, 'measures_municipality', 'measures_id', 'municipality_id');
    }

    public function measuretype() {
        return $this->hasOne(MeasureType::class, 'measure_type');
    }
}

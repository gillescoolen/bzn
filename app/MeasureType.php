<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasureType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'measure_type';

    public function measures() {
        return $this->belongsTo(Measure::class, 'measure_type', 'measure_type');
    }
}

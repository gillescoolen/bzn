<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'municipality';

    public function users() {
        return $this->hasMany(User::class, 'municipality_id', 'id');
    }

    public function measures() {
        return $this->belongsToMany(Measure::class, 'measures_municipality', 'municipality_id', 'measures_id');
    }
}

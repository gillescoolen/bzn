<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $table = 'statements';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function measures() {
        return $this->belongsToMany(Measure::class, 'statements_measures', 'statement_id', 'measure_id');
    }

    public function municipalities()
    {
        return $this->belongsToMany(Municipality::class, 'statements_municipality', 'statement_id', 'municipality_id');
    }
}

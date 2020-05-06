<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    protected $table = 'layers';
    protected $primaryKey = 'name';
    protected $keyType = 'string';
    public $incrementing = false;

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}

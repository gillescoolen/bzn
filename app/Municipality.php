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

    public function statements() {
        return $this->belongsToMany(Statement::class, 'statements_municipality', 'municipality_id', 'statement_id');
    }
}

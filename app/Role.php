<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ability;

class Role extends Model
{
    public function abilities() {
        return $this->belongsToMany(Ability::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}

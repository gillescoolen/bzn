<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function abilities() {
        return $this->roles->map->abilities->flatten()->pluck('ability')->unique();
    }

    public function assignRole($role) {

        if (is_string($role)) {
            $role = Role::all()->where('name', $role)->firstOrFail();
        }

        $this->roles()->sync($role, false);
    }

    public function hasRole($role) {
        if (is_string($role)) {
            $roleOut = $this->roles()->where('name', $role)->first();
        } else {
            $roleOut = $this->roles()->find($role)->first();
        }

        if($roleOut) {
            return true;
        }
        return false;
    }
}

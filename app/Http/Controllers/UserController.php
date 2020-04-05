<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    public function current($id) 
    {   
        return User::find($id);
    }

    public function unapproved() 
    {
        $users = User::where('approved', '=', '0')->get();
        
        return UserResource::collection($users);
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->update(['approved' => 1]);
        dd($user);
    }
}

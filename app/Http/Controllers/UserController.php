<?php

namespace App\Http\Controllers;

use App\Municipality;
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

    public function unapproved()
    {
        $users = User::where('approved', '=', '0')->get();

        return UserResource::collection($users);
    }

    public function approved()
    {
        $users = User::where('approved', '=', '1')->get();

        return UserResource::collection($users);
    }

    public function approve($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Er is geen gebruiker gevonden met dit id...'
            ], 400);
        }

        $username = $user->name;
        $user->update(['approved' => 1]);

        return response()->json([
            'success' => true,
            'error' => sprintf('Gebruiker "%s" is succesvol geaccepteerd!', $username)
        ], 200);
    }

    public function decline($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Er is geen gebruiker gevonden met deze gebruikersnaam...'
            ], 400);
        }
        $username = $user->name;

        $destroy = User::destroy($user_id);
        if ($destroy) {
            return response()->json([
                'success' => true,
                'message' => sprintf('Gebruiker "%s" is geweigerd', $username)
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'error' => sprintf('Er ging iets mis bij het weigeren van "%s"...', $username)
            ], 500);
        }
    }

    public function addMunicipality($id, $municipality_id)
    {
        if (!$id || !$municipality_id) {
            return response()->json([
                'success' => false,
                'error' => 'De gebruiker of gemeente kon niet worden gevonden'
            ], 404);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Er bestaat geen gebruiker met dit id...'
            ], 400);
        }

        $municipality = Municipality::find($municipality_id);
        if (!$municipality) {
            return response()->json([
                'success' => false,
                'error' => 'Er bestaat geen gemeente met dit id...'
            ], 400);
        }

        $user->municipality_id = $municipality_id;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Gemeente is toegevoegd aan de gebruiker'
        ], 200);
    }
}

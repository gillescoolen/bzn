<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController extends Controller
{
    use SendsPasswordResetEmails, ResetsPasswords {
        SendsPasswordResetEmails::broker insteadof ResetsPasswords;
        ResetsPasswords::credentials insteadof SendsPasswordResetEmails;
    }
    /**
     * Verify user credentials and return an access token.
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) return response()->json(['message' => 'De ingevoerde gegevens kloppen niet. Probeer het opnieuw.'], 401);

        $token = $request->user()->createToken('Personal Access Token');

        return response()->json(['token' => $token->plainTextToken]);
    }

    /**
     * Register a new user and return an access token.
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $token = $user->createToken('Personal Access Token');

            return response()->json(['token' => $token->plainTextToken]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Er is iets misgegaan.']);
        }
    }

    /**
     * Get the current user data.
     *
     * @param Request $request
     * @return void
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Revoke the user tokens.
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $request->user() && $request->user()->tokens()->delete();
        Session::flush();

        return response()->json(['message' => 'Succesvol uitgelogd.']);
    }

    /**
     * Send password reset link.
     *
     * @param Request $request
     * @return void
     */
    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return response()->json([
            'message' => 'Email is verstuurd.',
            'data' => $response
        ]);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse($response)
    {
        return response()->json(['message' => 'Er kan geen email naar dit adres verstuurd worden.']);
    }

    /**
     * Reset the users password.
     *
     * @param Request $request
     * @return void
     */
    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();

        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        return response()->json(['message' => 'Wachtwoord is opnieuw ingesteld.']);
    }
}

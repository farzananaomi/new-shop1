<?php

namespace App\Http\Controllers;

use \App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postLogin(LoginRequest $request)
    {
        if (auth('web')->attempt($request->only('name', 'password'))) {
            return redirect()->intended(route('invoices.index'));
        }

        return redirect()->route('auth.login')->withErrors([
            'login' => 'The credentials you entered did not match our records. Try again...',
        ]);
    }

    public function getLogout()
    {
        auth('web')->logout();

        return redirect()->route('auth.login');
    }
}

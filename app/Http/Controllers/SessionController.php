<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:6',
        ]);

        if (! Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'password' => 'The provided credentials do not match our records.',
            ]);

            // return back()->withErrors([
            //     'password' => 'The provided credentials do not match our records.',
            // ]);
        };

        $request->session()->regenerate();

        return redirect()->route('jobs.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|min:3|string', 
           'email' => 'required|max:255|email|unique:users',
           'password' => 'required|confirmed|min:6',
           'employer' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->employer()->create([
            'name' => $request->employer,
        ]);

        Auth::login($user);

        return to_route('jobs.index');
    }
}

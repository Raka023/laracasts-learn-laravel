<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
           'email' => 'required|email|unique:users',
           'password' => 'required|confirmed|min:6',
        ]);

        dd($request->all());
    }
}

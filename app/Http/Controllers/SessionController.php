<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6',
        ]);

        dd($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(LoginRequest $request)
    {
        dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('stories.index');
        } else {
            return redirect()->back()->with('status', 'saicmmn');
        }
    }
}

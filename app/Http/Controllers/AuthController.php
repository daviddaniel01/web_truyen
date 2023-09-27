<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

            if (!Hash::check($request->get('password'), $user->password)) {
                throw new Exception('Sai mật khẩu');
            }

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);
            session()->put('birthday', $user->birthday);
            session()->put('status', $user->status);
            session()->put('gender', $user->gender);
            return redirect()->route('stories.index');
        } catch (Throwable $e) {
            return redirect()->route('login')->with('status', 'sai cmnr');
        }



        // $user = User::query()
        //     ->where('email', $request->get('email'))
        //     ->firstOrFail();
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     session()->put('level', $user->level);
        //     return redirect()->route('stories.index');
        // }
        // return redirect()->route('login');
    }


    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        try {
            User::create([
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'password' => Hash::make($request->get('password')),
                'gender' => $request->get('gender'),
                'birthday' => $request->get('birthday'),
                'level' => 2,
                'status' => 0,
            ]);
        } catch (Throwable $e) {
            dd($e);
        }
        return redirect()->route('login');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}

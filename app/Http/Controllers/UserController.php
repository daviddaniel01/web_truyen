<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\DestroyRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName); // tách chuỗi
        $arr = array_map('ucfirst', $arr); // viết hoa chữ cái đầu
        $title = implode(' - ', $arr); //nối mảng
        $arrUserStatus = UserStatusEnum::getArrayView();
        $arrUserLevel = UserLevelEnum::getArrayView();
        View::share('arrUserStatus', $arrUserStatus);
        View::share('arrUserLevel', $arrUserLevel);
        View::share('title', $title);
    }

    public function index()
    {
        $data = User::get();
        return view('user.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(CreateRequest $request)
    {
        // $request
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $arr = $request->validated();
        $arr['avatar'] = $path;
        $arr['password'] = Hash::make($request->password);
        User::create($arr);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('user.edit', ['each' => $user]);
    }


    public function update(UpdateRequest $request, $userId)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $arr = $request->validated();
        $arr['avatar'] = $path;
        $arr['password'] = Hash::make($request->password);


        $user = User::findOrFail($userId);
        $user->update($arr);

        return redirect()->route('users.index');
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return redirect()->route('users.index');
    }
}

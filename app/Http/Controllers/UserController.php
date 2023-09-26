<?php

namespace App\Http\Controllers;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\DestroyRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->model = (new User())->query();
        $routeName = Route::currentRouteName();
        $arrUserStatus = UserStatusEnum::getArrayView();
        $arrUserLevel = UserLevelEnum::getArrayView();
        View::share('arrUserStatus', $arrUserStatus);
        View::share('arrUserLevel', $arrUserLevel);
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
        User::create($request->validated());
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('user.edit', ['each' => $user]);
    }


    public function update(UpdateRequest $request, $userId)
    {
        $object = $this->model->find($userId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('users.index');
    }

    public function destroy(DestroyRequest $request, $user)
    {
        User::destroy($user);
        return redirect()->route('users.index');
    }
}

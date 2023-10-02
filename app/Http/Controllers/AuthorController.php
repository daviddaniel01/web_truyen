<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\CreateRequest;
use App\Http\Requests\Author\DestroyRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class AuthorController extends Controller
{
    public function __construct()
    {
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName); // tách chuỗi
        $arr = array_map('ucfirst', $arr); // viết hoa chữ cái đầu
        $title = implode(' - ', $arr); //nối mảng
        View::share('title', $title);
    }

    public function index()
    {
        $data = Author::get();
        return view('author.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(CreateRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('authors.index');
    }

    public function edit(Author $author)
    {
        return view('author.edit', ['each' => $author]);
    }


    public function update(UpdateRequest $request, $authorId)
    {
        $author = Author::findOrFail($authorId);
        $arr = $request->validated();
        $author->update($arr);

        return redirect()->route('authors.index');
    }

    public function destroy($author)
    {
        Author::destroy($author);
        return redirect()->route('authors.index');
    }
}

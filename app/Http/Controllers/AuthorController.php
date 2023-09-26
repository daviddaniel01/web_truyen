<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\CreateRequest;
use App\Http\Requests\Author\DestroyRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->model = (new Author())->query();
        $routeName = Route::currentRouteName();
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
        $object = $this->model->find($authorId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('authors.index');
    }

    public function destroy(DestroyRequest $request, $author)
    {
        Author::destroy($author);
        return redirect()->route('authors.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\DestroyRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->model = (new Category())->query();
        $routeName = Route::currentRouteName();
    }

    public function index()
    {
        $data = Category::get();
        return view('category.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CreateRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['each' => $category]);
    }


    public function update(UpdateRequest $request, $authorId)
    {
        $object = $this->model->find($authorId);
        $object->fill($request->validated());
        $object->save();

        return redirect()->route('categories.index');
    }

    public function destroy(DestroyRequest $request, $category)
    {
        Category::destroy($category);
        return redirect()->route('categories.index');
    }
}

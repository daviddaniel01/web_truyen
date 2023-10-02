<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\DestroyRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
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


    public function update(UpdateRequest $request, $categoryId)
    {

        $category = Category::findOrFail($categoryId);
        $arr = $request->validated();
        $category->update($arr);

        return redirect()->route('categories.index');
    }

    public function destroy($category)
    {
        Category::destroy($category);
        return redirect()->route('categories.index');
    }
}

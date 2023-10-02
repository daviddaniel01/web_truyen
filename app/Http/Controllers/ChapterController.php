<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chapter\CreateRequest;
use App\Http\Requests\Chapter\DestroyRequest;
use App\Http\Requests\Chapter\UpdateRequest;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ChapterController extends Controller
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
        $data = Chapter::get();
        return view('chapter.index', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        $sotries = Story::get();
        return view('chapter.create', [
            'stories' => $sotries,
        ]);
    }

    public function store(CreateRequest $request)
    {
        Chapter::create($request->validated());
        return redirect()->route('chapters.index');
    }

    public function edit(Chapter $chapter)
    {
        return view('chapter.edit', ['each' => $chapter]);
    }


    public function update(UpdateRequest $request, $chapterId)
    {
        $chapter = Chapter::findOrFail($chapterId);
        $arr = $request->validated();
        $chapter->update($arr);

        return redirect()->route('chapters.index');
    }

    public function destroy($chapter)
    {
        Chapter::destroy($chapter);
        return redirect()->route('chapters.index');
    }
}

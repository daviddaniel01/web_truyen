<?php

namespace App\Http\Controllers;

use App\Http\Requests\Story\CreateRequest;
use App\Http\Requests\Story\DestroyRequest;
use App\Http\Requests\Story\UpdateRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->model = (new Story())->query();
        $routeName = Route::currentRouteName();
    }

    public function index()
    {
        $data = Story::with('categories')->get();
        // $category_story = DB::table('story_category');
        // $categories = Category::get();
        return view('story.index', [
            'data' => $data,
            // 'categories' => $categories,
            // 'category_story' =>$category_story,
        ]);
    }

    public function create()
    {
        $authors = Author::get();
        $categories = Category::get();
        return view('story.create', [
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    public function store(CreateRequest $request)
    {
        Story::create($request->validated());
        $story = Story::find(DB::table('stories')->latest('id')->first()->id);
        $categories = $request->input('categories');
        $story->categories()->attach($categories);

        return redirect()->route('stories.index');
    }

    public function edit(Story $story)
    {
        $authors = Author::get();
        $categories = Category::get();
        $category_story = DB::table('story_category')->where('story_id', $story->id)->pluck('category_id')->all();
        return view('story.edit', [
            'each' => $story,
            'categories' => $categories,
            'authors' => $authors,
            'category_story' => $category_story,
        ]);
    }


    public function update(UpdateRequest $request, $storyId)
    {
        $object = $this->model->find($storyId);
        $object->fill($request->validated());
        $categories = $request->input('categories');
        $object->categories()->sync($categories);
        $object->save();

        return redirect()->route('stories.index');
    }


    public function showChapters(Story $story)
    {
        $chapters = Chapter::where('id', $story->id)->get();
        return view('story.show', [
            'chapters' => $chapters,
        ]);
    }

    public function destroy(DestroyRequest $request, $story)
    {
        Story::destroy($story);
        return redirect()->route('stories.index');
    }
}

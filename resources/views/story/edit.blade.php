@extends('layout.master')
@section('content')
    <form action="{{ route('stories.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        Tên truyện
        <input type="text" name="title" value="{{ $each->title }}">
        @if ($errors->has('title'))
            <span class="error">
                {{ $errors->first('title') }}
            </span>
        @endif
        <br>

        Tác giả
        <select name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}" {{ $author->id == $each->author_id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('author_id'))
            <span class="error">
                {{ $errors->first('author_id') }}
            </span>
        @endif
        <br>

        Thể loại
        @foreach ($categories as $category)
            @if (in_array($category->id, $category_story))
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" checked>
                <label>{{ $category->name }}</label><br>
            @else
                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                <label>{{ $category->name }}</label><br>
            @endif
        @endforeach


        <button>Update</button>



    </form>
@endsection

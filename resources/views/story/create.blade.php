@extends('layout.master')
@section('content')
    <form action="{{ route('stories.store') }}" method="post">
        @csrf
        Tên truyện
        <input type="text" name="title">
        @if ($errors->has('title'))
            <span class="error">
                {{ $errors->first('title') }}
            </span>
        @endif
        <br>

        Tác giả
        <select name="author_id">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
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
            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            <label>{{ $category->name }}</label><br>
        @endforeach
        <button>Create</button>
    </form>
@endsection

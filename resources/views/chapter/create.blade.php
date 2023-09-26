@extends('layout.master')
@section('content')
    <form action="{{ route('chapters.store') }}" method="post">
        @csrf
        Title
        <input type="text" name="title" value="{{ old('title') }}">
        @if ($errors->has('title'))
            <span class="error">
                {{ $errors->first('title') }}
            </span>
        @endif
        <br>


        Nội dung
        <textarea name="content" value="{{ old('content') }}">   
        </textarea>
        @if ($errors->has('content'))
            <span class="error">
                {{ $errors->first('content') }}
            </span>
        @endif
        <br>

        Truyện
        <select name="story_id">
            @foreach ($stories as $story)
                <option value="{{ $story->id }}">{{ $story->title }}</option>
            @endforeach
        </select>
        @if ($errors->has('story_id'))
            <span class="error">
                {{ $errors->first('story_id') }}
            </span>
        @endif
        <br>


        <button>Create</button>
    </form>
@endsection

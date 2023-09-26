@extends('layout.master')
@section('content')
    <form action="{{ route('authors.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>

        Bí danh
        <input type="text" name="alias">
        @if ($errors->has('alias'))
            <span class="error">
                {{ $errors->first('alias') }}
            </span>
        @endif
        <br>

        Birthday
        <input type="date" name="birthday">
        @if ($errors->has('birthday'))
            <span class="error">
                {{ $errors->first('birthday') }}
            </span>
        @endif
        <br>

        Gender
        <input type="radio" name="gender" value="0" checked>Nam
        <input type="radio" name="gender" value="1">Nữ
        @if ($errors->has('gender'))
            <span class="error">
                {{ $errors->first('gender') }}
            </span>
        @endif
        <br>

        <button>Create</button>
    </form>
@endsection

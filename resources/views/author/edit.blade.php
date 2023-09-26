@extends('layout.master')
@section('content')
    <form action="{{ route('authors.update', $each) }}" method="post">
        @csrf
        @method('PUT')

        
        Name
        <input type="text" name="name" value="{{ $each->name }}">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>


        Bí danh
        <input type="text" name="alias" value="{{ $each->alias }}">
        @if ($errors->has('alias'))
            <span class="error">
                {{ $errors->first('alias') }}
            </span>
        @endif
        <br>

        Birthday
        <input type="date" name="birthday" value="{{ $each->birthday }}">
        @if ($errors->has('birthday'))
            <span class="error">
                {{ $errors->first('birthday') }}
            </span>
        @endif
        <br>

        Gender
        <input type="radio" name="gender" value="0" {{ $each->gender == 0 ? 'checked' : '' }}>Nam
        <input type="radio" name="gender" value="1" {{ $each->gender == 1 ? 'checked' : '' }}>Nữ
        @if ($errors->has('gender'))
            <span class="error">
                {{ $errors->first('gender') }}
            </span>
        @endif
        <br>

        <button>Update</button>
    </form>
@endsection

@extends('layout.master')
@section('content')
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>


        <button>Create</button>
    </form>
@endsection

@extends('layout.master')
@section('content')
    <form action="{{ route('categories.update', $each) }}" method="post">
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

        <button>Update</button>
    </form>
@endsection

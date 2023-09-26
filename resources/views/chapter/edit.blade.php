@extends('layout.master')
@section('content')
    <form action="{{ route('chapters.update', $each) }}" method="post">
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

        Giảng viên
        <select name="teacher_id">
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ $teacher->id == $each->teacher_id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif

        <br>

        <button>Update</button>
    </form>
@endsection

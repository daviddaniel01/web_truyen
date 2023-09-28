@extends('layout.master')
@section('content')
    <form action="{{ route('users.update', $each) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        Name
        <input type="text" name="name" value={{ $each->name }}>
        @if ($errors->has('name'))
            <span class="error">
                {{ $errors->first('name') }}
            </span>
        @endif
        <br>

        Email
        <input type="text" name="email" value={{ $each->email }}>
        @if ($errors->has('email'))
            <span class="error">
                {{ $errors->first('email') }}
            </span>
        @endif
        <br>

        Password
        <input type="password" name="password" value={{ $each->password }}>
        @if ($errors->has('password'))
            <span class="error">
                {{ $errors->first('password') }}
            </span>
        @endif
        <br>

        Birthday
        <input type="date" name="birthday" value={{ $each->birthday }}>
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

        Status
        <br>
        @foreach ($arrUserStatus as $option => $value)
            <input type="radio" name="status" value="{{ $value }}"
                @if ($each->status == $option) checked @endif>{{ $option }}
        @endforeach
        @if ($errors->has('status'))
            <span class="error">
                {{ $errors->first('status') }}
            </span>
        @endif
        <br>

        Level
        <br>
        @foreach ($arrUserLevel as $option => $value)
            <input type="radio" name="level" value="{{ $value }}"
                @if ($each->level == $option) checked @endif>{{ $option }}
        @endforeach
        @if ($errors->has('level'))
            <span class="error">
                {{ $errors->first('level') }}
            </span>
        @endif
        <br>


        Avatar
        <input type="file" name="avatar" value="{{ $each->avatar }}">
        <br>

        <button>Update</button>
    </form>
@endsection

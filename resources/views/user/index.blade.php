@extends('layout.master')
@section('content')
    <a href="{{ route('users.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tuổi</th>
            <th>Giới tính</th>
            <th>Tình trạng</th>
            <th>Vai trò</th>
            <th>Ảnh</th>
            <th>Hoạt động</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>{{ $each->email }}</td>
                <td>{{ $each->age }}</td>
                <td>{{ $each->gender_name }}</td>
                <td>{{ $each->status }}</td>
                <td>{{ $each->level }}</td>
                <td><img src="storage/{{ $each->avatar }}"></td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('users.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('users.destroy', $each) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@extends('layout.master')
@section('content')
    <a href="{{ route('authors.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Bí danh</th>
            <th>Tuổi</th>
            <th>Giới tính</th>
            <th>Edit</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>{{ $each->alias }}</td>
                <td>{{ $each->age }}</td>
                <td>{{ $each->gender_name }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('authors.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('authors.destroy', $each) }}" method="post">
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

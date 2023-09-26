@extends('layout.master')
@section('content')
    <a href="{{ route('categories.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên thể loại</th>
            <th>Edit</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('categories.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $each) }}" method="post">
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

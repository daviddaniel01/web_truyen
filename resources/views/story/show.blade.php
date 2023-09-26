@extends('layout.master')
@section('content')
    <a href="{{ route('chapters.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Edit</th>
        </tr>
        
        @foreach ($chapters as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->title }}</td>
                <td>{{ $each->content }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('chapters.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('chapters.destroy', $each) }}" method="post">
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

@extends('layout.master')
@section('content')
    <a href="{{ route('stories.create') }}">Thêm</a>
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Tên truyện</th>
            <th>Tác giả</th>
            <th>Thể loại</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->title }}</td>
                <td>{{ $each->author->name }}</td>
                <td>
                    @foreach ($each->categories as $category)
                        {{ $category->name }}
                        <br>
                    @endforeach
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('stories.showchapters', $each) }}">
                            Danh sách chapter
                        </a>
                        <a class="btn btn-primary" href="{{ route('stories.edit', $each) }}">
                            Edit
                        </a>
                        <form action="{{ route('stories.destroy', $each) }}" method="post">
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

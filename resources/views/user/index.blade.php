@extends('layout.master')
@push('css')
    <link
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.0/fc-4.2.2/fh-3.3.2/r-2.4.1/rg-1.3.1/sc-2.1.1/sb-1.4.2/sl-1.6.2/datatables.min.css"
        rel="stylesheet" />
@endpush
@section('content')
    <a class="btn btn-outline-success" href="{{ route('users.create') }}">Thêm</a>
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

@push('js')
<script src="cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" ></script>
@endpush
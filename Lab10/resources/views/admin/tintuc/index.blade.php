@extends('admin.layout')

@section('title', 'Quản lý bài viết')

@section('content')
<h1>Quản lý bài viết</h1>
<a href="{{ route('admin.tintuc.create') }}" class="btn btn-primary mb-3">Thêm bài viết</a>
<form method="get" class="mb-3 d-flex" style="max-width:400px">
    <input type="text" name="q" class="form-control me-2" placeholder="Tìm theo tiêu đề..." value="{{ request('q') }}">
    <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Danh mục</th>
            <th>Ngày đăng</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsTin ?? [] as $tin)
        <tr>
            <td>{{ $tin->id }}</td>
            <td>{{ $tin->tieude }}</td>
            <td>{{ $tin->danhMuc->ten_danh_muc ?? '' }}</td>
            <td>{{ \Carbon\Carbon::parse($tin->ngaydang)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('admin.tintuc.show', $tin->id) }}" class="btn btn-info btn-sm">Xem</a>
                <a href="{{ route('admin.tintuc.edit', $tin->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('admin.tintuc.destroy', $tin->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $dsTin->links() }}
</div>
@endsection

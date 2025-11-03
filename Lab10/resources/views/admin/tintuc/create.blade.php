@extends('admin.layout')

@section('title', 'Thêm bài viết')

@section('content')
<h1>Thêm bài viết</h1>
<form action="{{ route('admin.tintuc.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input type="text" name="tieude" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="danh_muc_id" class="form-select" required>
            <option value="">-- Chọn danh mục --</option>
            @foreach($danhMucs as $dm)
                <option value="{{ $dm->id }}">{{ $dm->ten_danh_muc }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Tóm tắt</label>
        <textarea name="tomtat" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea name="noidung" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Ngày đăng</label>
        <input type="date" name="ngaydang" class="form-control" value="{{ date('Y-m-d') }}">
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.tintuc.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection

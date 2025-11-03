@extends('admin.layout')

@section('title', 'Chi tiết bài viết')

@section('content')
<h1>Chi tiết bài viết</h1>
<div class="mb-3">
    <strong>Tiêu đề:</strong> {{ $tin->tieude }}
</div>
<div class="mb-3">
    <strong>Danh mục:</strong> {{ $tin->danhMuc->ten_danh_muc ?? '' }}
</div>
<div class="mb-3">
    <strong>Tóm tắt:</strong> {{ $tin->tomtat }}
</div>
<div class="mb-3">
    <strong>Nội dung:</strong> {{ $tin->noidung }}
</div>
<div class="mb-3">
    <strong>Ngày đăng:</strong> {{ $tin->ngaydang }}
</div>
<a href="{{ route('admin.tintuc.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection

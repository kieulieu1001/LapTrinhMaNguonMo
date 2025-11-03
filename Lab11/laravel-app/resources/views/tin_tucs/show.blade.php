@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ $tin->tieu_de }}</h2>
    <div class="mb-2">
        <strong>Slug:</strong> {{ $tin->slug }}
    </div>
    <div class="mb-2">
        <strong>Trạng thái:</strong> {{ $tin->trang_thai == 'published' ? 'Đã đăng' : 'Nháp' }}
    </div>
    <div class="mb-2">
        <strong>Ngày đăng:</strong> {{ $tin->ngaydang }}
    </div>
    <div class="mb-2">
        <strong>Nội dung:</strong>
        <div>{{ $tin->noi_dung }}</div>
    </div>
    <a href="{{ route('tin_tucs.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection

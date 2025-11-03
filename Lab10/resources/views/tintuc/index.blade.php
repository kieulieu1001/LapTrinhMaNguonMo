@extends('layout')

@section('title', $danhMucHienTai ? $danhMucHienTai->ten_danh_muc : 'Danh sách tin tức')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">
        @if($danhMucHienTai)
            {{ $danhMucHienTai->ten_danh_muc }}
        @else
            Danh sách tin tức
        @endif
    </h1>
    
    <div class="dropdown">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-funnel"></i> Lọc danh mục
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item {{ !request('danh_muc') ? 'active' : '' }}" 
                   href="{{ route('tin.index') }}">Tất cả</a></li>
            <li><hr class="dropdown-divider"></li>
            @foreach($danhMucs as $dm)
            <li>
                <a class="dropdown-item {{ request('danh_muc') == $dm->id ? 'active' : '' }}" 
                   href="{{ route('tin.index', ['danh_muc' => $dm->id]) }}">
                    {{ $dm->ten_danh_muc }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@if($danhMucHienTai && $danhMucHienTai->mo_ta)
<div class="alert alert-info">
    <strong>Mô tả:</strong> {{ $danhMucHienTai->mo_ta }}
</div>
@endif

@if($dsTin->isEmpty())
    <div class="alert alert-warning">Chưa có bài viết trong danh mục này.</div>
@else
    <div class="row g-4">
        @foreach($dsTin as $tin)
        <div class="col-md-6 col-lg-4">
            <x-news.card :tin="$tin" />
        </div>
        @endforeach
    </div>
    
    <div class="mt-4 d-flex justify-content-center">
        {{ $dsTin->links() }}
    </div>
@endif
@endsection
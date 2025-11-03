@extends('layout')

@section('title', $tin->tieude)

@section('content')
<article class="row">
    <div class="col-lg-10 mx-auto">
        <header class="mb-3">
            @if($tin->danhMuc)
            <a href="{{ route('tin.index', ['danh_muc' => $tin->danhMuc->id]) }}" 
               class="badge bg-primary text-decoration-none mb-2">
                {{ $tin->danhMuc->ten_danh_muc }}
            </a>
            @endif
            
            <h1 class="h2">{{ $tin->tieude }}</h1>
            <div class="text-muted small">
                Ngày đăng: {{ \Illuminate\Support\Carbon::parse($tin->ngaydang)->format('d/m/Y') }}
            </div>
        </header>
        
        @if($tin->hinhanh)
        <img src="{{ asset('images/news/' . $tin->hinhanh) }}" 
             class="img-fluid rounded mb-3" 
             alt="{{ $tin->tieude }}">
        @endif
        
        <div class="fs-5 lh-lg">
            {!! nl2br(e($tin->noidung)) !!}
        </div>
        
        <hr class="my-4">
        
        <div class="d-flex gap-2">
            <a href="{{ route('tin.index') }}" class="btn btn-secondary">
                ← Quay lại danh sách
            </a>
            @if($tin->danhMuc)
            <a href="{{ route('tin.index', ['danh_muc' => $tin->danhMuc->id]) }}" 
               class="btn btn-outline-primary">
                Xem thêm {{ $tin->danhMuc->ten_danh_muc }}
            </a>
            @endif
        </div>
    </div>
</article>
@endsection
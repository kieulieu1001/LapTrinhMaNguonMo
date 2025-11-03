@extends('admin.layout')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
<!-- Stats Cards -->
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Tổng tin tức</h6>
                        <h2 class="mb-0">{{ $tongTinTuc }}</h2>
                    </div>
                    <div class="fs-1 text-success">
                        <i class="bi bi-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Tổng danh mục</h6>
                        <h2 class="mb-0">{{ $tongDanhMuc }}</h2>
                    </div>
                    <div class="fs-1 text-warning">
                        <i class="bi bi-folder"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Tin hôm nay</h6>
                        <h2 class="mb-0">{{ $tinMoiNhat->count() }}</h2>
                    </div>
                    <div class="fs-1 text-primary">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Lượt xem</h6>
                        <h2 class="mb-0">0</h2>
                    </div>
                    <div class="fs-1 text-danger">
                        <i class="bi bi-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Posts -->
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Tin tức mới nhất</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Ngày đăng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tinMoiNhat as $tin)
                    <tr>
                        <td>{{ $tin->id }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($tin->tieude, 50) }}</td>
                        <td>
                            @if($tin->danhMuc)
                            <span class="badge bg-primary">{{ $tin->danhMuc->ten_danh_muc }}</span>
                            @endif
                        </td>
                        <td>{{ \Illuminate\Support\Carbon::parse($tin->ngaydang)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.tintuc.show', $tin->id) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.tintuc.edit', $tin->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Chưa có tin tức</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
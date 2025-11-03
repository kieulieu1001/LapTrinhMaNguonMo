@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Danh sách tin tức</h2>
    <form method="GET" action="{{ route('tin_tucs.index') }}" class="row g-3 mb-3 align-items-end">
        <div class="col-auto">
            <input type="text" name="kw" class="form-control" placeholder="Từ khóa tiêu đề" value="{{ request('kw') }}">
        </div>
        <div class="col-auto">
            <select name="danhmuc_id" class="form-select">
                <option value="">Tất cả danh mục</option>
                @if(isset($danhmucs))
                    @foreach($danhmucs as $dm)
                        <option value="{{ $dm->id }}" {{ request('danhmuc_id') == $dm->id ? 'selected' : '' }}>{{ $dm->ten }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-auto">
            <select name="trang_thai" class="form-select">
                <option value="">Tất cả trạng thái</option>
                <option value="draft" {{ request('trang_thai') == 'draft' ? 'selected' : '' }}>Nháp</option>
                <option value="published" {{ request('trang_thai') == 'published' ? 'selected' : '' }}>Đã đăng</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="date" name="from" class="form-control" placeholder="Từ ngày" value="{{ request('from') }}">
        </div>
        <div class="col-auto">
            <input type="date" name="to" class="form-control" placeholder="Đến ngày" value="{{ request('to') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-secondary">Lọc</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('tin_tucs.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Slug</th>
                <th>Trạng thái</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tinTucs as $tinTuc)
            <tr>
                <td>{{ $tinTuc->id }}</td>
                <td>
                    <a href="{{ route('tin.show', $tinTuc->slug) }}">{{ $tinTuc->tieu_de }}</a>
                </td>
                <td>{{ $tinTuc->slug }}</td>
                <td>
                    @if($tinTuc->trang_thai == 'published')
                        <span class="badge bg-success">Đã đăng</span>
                    @else
                        <span class="badge bg-secondary">Nháp</span>
                    @endif
                </td>
                <td>
                    @if($tinTuc->trang_thai == 'published')
                        {{ $tinTuc->ngaydang }}
                    @else
                        <!-- Không hiển thị ngày đăng nếu là nháp -->
                    @endif
                </td>
                <td>
                    <a href="{{ route('tin_tucs.edit', $tinTuc->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

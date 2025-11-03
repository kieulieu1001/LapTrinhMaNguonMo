@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tạo mới tin tức</h2>
    <form action="{{ route('tin_tucs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="{{ old('tieu_de') }}" required>
        </div>
        <div class="mb-3">
            <label for="noi_dung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="noi_dung" name="noi_dung" rows="4" required>{{ old('noi_dung') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option value="draft" {{ old('trang_thai') == 'draft' ? 'selected' : '' }}>Nháp</option>
                <option value="published" {{ old('trang_thai') == 'published' ? 'selected' : '' }}>Đã đăng</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gallery" class="form-label">Hình ảnh (có thể chọn nhiều)</label>
            <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection

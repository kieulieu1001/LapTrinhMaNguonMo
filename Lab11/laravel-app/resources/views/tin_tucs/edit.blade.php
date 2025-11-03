@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Cập nhật tin tức</h2>
    <form action="{{ route('tin_tucs.update', $tinTuc->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="tieu_de" name="tieu_de" value="{{ old('tieu_de', $tinTuc->tieu_de) }}" required>
        </div>
        <div class="mb-3">
            <label for="noi_dung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="noi_dung" name="noi_dung" rows="4" required>{{ old('noi_dung', $tinTuc->noi_dung) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option value="draft" {{ old('trang_thai', $tinTuc->trang_thai) == 'draft' ? 'selected' : '' }}>Nháp</option>
                <option value="published" {{ old('trang_thai', $tinTuc->trang_thai) == 'published' ? 'selected' : '' }}>Đã đăng</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gallery" class="form-label">Hình ảnh (có thể chọn nhiều)</label>
            <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*">
        </div>
        @if($tinTuc->hinhAnhs && $tinTuc->hinhAnhs->count())
        <div class="mb-3">
            <label class="form-label">Thư viện ảnh hiện có:</label>
            <div class="row">
                @foreach($tinTuc->hinhAnhs as $img)
                <div class="col-3 mb-2 text-center">
                    <img src="{{ asset('storage/' . $img->duongdan) }}" class="img-thumbnail" style="max-width:100%;height:120px;object-fit:cover;">
                    <form action="{{ route('hinh_anh_tin_tuc.destroy', $img->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-1" onclick="return confirm('Xóa ảnh này?')">Xóa ảnh</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection

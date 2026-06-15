@extends('layouts.admin')

@section('title', 'Chỉnh sửa em nhỏ')
@section('pageHeader', 'Chỉnh sửa em nhỏ')
@section('pageSubheader', 'Cập nhật hồ sơ và trạng thái em nhỏ')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Chỉnh sửa em nhỏ</h3>
            <p class="text-muted mb-0">Cập nhật hồ sơ và trạng thái em nhỏ.</p>
        </div>
        <a href="{{ route('admin.children.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.children.update', $child) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tên em</label>
                    <input type="text" name="name" value="{{ old('name', $child->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Giới tính</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="">Chọn</option>
                            <option value="male" {{ old('gender', $child->gender) === 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('gender', $child->gender) === 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ old('gender', $child->gender) === 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                        @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" name="dob" value="{{ old('dob', $child->dob?->format('Y-m-d')) }}" class="form-control @error('dob') is-invalid @enderror">
                        @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status', $child->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="archived" {{ old('status', $child->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                            <option value="sponsored" {{ old('status', $child->status) === 'sponsored' ? 'selected' : '' }}>Sponsored</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Ảnh đại diện (URL)</label>
                    <input type="url" name="photo" value="{{ old('photo', $child->photo) }}" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tiểu sử</label>
                    <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $child->bio) }}</textarea>
                    @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Tạo em nhỏ')
@section('pageHeader', 'Tạo em nhỏ')
@section('pageSubheader', 'Thêm hồ sơ em nhỏ vào hệ thống')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Tạo em nhỏ</h3>
            <p class="text-muted mb-0">Thêm hồ sơ em nhỏ vào hệ thống quản trị.</p>
        </div>
        <a href="{{ route('admin.children.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.children.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Tên em</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Giới tính</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="">Chọn</option>
                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                        @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror">
                        @error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                            <option value="sponsored" {{ old('status') === 'sponsored' ? 'selected' : '' }}>Sponsored</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Ảnh đại diện (URL)</label>
                    <input type="url" name="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tiểu sử</label>
                    <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                    @error('bio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-success">Lưu em nhỏ</button>
            </form>
        </div>
    </div>
@endsection
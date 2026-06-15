@extends('layouts.admin')

@section('title', 'Chỉnh sửa chiến dịch')
@section('pageHeader', 'Chỉnh sửa chiến dịch')
@section('pageSubheader', 'Cập nhật nội dung và trạng thái chiến dịch')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Chỉnh sửa chiến dịch</h3>
            <p class="text-muted mb-0">Cập nhật nội dung và trạng thái chiến dịch.</p>
        </div>
        <a href="{{ route('admin.campaigns.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.campaigns.update', $campaign) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="title" value="{{ old('title', $campaign->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $campaign->slug) }}" class="form-control @error('slug') is-invalid @enderror">
                    @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $campaign->description) }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Mục tiêu (VND)</label>
                        <input type="number" name="target_amount" value="{{ old('target_amount', $campaign->target_amount) }}" class="form-control @error('target_amount') is-invalid @enderror" min="0">
                        @error('target_amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ngày bắt đầu</label>
                        <input type="date" name="start_at" value="{{ old('start_at', $campaign->start_at?->format('Y-m-d')) }}" class="form-control @error('start_at') is-invalid @enderror">
                        @error('start_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ngày kết thúc</label>
                        <input type="date" name="end_at" value="{{ old('end_at', $campaign->end_at?->format('Y-m-d')) }}" class="form-control @error('end_at') is-invalid @enderror">
                        @error('end_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Trạng thái</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="draft" {{ old('status', $campaign->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $campaign->status) === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="closed" {{ old('status', $campaign->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection

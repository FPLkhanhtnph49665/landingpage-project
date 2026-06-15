@extends('layouts.admin')

@section('title', 'Hồ sơ em nhỏ')
@section('pageHeader', 'Hồ sơ em nhỏ')
@section('pageSubheader', 'Thông tin chi tiết và chiến dịch đang tham gia')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">{{ $child->name }}</h3>
            <p class="text-muted mb-0">Trạng thái: <strong>{{ ucfirst($child->status) }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.children.edit', $child) }}" class="btn btn-primary">Chỉnh sửa</a>
            <a href="{{ route('admin.children.index') }}" class="btn btn-outline-secondary">Quay lại</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <img src="{{ $child->photo ?? 'https://via.placeholder.com/800x600?text=No+Image' }}" class="card-img-top" alt="{{ $child->name }}">
                <div class="card-body">
                    <h5 class="card-title">Thông tin cơ bản</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            Trường học
                            <span>{{ $child->metadata['school'] ?? 'Chưa cập nhật' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Tuổi
                            <span>{{ optional($child->dob)->age ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Giới tính
                            <span>{{ $child->gender === 'female' ? 'Nữ' : ($child->gender === 'male' ? 'Nam' : 'Khác') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Địa chỉ
                            <span>{{ $child->metadata['location'] ?? 'Chưa cập nhật' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-3">Giới thiệu</h5>
                    <p class="text-muted mb-4">{{ $child->bio ?? 'Chưa có mô tả về hoàn cảnh.' }}</p>

                    <h5 class="card-title mb-3">Chiến dịch đang tham gia</h5>
                    @if($child->campaigns->isEmpty())
                        <p class="text-muted">Chưa liên kết chiến dịch.</p>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($child->campaigns as $campaign)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $campaign->title }}</strong>
                                        <div class="small text-muted">{{ ucfirst($campaign->status) }}</div>
                                    </div>
                                    <span class="badge bg-success">{{ number_format($campaign->target_amount, 0, ',', '.') }}đ</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

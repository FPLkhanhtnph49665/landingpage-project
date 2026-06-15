@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">{{ $child->name }}</h1>
            <p class="text-muted mb-0">Hồ sơ em nhỏ cần giúp đỡ</p>
        </div>
        <a href="{{ route('children.index') }}" class="btn btn-outline-secondary">Quay lại danh sách</a>
    </div>

    <div class="row gy-4">
        <div class="col-lg-5">
            <div class="card shadow-sm">
                <img src="{{ $child->photo ?? 'https://via.placeholder.com/800x600?text=No+Image' }}" class="card-img-top" alt="{{ $child->name }}">
                <div class="card-body">
                    <h5 class="card-title">Thông tin cơ bản</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Giới tính
                            <span>{{ $child->gender === 'female' ? 'Nữ' : 'Nam' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ngày sinh
                            <span>{{ $child->dob?->translatedFormat('d/m/Y') ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Trạng thái
                            <span class="badge bg-{{ $child->status === 'active' ? 'success' : 'secondary' }}">{{ ucfirst($child->status) }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="card-title">Chiến dịch liên quan</h5>
                    @if($child->campaigns->isEmpty())
                        <p class="text-muted mb-0">Em nhỏ hiện chưa tham gia chiến dịch nào.</p>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($child->campaigns as $campaign)
                                <a href="{{ route('campaigns.show', $campaign) }}" class="list-group-item list-group-item-action">
                                    {{ $campaign->title }}
                                    <span class="badge bg-success rounded-pill">{{ ucfirst($campaign->status) }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Giới thiệu về {{ $child->name }}</h5>
                    <p class="card-text">{{ $child->bio }}</p>

                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <h6 class="mb-2">Số lượt ủng hộ</h6>
                                <p class="h5 mb-0">{{ $child->donations->count() }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="border rounded-3 p-3 h-100 bg-light">
                                <h6 class="mb-2">Tổng hỗ trợ</h6>
                                <p class="h5 mb-0">{{ number_format($child->donations->sum('amount'), 0, ',', '.') }} VND</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="fw-semibold">Ghi chú</h5>
                        <p class="text-muted mb-0">{{ $child->metadata['notes'] ?? 'Không có ghi chú thêm.' }}</p>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('campaigns.index') }}" class="btn btn-success">Tham gia chiến dịch hỗ trợ em</a>
                        @if(auth()->check())
                            <a href="{{ route('campaigns.index') }}#donate" class="btn btn-outline-success">Ủng hộ ngay</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-success">Đăng nhập để ủng hộ</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

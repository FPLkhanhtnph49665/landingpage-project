@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">{{ $campaign->title }}</h1>
            <p class="text-muted mb-0">Chiến dịch đang diễn ra</p>
        </div>
        <a href="{{ route('campaigns.index') }}" class="btn btn-outline-secondary">Quay lại danh sách</a>
    </div>

    <div class="row gy-4">
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <img src="{{ $campaign->metadata['image'] ?? 'https://images.unsplash.com/photo-1488161628813-04466f872be2?auto=format&fit=crop&w=1200&q=80' }}" class="card-img-top" alt="{{ $campaign->title }}">
                <div class="card-body">
                    <h5 class="card-title">Mô tả chiến dịch</h5>
                    <p class="card-text">{{ $campaign->description }}</p>

                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <span class="text-uppercase small text-muted">Mục tiêu</span>
                                <p class="h5 mb-0">{{ number_format($campaign->target_amount, 0, ',', '.') }} VND</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <span class="text-uppercase small text-muted">Đã quyên góp</span>
                                <p class="h5 mb-0">{{ number_format($campaign->collected_amount, 0, ',', '.') }} VND</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <span class="text-uppercase small text-muted">Bắt đầu</span>
                                <p class="mb-0">{{ $campaign->start_at?->translatedFormat('d/m/Y') ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <span class="text-uppercase small text-muted">Kết thúc</span>
                                <p class="mb-0">{{ $campaign->end_at?->translatedFormat('d/m/Y') ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        @php
                            $progress = $campaign->target_amount > 0 ? min(100, round($campaign->collected_amount / $campaign->target_amount * 100)) : 0;
                        @endphp

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Tiến độ quyên góp</span>
                            <span class="fw-semibold">{{ $progress }}%</span>
                        </div>
                        <div class="progress" style="height: 14px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 flex-wrap">
                        <a href="{{ route('children.index') }}" class="btn btn-success">Xem các em nhỏ</a>
                        @if(auth()->check())
                            <a href="{{ route('campaigns.index') }}#donate" class="btn btn-outline-success">Ủng hộ ngay</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-success">Đăng nhập để ủng hộ</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Thông tin nhanh</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Trạng thái
                            <span class="badge bg-{{ $campaign->status === 'published' ? 'success' : ($campaign->status === 'closed' ? 'secondary' : 'warning') }}">{{ ucfirst($campaign->status) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Số em trong chiến dịch
                            <span>{{ $campaign->children->count() }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Lượt ủng hộ
                            <span>{{ $campaign->donations->count() }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Các em được hỗ trợ</h5>
                    @if($campaign->children->isEmpty())
                        <p class="text-muted mb-0">Chưa có trẻ em nào được gắn với chiến dịch.</p>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($campaign->children as $child)
                                <a href="{{ route('children.show', $child) }}" class="list-group-item list-group-item-action">
                                    {{ $child->name }}
                                    <span class="badge bg-success rounded-pill">{{ $child->gender === 'female' ? 'Nữ' : 'Nam' }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

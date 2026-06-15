@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Chiến dịch thiện nguyện</h1>
            <p class="text-muted mb-0">Tham gia những chiến dịch đang cần hỗ trợ ngay hôm nay.</p>
        </div>
    </div>

    <div class="row g-4">
        @foreach($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $campaign->title }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($campaign->description, 120) }}</p>
                        <p class="mb-2"><strong>Mục tiêu:</strong> {{ number_format($campaign->target_amount) }} VND</p>
                        <div class="mt-auto">
                            <a href="{{ route('campaigns.show', $campaign) }}" class="btn btn-success">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $campaigns->links() }}
    </div>
@endsection

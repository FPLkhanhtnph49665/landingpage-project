@extends('layouts.admin')

@section('title', 'Chi tiết ủng hộ')
@section('pageHeader', 'Chi tiết giao dịch ủng hộ')
@section('pageSubheader', 'Thông tin chi tiết và trạng thái giao dịch')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3>{{ $donation->user?->name ?? 'Người ủng hộ ẩn danh' }}</h3>
            <p class="text-muted mb-0">Mã giao dịch: {{ $donation->uuid }}</p>
        </div>
        <a href="{{ route('admin.donations.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Thông tin ủng hộ</h5>
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Tên người ủng hộ</dt>
                        <dd class="col-sm-8">{{ $donation->user?->name ?? 'Khách' }}</dd>

                        <dt class="col-sm-4 text-muted">Email</dt>
                        <dd class="col-sm-8">{{ $donation->user?->email ?? 'Không có' }}</dd>

                        <dt class="col-sm-4 text-muted">Chiến dịch</dt>
                        <dd class="col-sm-8">{{ $donation->campaign?->title ?? 'Không xác định' }}</dd>

                        <dt class="col-sm-4 text-muted">Em nhỏ</dt>
                        <dd class="col-sm-8">{{ $donation->child?->name ?? '-' }}</dd>

                        <dt class="col-sm-4 text-muted">Số tiền</dt>
                        <dd class="col-sm-8 fw-bold text-success">{{ number_format($donation->amount, 0, ',', '.') }} VND</dd>

                        <dt class="col-sm-4 text-muted">Trạng thái</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-{{ $donation->status === 'success' ? 'success' : ($donation->status === 'failed' ? 'danger' : 'warning') }}">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </dd>

                        <dt class="col-sm-4 text-muted">Cổng thanh toán</dt>
                        <dd class="col-sm-8">{{ $donation->gateway ?? 'Chưa xác định' }}</dd>

                        <dt class="col-sm-4 text-muted">Mã tham chiếu</dt>
                        <dd class="col-sm-8">{{ $donation->gateway_ref ?? 'Không có' }}</dd>

                        <dt class="col-sm-4 text-muted">Thời gian</dt>
                        <dd class="col-sm-8">{{ $donation->paid_at?->format('d/m/Y H:i') ?? $donation->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tóm tắt giao dịch</h5>
                    <p class="mb-2">Số tiền đã ghi nhận: <strong>{{ number_format($donation->amount, 0, ',', '.') }} VND</strong></p>
                    <p class="mb-2">Chiến dịch: <strong>{{ $donation->campaign?->title ?? 'Không xác định' }}</strong></p>
                    <p class="mb-2">Em nhỏ: <strong>{{ $donation->child?->name ?? '-' }}</strong></p>
                    <p class="mb-0 text-muted">Lời nhắn và metadata được quản lý bên hệ thống nếu cần mở rộng.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

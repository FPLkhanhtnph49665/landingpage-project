@extends('layouts.admin')

@section('title', 'Quản lý ủng hộ')
@section('pageHeader', 'Quản lý ủng hộ')
@section('pageSubheader', 'Danh sách giao dịch ủng hộ và thống kê chi tiết')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-success"><i class="fas fa-wallet"></i></span>
                        <small class="text-muted">Tổng giao dịch</small>
                    </div>
                    <h3 class="fw-bold">{{ number_format($totalTransactions ?? 0) }}</h3>
                    <p class="text-muted mb-0">Lượt ủng hộ đã ghi nhận</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-primary"><i class="fas fa-hand-holding-dollar"></i></span>
                        <small class="text-muted">Tổng tiền</small>
                    </div>
                    <h3 class="fw-bold">{{ number_format($totalAmount ?? 0, 0, ',', '.') }} VND</h3>
                    <p class="text-muted mb-0">Tổng số tiền giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-success"><i class="fas fa-check-circle"></i></span>
                        <small class="text-muted">Thành công</small>
                    </div>
                    <h3 class="fw-bold">{{ number_format($successCount ?? 0) }}</h3>
                    <p class="text-muted mb-0">Giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i></span>
                        <small class="text-muted">Thất bại</small>
                    </div>
                    <h3 class="fw-bold">{{ number_format($failedCount ?? 0) }}</h3>
                    <p class="text-muted mb-0">Giao dịch bị hủy/ lỗi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped datatable align-middle" id="donationTable">
                    <thead class="table-light">
                        <tr>
                            <th>STT</th>
                            <th>Người ủng hộ</th>
                            <th>Chiến dịch</th>
                            <th>Em nhỏ</th>
                            <th>Số tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $donation->user?->name ?? 'Khách' }}<br><small class="text-muted">{{ $donation->user?->email ?? 'Không có email' }}</small></td>
                                <td>{{ $donation->campaign?->title ?? 'Không xác định' }}</td>
                                <td>{{ $donation->child?->name ?? '-' }}</td>
                                <td class="fw-bold text-success">{{ number_format($donation->amount, 0, ',', '.') }} VND</td>
                                <td>
                                    <span class="badge bg-{{ $donation->status === 'success' ? 'success' : ($donation->status === 'failed' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($donation->status) }}
                                    </span>
                                </td>
                                <td>{{ $donation->paid_at?->format('d/m/Y H:i') ?? $donation->created_at->format('d/m/Y') }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.donations.show', $donation) }}" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                                    <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" data-swal-confirm="Xóa giao dịch ủng hộ này?">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $donations->links() }}
            </div>
        </div>
    </div>
@endsection

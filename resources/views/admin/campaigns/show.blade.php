@extends('layouts.admin')

@section('title', 'Chi tiết chiến dịch')
@section('pageHeader', 'Chi tiết chiến dịch')
@section('pageSubheader', 'Thông tin chiến dịch, truy vấn em nhỏ và ủng hộ')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">{{ $campaign->title }}</h3>
            <p class="text-muted mb-0">Chiến dịch: {{ ucfirst($campaign->status) }}</p>
        </div>
        <a href="{{ route('admin.campaigns.index') }}" class="btn btn-outline-secondary">Quay lại</a>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">Mô tả chiến dịch</h5>
                    <p class="text-muted">{{ $campaign->description ?? 'Chưa có mô tả chiến dịch.' }}</p>

                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-uppercase text-muted">Mục tiêu</small>
                                <div class="h4 fw-bold">{{ number_format($campaign->target_amount, 0, ',', '.') }} VND</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <small class="text-uppercase text-muted">Đã nhận</small>
                                <div class="h4 fw-bold text-success">{{ number_format($donationsTotal, 0, ',', '.') }} VND</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tiến độ quyên góp</span>
                            <strong>{{ round($progress) }}%</strong>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" style="width: {{ $progress }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mt-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Danh sách em nhỏ thuộc chiến dịch</h5>
                </div>
                <div class="card-body">
                    @if($campaign->children->isEmpty())
                        <p class="text-muted">Không có em nhỏ thuộc chiến dịch này.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Họ tên</th>
                                        <th>Tuổi</th>
                                        <th>Trường học</th>
                                        <th>Địa chỉ</th>
                                        <th>Hoàn cảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campaign->children as $child)
                                        <tr>
                                            <td>
                                                <img src="{{ $child->photo ?? 'https://via.placeholder.com/80?text=No+Image' }}" alt="{{ $child->name }}" class="rounded-circle" width="50" height="50">
                                            </td>
                                            <td>{{ $child->name }}</td>
                                            <td>{{ optional($child->dob)->age ?? '-' }}</td>
                                            <td>{{ $child->metadata['school'] ?? 'Chưa cập nhật' }}</td>
                                            <td>{{ $child->metadata['location'] ?? 'Chưa cập nhật' }}</td>
                                            <td>{{ Str::limit($child->bio ?? 'Chưa có thông tin', 80) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-3">Thông tin chi tiết</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Trạng thái
                            <span class="badge bg-primary">{{ ucfirst($campaign->status) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Bắt đầu
                            <span>{{ $campaign->start_at?->format('d/m/Y') ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kết thúc
                            <span>{{ $campaign->end_at?->format('d/m/Y') ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Số lượt ủng hộ
                            <span>{{ $donationsCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Còn thiếu
                            <span>{{ number_format(max(0, $campaign->target_amount - $donationsTotal), 0, ',', '.') }} VND</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm border-0 mt-4">
                <div class="card-body">
                    <a href="{{ route('admin.campaigns.edit', $campaign) }}" class="btn btn-primary w-100 mb-2">Sửa chiến dịch</a>
                    <form action="{{ route('admin.campaigns.destroy', $campaign) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100" data-swal-confirm="Xóa chiến dịch này khỏi hệ thống?">Xóa chiến dịch</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

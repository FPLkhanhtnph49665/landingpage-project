@extends('layouts.admin')

@section('title', 'Bảng điều khiển')
@section('pageHeader', 'Bảng điều khiển')
@section('pageSubheader', 'Tổng quan hệ thống quản trị Nuôi Em')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Tổng số em nhỏ</h6>
                            <h2 class="fw-bold">{{ $childrenCount }}</h2>
                        </div>
                        <div class="text-success fs-2"><i class="fas fa-child"></i></div>
                    </div>
                    <p class="text-muted mb-0">Số lượng em nhỏ đang được hỗ trợ và quản lý.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Tổng số chiến dịch</h6>
                            <h2 class="fw-bold">{{ $campaignsCount }}</h2>
                        </div>
                        <div class="text-primary fs-2"><i class="fas fa-bullhorn"></i></div>
                    </div>
                    <p class="text-muted mb-0">Chiến dịch đã và đang vận hành trong hệ thống.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Tổng lượt ủng hộ</h6>
                            <h2 class="fw-bold">{{ $donationsCount }}</h2>
                        </div>
                        <div class="text-warning fs-2"><i class="fas fa-hands-heart"></i></div>
                    </div>
                    <p class="text-muted mb-0">Tổng số lượt ủng hộ từ các nhà hảo tâm.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Tổng tiền quyên góp</h6>
                            <h2 class="fw-bold">{{ number_format($totalDonation, 0, ',', '.') }} VND</h2>
                        </div>
                        <div class="text-danger fs-2"><i class="fas fa-coins"></i></div>
                    </div>
                    <p class="text-muted mb-0">Tổng số tiền đã thu được từ các giao dịch thành công.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Nhà hảo tâm</h6>
                            <h2 class="fw-bold">{{ $donorsCount }}</h2>
                        </div>
                        <div class="text-info fs-2"><i class="fas fa-user-friends"></i></div>
                    </div>
                    <p class="text-muted mb-0">Số nhà hảo tâm đã tham gia đóng góp.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="text-uppercase text-muted mb-1">Tình nguyện viên</h6>
                            <h2 class="fw-bold">{{ $volunteersCount }}</h2>
                        </div>
                        <div class="text-secondary fs-2"><i class="fas fa-hands-helping"></i></div>
                    </div>
                    <p class="text-muted mb-0">Số tình nguyện viên có trong hệ thống.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Quyên góp theo tháng</h5>
                        <small class="text-muted">Biểu đồ dòng tiền hàng tháng.</small>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="monthlyDonationsChart" height="220"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Chiến dịch hàng đầu</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($topCampaigns as $campaign)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $campaign->title }}</strong>
                                    <div class="small text-muted">{{ number_format($campaign->total_received, 0, ',', '.') }} VND</div>
                                </div>
                                <span class="badge bg-success rounded-pill">Top</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Quyên góp theo năm</h5>
                </div>
                <div class="card-body">
                    <canvas id="yearlyDonationsChart" height="220"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Số em được hỗ trợ</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <h3 class="fw-bold">{{ $childrenSupported }}</h3>
                            <p class="text-muted mb-0">Số em nhỏ đã nhận sự hỗ trợ.</p>
                        </div>
                        <div class="fs-2 text-success"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ min(100, intval($childrenSupported * 2)) }}%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const monthlyData = @json($monthlyData->pluck('total')->map(fn($value) => floatval($value)));
            const monthlyLabels = @json($monthlyData->pluck('period'));
            const yearlyData = @json($yearlyData->pluck('total')->map(fn($value) => floatval($value)));
            const yearlyLabels = @json($yearlyData->pluck('period'));

            new Chart(document.getElementById('monthlyDonationsChart'), {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Quyên góp (VND)',
                        data: monthlyData,
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.15)',
                        fill: true,
                        tension: 0.3,
                        pointRadius: 4
                    }]
                },
                options: {
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            ticks: { callback: value => new Intl.NumberFormat('vi-VN').format(value) }
                        }
                    }
                }
            });

            new Chart(document.getElementById('yearlyDonationsChart'), {
                type: 'bar',
                data: {
                    labels: yearlyLabels,
                    datasets: [{
                        label: 'Quyên góp theo năm',
                        data: yearlyData,
                        backgroundColor: '#198754',
                        borderRadius: 8
                    }]
                },
                options: {
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            ticks: { callback: value => new Intl.NumberFormat('vi-VN').format(value) }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection

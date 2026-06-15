@extends('layouts.app')

@section('content')
    <section class="py-5 text-center bg-white rounded-4 shadow-sm">
        <div class="row align-items-center">
            <div class="col-lg-7 text-start">
                <h1 class="display-4 fw-bold">Nuôi Em - Chung tay vì trẻ em</h1>
                <p class="lead text-secondary">Hỗ trợ trẻ em khó khăn và lan tỏa yêu thương qua các chiến dịch nhân ái.</p>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('children.index') }}" class="btn btn-success btn-lg">Xem em nhỏ</a>
                    <a href="{{ route('campaigns.index') }}" class="btn btn-outline-success btn-lg">Xem chiến dịch</a>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80" class="img-fluid rounded-4 shadow" alt="Nuôi Em">
            </div>
        </div>
    </section>

    <section class="row mt-5 g-4">
        <div class="col-md-6">
            <div class="card border-success h-100">
                <div class="card-body text-center">
                    <h2 class="display-5 text-success">{{ $childrenCount }}</h2>
                    <p class="mb-0">Trẻ em cần hỗ trợ</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-success h-100">
                <div class="card-body text-center">
                    <h2 class="display-5 text-success">{{ $campaignsCount }}</h2>
                    <p class="mb-0">Chiến dịch đang hoạt động</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="fw-bold">Cách thức tham gia</h3>
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Chọn trẻ cần hỗ trợ</h5>
                                <p class="card-text">Xem hồ sơ các em và chọn em nhỏ bạn muốn đồng hành.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Chọn chiến dịch</h5>
                                <p class="card-text">Tham gia chiến dịch giáo dục, y tế hoặc cứu trợ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Gửi yêu thương</h5>
                                <p class="card-text">Ủng hộ bằng hiện kim hoặc bằng hiện vật để thay đổi cuộc sống.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
    <div class="py-5 text-center">
        <h1 class="display-5">Nuôi Em</h1>
        <p class="lead">Trang tiếng đủ trẻ em cần hỗ trợ và các chiến dịch thiện nguyện.</p>
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('children.index') }}" class="btn btn-primary">Xem trẻ em</a>
            <a href="{{ route('campaigns.index') }}" class="btn btn-outline-primary">Xem chiến dịch</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mb-3">
            <div class="card p-4 text-center">
                <h2>{{ $childrenCount }}</h2>
                <p>Trẻ em đang cần hỗ trợ</p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card p-4 text-center">
                <h2>{{ $campaignsCount }}</h2>
                <p>Chiến dịch hoạt động</p>
            </div>
        </div>
    </div>
@endsection

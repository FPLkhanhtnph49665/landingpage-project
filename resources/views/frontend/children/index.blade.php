@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Danh sách em nhỏ</h1>
            <p class="text-muted mb-0">Những em nhỏ đang cần sự đồng hành của bạn.</p>
        </div>
    </div>

    <div class="row g-4">
        @foreach($children as $child)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $child->photo ?? 'https://via.placeholder.com/400x250' }}" class="card-img-top" alt="{{ $child->name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $child->name }}</h5>
                        <p class="card-text text-muted">{{ Illuminate\Support\Str::limit($child->bio, 120) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('children.show', $child) }}" class="btn btn-success">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $children->links() }}
    </div>
@endsection

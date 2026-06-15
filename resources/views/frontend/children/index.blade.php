@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Children</h1>
    <div class="row">
        @foreach($children as $child)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $child->photo ?? 'https://via.placeholder.com/400x250' }}" class="card-img-top" alt="{{ $child->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $child->name }}</h5>
                        <p class="card-text">{{ \\Illuminate\\Support\\Str::limit($child->bio, 120) }}</p>
                        <a href="{{ route('children.show', $child) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $children->links() }}
@endsection

@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Campaigns</h1>
    <div class="row">
        @foreach($campaigns as $campaign)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $campaign->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($campaign->description, 120) }}</p>
                        <p class="mb-1"><strong>Target:</strong> {{ number_format($campaign->target_amount) }} VND</p>
                        <a href="{{ route('campaigns.show', $campaign) }}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $campaigns->links() }}
@endsection

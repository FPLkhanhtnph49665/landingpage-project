@extends('layouts.admin')

@section('title', 'Quản lý chiến dịch')
@section('pageHeader', 'Quản lý chiến dịch')
@section('pageSubheader', 'Danh sách chiến dịch, trạng thái và thao tác nhanh')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Quản lý chiến dịch</h3>
            <p class="text-muted mb-0">Xem, chỉnh sửa và tạo chiến dịch mới.</p>
        </div>
        <a href="{{ route('admin.campaigns.create') }}" class="btn btn-success">Tạo chiến dịch</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover datatable mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Slug</th>
                        <th>Trạng thái</th>
                        <th>Mục tiêu</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{ $campaign->id }}</td>
                            <td>{{ $campaign->title }}</td>
                            <td>{{ $campaign->slug }}</td>
                            <td>{{ ucfirst($campaign->status) }}</td>
                            <td>{{ number_format($campaign->target_amount, 0, ',', '.') }} VND</td>
                            <td>{{ $campaign->start_at?->format('d/m/Y') ?? '-' }}</td>
                            <td>{{ $campaign->end_at?->format('d/m/Y') ?? '-' }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('admin.campaigns.show', $campaign) }}" class="btn btn-sm btn-outline-primary">Xem</a>
                                <a href="{{ route('admin.campaigns.edit', $campaign) }}" class="btn btn-sm btn-primary">Sửa</a>
                                    <form action="{{ route('admin.campaigns.destroy', $campaign) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" data-swal-confirm="Xóa chiến dịch này?">Xóa</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $campaigns->links() }}
    </div>
@endsection

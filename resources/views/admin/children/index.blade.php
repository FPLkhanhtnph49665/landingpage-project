@extends('layouts.admin')

@section('title', 'Quản lý em nhỏ')
@section('pageHeader', 'Quản lý em nhỏ')
@section('pageSubheader', 'Danh sách em nhỏ, xóa mềm và khôi phục')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-1">Quản lý em nhỏ</h3>
            <p class="text-muted mb-0">Xem, chỉnh sửa và khôi phục hồ sơ em nhỏ.</p>
        </div>
        <a href="{{ route('admin.children.create') }}" class="btn btn-success">Thêm em nhỏ</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped datatable mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ảnh</th>
                            <th>Họ tên</th>
                            <th>Tuổi</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($children as $child)
                            <tr>
                                <td>{{ $child->id }}</td>
                                <td><img src="{{ $child->photo ?? 'https://via.placeholder.com/64?text=No+Img' }}" alt="{{ $child->name }}" class="rounded-circle" width="48" height="48"></td>
                                <td>
                                    <a href="{{ route('admin.children.show', $child) }}">{{ $child->name }}</a>
                                </td>
                                <td>{{ optional($child->dob)->age ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-{{ $child->trashed() ? 'secondary' : ($child->status === 'sponsored' ? 'success' : ($child->status === 'archived' ? 'warning' : 'primary')) }}">
                                        {{ $child->trashed() ? 'Đã xóa' : ucfirst($child->status) }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    @if($child->trashed())
                                        <form action="{{ route('admin.children.restore', $child->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success" data-swal-confirm="Khôi phục em nhỏ này?">Khôi phục</button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.children.edit', $child) }}" class="btn btn-sm btn-primary">Sửa</a>
                                        <form action="{{ route('admin.children.destroy', $child) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" data-swal-confirm="Xóa mềm em nhỏ này?">Xóa</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $children->links() }}
    </div>
@endsection

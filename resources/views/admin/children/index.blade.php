@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Admin - Children</h1>
    <a href="{{ route('admin.children.create') }}" class="btn btn-success mb-3">Create Child</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($children as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>{{ $child->name }}</td>
                    <td>{{ $child->status }}</td>
                    <td>
                        <a href="{{ route('admin.children.edit', $child) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.children.destroy', $child) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $children->links() }}
@endsection

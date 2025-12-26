@extends('layout.admin-layout.app')

@section('title', 'Users List')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary"><i class="fas fa-users me-2"></i> All Users</h2>
        <a href="{{ route('users.add') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

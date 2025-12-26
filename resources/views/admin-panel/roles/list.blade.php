@extends('layout.admin-layout.app')
@section('title','Roles')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Roles</h4>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">+ Add Role</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped mb-0 align-middle">
          <thead>
            <tr>
              <th style="width:80px">#</th>
              <th>Name</th>
              <th style="width:220px">Created At</th>
              <th style="width:180px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($roles as $role)
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at?->format('Y-m-d H:i') }}</td>
                <td>
                  <a href="{{ route('roles.edit',$role) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <form action="{{ route('roles.destroy',$role) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Delete this role?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center py-4">No roles yet.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      {{ $roles->links() }}
    </div>
  </div>
</div>
@endsection

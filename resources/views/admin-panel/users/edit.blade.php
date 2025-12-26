{{-- resources/views/admin-panel/users/edit.blade.php --}}
@extends('layout.admin-layout.app')
@section('title', 'Edit User')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary"><i class="fas fa-edit me-2"></i> Edit User</h2>
    <a href="{{ route('users.list') }}" class="btn btn-outline-secondary">
      <i class="fas fa-arrow-left me-1"></i> Back
    </a>
  </div>

  <form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf @method('PUT')

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
      @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
      @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Password (Optional)</label>
      <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
      @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Role</label>
      <select name="role_id" class="form-select" required>
        @foreach($roles as $role)
          <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->name }}</option>
        @endforeach
      </select>
      @error('role_id')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Update User</button>
  </form>
</div>
@endsection

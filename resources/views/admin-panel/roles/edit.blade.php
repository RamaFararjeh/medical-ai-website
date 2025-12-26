{{-- resources/views/admin/roles/edit.blade.php --}}
@extends('layout.admin-layout.app')
@section('title','Edit Role')

@section('content')
<div class="container py-4">
  <div class="d-flex align-items-center gap-2 mb-3">
    <a href="{{ route('roles.index') }}" class="btn btn-light">&larr; Back</a>
    <h4 class="mb-0">Edit Role</h4>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('roles.update',$role) }}" class="row g-3">
        @csrf @method('PUT')
        <div class="col-12">
          <label class="form-label">Role Name</label>
          <input type="text" name="name" value="{{ old('name',$role->name) }}" class="form-control" required>
          @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-12">
          <h5 class="fw-bold mt-2">Permissions</h5>
        </div>

        @foreach($groupedPermissions as $group)
          <div class="col-12 col-md-6">
            <div class="border rounded p-3 mb-3">
              <div class="fw-bold text-primary mb-2">{{ $group['label'] }}</div>
              @foreach($group['items'] as $perm)
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $perm->id }}" id="perm_{{ $perm->id }}" {{ in_array($perm->id, $selected ?? []) ? 'checked' : '' }}>
                  <label class="form-check-label" for="perm_{{ $perm->id }}">
                    {{ $perm->description ?? \Illuminate\Support\Str::headline($perm->name) }}
                  </label>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach

        <div class="col-12">
          <button class="btn btn-primary">Update</button>
          <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

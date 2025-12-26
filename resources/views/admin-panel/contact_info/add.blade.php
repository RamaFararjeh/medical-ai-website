@extends('layout.admin-layout.app')
@section('title','Contact Info — Add')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Add Contact Info</h3>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.contact.store') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" value="{{ old('address') }}"
                 class="form-control @error('address') is-invalid @enderror"
                 placeholder="Enter address">
          @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 class="form-control @error('email') is-invalid @enderror"
                 placeholder="example@domain.com">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" value="{{ old('phone') }}"
                 class="form-control @error('phone') is-invalid @enderror"
                 placeholder="+962 7X XXX XXXX">
          @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="text-end">
          <button class="btn btn-primary">
            <i class="fa-regular fa-circle-check me-1"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

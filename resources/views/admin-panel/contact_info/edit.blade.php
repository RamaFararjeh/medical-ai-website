@extends('layout.admin-layout.app')
@section('title','Contact Info — Edit')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Edit Contact #{{ $contact->id }}</h3>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.contact.update',$contact) }}">
        @csrf @method('PUT')

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" value="{{ old('address',$contact->address) }}"
                 class="form-control @error('address') is-invalid @enderror">
          @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email',$contact->email) }}"
                 class="form-control @error('email') is-invalid @enderror">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" value="{{ old('phone',$contact->phone) }}"
                 class="form-control @error('phone') is-invalid @enderror">
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

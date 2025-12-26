@extends('layout.admin-layout.app')
@section('title','Doctors — Edit')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Edit Doctor #{{ $doctor->id }}</h3>
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.doctors.update',$doctor) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name',$doctor->name) }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">Specialty</label>
            <input type="text" name="specialty" value="{{ old('specialty',$doctor->specialty) }}" class="form-control">
          </div>

          <div class="col-md-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" value="{{ old('age',$doctor->age) }}" class="form-control" min="0" max="120">
          </div>
          <div class="col-md-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select">
              <option value="">—</option>
              <option value="male"   @selected(old('gender',$doctor->gender)==='male')>Male</option>
              <option value="female" @selected(old('gender',$doctor->gender)==='female')>Female</option>
              <option value="other"  @selected(old('gender',$doctor->gender)==='other')>Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label">Experience (years)</label>
            <input type="number" name="years_experience" value="{{ old('years_experience',$doctor->years_experience) }}" class="form-control" min="0" max="80">
          </div>
          <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="is_active" class="form-select">
              <option value="1" @selected(old('is_active',(int)$doctor->is_active) == 1)>Active</option>
              <option value="0" @selected(old('is_active',(int)$doctor->is_active) == 0)>Inactive</option>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email',$doctor->email) }}" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" value="{{ old('phone',$doctor->phone) }}" class="form-control" placeholder="+962 7X XXX XXXX">
          </div>

          <div class="col-md-12">
            <label class="form-label">Bio</label>
            <textarea name="bio" rows="4" class="form-control">{{ old('bio',$doctor->bio) }}</textarea>
          </div>

          <div class="col-md-6">
            <label class="form-label d-block">Photo</label>
            @if($doctor->photo_url)
              <img src="{{ $doctor->photo_url }}" class="rounded mb-2" style="width:80px;height:80px;object-fit:cover">
            @endif
            <input type="file" name="photo" class="form-control">
            <small class="text-muted">JPG/PNG/WEBP, max 2MB.</small>
          </div>
        </div>

        <div class="text-end mt-3">
          <button class="btn btn-primary">
            <i class="fa-regular fa-circle-check me-1"></i> Save
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

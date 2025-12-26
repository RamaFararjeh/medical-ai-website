@extends('layout.admin-layout.app')
@section('title','Mission — Edit')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Edit Mission #{{ $mission->id }}</h3>
    <a href="{{ route('admin.mission.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.mission.update',$mission) }}">
        @csrf @method('PUT')

        <div class="mb-3">
          <label class="form-label">Paragraph</label>
          <textarea name="paragraph" rows="6" class="form-control @error('paragraph') is-invalid @enderror"
                    placeholder="Write the mission statement here...">{{ old('paragraph',$mission->paragraph) }}</textarea>
          @error('paragraph') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

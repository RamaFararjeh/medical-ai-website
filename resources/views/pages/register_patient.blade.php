@extends('layout.page-layout.app')
@section('title','Patient Register')

@section('content')
<div class="container py-4" style="max-width:520px">
  <h3 class="mb-3">Create Patient Account (Optional)</h3>

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('patient.register.post') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" value="{{ old('name') }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" value="{{ old('email') }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Phone (optional)</label>
      <input name="phone" value="{{ old('phone') }}" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button class="btn btn-success w-100">Create Account</button>

    <div class="text-center mt-3">
      <a href="{{ route('patient.login') }}">Back to login</a>
    </div>
  </form>
</div>
@endsection

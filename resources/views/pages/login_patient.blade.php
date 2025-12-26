@extends('layout.page-layout.app')
@section('title','Patient Login')

@section('content')
<div class="container py-4" style="max-width:520px">
  <h3 class="mb-3">Patient Login</h3>

  @if($errors->any())
    <div class="alert alert-danger">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('patient.login.post') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" value="{{ old('email') }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="remember" id="remember">
      <label class="form-check-label" for="remember">Remember me</label>
    </div>

    <button class="btn btn-primary w-100">Login</button>

    <div class="text-center mt-3">
      <a href="{{ route('patient.register') }}">Create account (optional)</a>
    </div>
  </form>
</div>
@endsection

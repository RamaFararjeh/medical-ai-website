@extends('layout.admin-layout.app-login')

@section('title', 'Admin Login')

@section('content')
<div class="login-wrapper">
    <div class="login-card text-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="80" class="mb-3">
        <h4 class="fw-bold mb-1">Admin Login</h4>
        <small class="text-muted mb-4 d-block">Only for administrators</small>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin-login.submit') }}" method="POST" class="text-start">
            @csrf
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary w-100" style="background-color: #133b4b; border-color:#133b4b">Log In</button>
        </form>
    </div>
</div>
@endsection

<style>
    html, body {
        height: 100%;
        margin: 0;
        background-color: #f8f9fa;
        overflow: hidden;
    }

    .login-wrapper {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    .login-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 420px;
    }

    .btn-blue {
        color: #fff;
        border: none;
    }
</style>

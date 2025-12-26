@extends('layout.page-layout.app')
@section('title', $doctor->name.' — Doctor Profile')

@section('content')
<section class="page-banner top position-relative">
  <span class="banner-bg"><img src="{{ asset('images/banner.jpg') }}" alt="Doctor" /></span>
  <span class="banner-overlay"></span>
  <div class="container position-relative">
    <div class="row"><div class="col-12 col-lg-8 py-5">
      <h1 class="display-6 fw-bold mb-2" style="color:#133b4b">{{ $doctor->name }}</h1>
      <p class="text-muted m-0">{{ $doctor->specialty }} @if($doctor->degree) — {{ $doctor->degree }} @endif</p>
    </div></div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
            @php
            $img = $doctor->photo
                ? route('media.public', ['path' => $doctor->photo])
                : asset('images/doctor-placeholder.png');
        @endphp
        
        <img src="{{ $img }}" alt="{{ $doctor->name }}"
            class="rounded-4 img-fluid mb-3"
            style="width:100%;object-fit:cover;border:6px solid #0ea5b7;">

            <ul class="list-unstyled small text-muted">
                @if($doctor->email)<li><i class="fa-solid fa-envelope me-2"></i><a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></li>@endif
                @if($doctor->phone)<li><i class="fa-solid fa-phone me-2"></i>{{ $doctor->phone }}</li>@endif
            </ul>
      </div>
      <div class="col-md-8">
        <h5 class="fw-bold text-blue mb-2">About</h5>
        <p class="text-muted">{{ $doctor->bio }}</p>
        {{-- مساحة لاحقاً: جدول المواعيد، المقالات، التقييمات… --}}
      </div>
    </div>
  </div>
</section>
@endsection

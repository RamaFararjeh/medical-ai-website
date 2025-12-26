@extends('layout.page-layout.app')
@section('title','Our Doctors — Medicate')

@section('content')
{{-- Banner --}}
<section class="page-banner top position-relative">
  <span class="banner-bg"><img src="{{ asset('images/banner.jpg') }}" alt="Doctors" /></span>
  <span class="banner-overlay"></span>
  <div class="container position-relative">
    <div class="row"><div class="col-12 col-lg-8 py-5">
      <h1 class="display-6 fw-bold mb-2" style="color:#133b4b">Our Doctors</h1>
      <p class="text-muted m-0">Meet our medical team and their specialties.</p>
    </div></div>
  </div>
</section>

{{-- List --}}
<section class="py-5">
  <div class="container">
    <div class="row gy-5">
      @forelse($doctors as $doc)
        @php
          $img = $doc->photo
              ? route('media.public', ['path' => $doc->photo])
              : asset('images/doctor-placeholder.png');
        @endphp
        <div class="col-12">
          <div class="row g-4 align-items-center">
            <div class="col-sm-3 col-md-2 d-flex justify-content-sm-end">
              <a href="{{ route('doctors.show', ['doctor' => $doc->id]) }}" class="text-decoration-none">
                <div class="position-relative" style="width:130px;height:130px;">
                  <img src="{{ $img }}" alt="{{ $doc->name }}"
                      class="rounded-circle img-fluid"
                      style="width:130px;height:130px;object-fit:cover;border:6px solid #0ea5b7;">
                </div>
              </a>
            </div>
    

            {{-- التفاصيل مثل التصميم المرفق --}}
            <div class="col-sm-9 col-md-10">
              <div class="bg-light-subtle border rounded-3">
                <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom">
                  <i class="fa-solid fa-user-doctor text-main"></i>
                  <a href="{{ route('doctors.show', ['doctor' => $doc->id]) }}" class="text-decoration-none">
                    {{ $doc->name }}
                  </a>
                  @if($doc->degree)
                    <span class="ms-2 text-muted">{{ $doc->degree }}</span>
                  @endif
                </div>

                <div class="p-3">
                  @if($doc->bio)
                    <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($doc->bio, 220) }}</p>
                  @endif

                  <hr class="my-3">

                  <div class="row small">
                    <div class="col-md-6 mb-2">
                      <div class="fw-semibold">{{ $doc->specialty ?? '—' }}</div>
                    </div>
                    <div class="col-md-6">
                      @if($doc->email)
                        <div>Email :
                          <a href="mailto:{{ $doc->email }}">{{ $doc->email }}</a>
                        </div>
                      @endif
                    </div>
                  </div>

                  {{-- سوشال --}}
                  @php $s = $doc->socials ?? []; @endphp
                  @if(!empty($s))
                    <div class="d-flex gap-2 mt-3">
                      @if(!empty($s['twitter']))  <a class="btn btn-outline-secondary btn-sm rounded-circle" href="{{ $s['twitter'] }}"><i class="fa-brands fa-x-twitter"></i></a>@endif
                      @if(!empty($s['facebook'])) <a class="btn btn-outline-secondary btn-sm rounded-circle" href="{{ $s['facebook'] }}"><i class="fa-brands fa-facebook-f"></i></a>@endif
                      @if(!empty($s['linkedin'])) <a class="btn btn-outline-secondary btn-sm rounded-circle" href="{{ $s['linkedin'] }}"><i class="fa-brands fa-linkedin-in"></i></a>@endif
                      @if(!empty($s['instagram']))<a class="btn btn-outline-secondary btn-sm rounded-circle" href="{{ $s['instagram'] }}"><i class="fa-brands fa-instagram"></i></a>@endif
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12"><div class="alert alert-info">No doctors yet.</div></div>
      @endforelse
    </div>
  </div>
</section>
@endsection

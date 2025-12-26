@extends('layout.page-layout.app')
@section('title','Contact Us — Medicate')

@section('content')
{{-- STATIC PAGE BANNER --}}
<section class="page-banner top position-relative text-dark">
    <picture class="banner-bg">
        <img src="{{ asset('images/banner.jpg') }}" alt="contact banner" loading="lazy">
      </picture>

    <div class="banner-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-12 col-lg-8 py-5">
            <h1 class="display-5 fw-bold mb-3" style="color: #133b4b">Contact Us</h1>
    
            {{-- breadcrumb ثابت --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
                <p class="text-muted">Have a question or feedback? Send us a message and we’ll get back soon.</p>

            </nav>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      {{-- Form --}}
      <div class="col-lg-7">
        <div class="card shadow-sm">
          <div class="card-body p-4">
            @if(session('ok'))
              <div class="alert alert-success">{{ session('ok') }}</div>
            @endif
            @if($errors->any())
              <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <h5 class="fw-bold text-blue mb-3"><i class="fa-regular fa-paper-plane me-2"></i>Send a Message</h5>
            <form method="POST" action="{{ route('contact.submit') }}" novalidate>
              @csrf
              <div class="row g-3">
                <div class="col-sm-6">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="col-12">
                  <label class="form-label">Subject</label>
                  <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
                </div>
                <div class="col-12">
                  <label class="form-label">Message</label>
                  <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                </div>
                <div class="col-12 d-flex gap-2">
                  <button class="btn btn-blue px-4">Send</button>
                  <button type="reset" class="btn btn-outline-blue">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Info / Map / FAQ --}}
      <div class="col-lg-5">
        <div class="p-4 rounded-3 border bg-white mb-4">
          <h6 class="fw-bold text-blue mb-3">
            <i class="fa-solid fa-headset me-2"></i>Contact Info
          </h6>
          <ul class="list-unstyled text-muted small mb-0">
            <li class="mb-2">
              <i class="fa-solid fa-location-dot text-main me-2"></i>
              {{ $contact->address ?? '—' }}
            </li>
            <li class="mb-2">
              <i class="fa-solid fa-envelope text-main me-2"></i>
              {{ $contact->email ?? '—' }}
            </li>
            <li>
              <i class="fa-solid fa-phone text-main me-2"></i>
              {{ $contact->phone ?? '—' }}
            </li>
          </ul>
        </div>

        <div class="rounded-3 overflow-hidden border mb-4">
          {{-- ضع إحداثياتك لاحقًا --}}
          <iframe src="https://maps.google.com/maps?q=Amman%20Jordan&t=&z=12&ie=UTF8&iwloc=&output=embed"
                  width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="accordion" id="faq">
          <div class="accordion-item">
            <h2 class="accordion-header" id="h1">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1">
                Is this a medical diagnosis?
              </button>
            </h2>
            <div id="c1" class="accordion-collapse collapse" data-bs-parent="#faq">
              <div class="accordion-body small text-muted">
                No. It’s an educational tool. Always seek professional medical advice for serious concerns.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="h2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c2">
                Do you store personal data?
              </button>
            </h2>
            <div id="c2" class="accordion-collapse collapse" data-bs-parent="#faq">
              <div class="accordion-body small text-muted">
                We avoid storing personal identifiers and follow security best practices.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

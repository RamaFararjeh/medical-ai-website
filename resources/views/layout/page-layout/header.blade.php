<header id="siteHeader" class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white w-100 border-bottom">
      <div class="container-fluid px-3 px-lg-4">
  
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
          <img src="{{ asset('images/logo.png') }}" alt="Medicate" class="me-2" style="height:50px;width:auto;">
          <span class="fw-bold fs-4" style="color: #133b4b">Medical</span>
        </a>
  
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav mx-auto gap-lg-3 text-center">
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('doctors.index') ? 'active' : '' }}" href="{{ route('doctors.index') }}">Doctors</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
          </ul>
  
          {{-- ✅ Right buttons --}}
          <div class="d-flex gap-2 align-items-center justify-content-center mt-3 mt-lg-0">
  
            @auth('patient')
                <form method="POST" action="{{ route('patient.logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger fw-semibold px-3 rounded-3">
                    Logout
                    </button>
                </form>
            @else
              <a href="{{ route('patient.login') }}" class="btn btn-outline-secondary fw-semibold px-3 rounded-3">
                Login
              </a>
            @endauth
  
            <a href="{{ route('diagnosis.new') }}" class="btn btn-primary fw-semibold px-3 rounded-3"
               style="background-color: #133b4b; border-color:#133b4b">
              Start Diagnosis
            </a>
  
          </div>
        </div>
  
      </div>
    </nav>
  </header>
  
{{-- resources/views/layout/page-layout/footer.blade.php --}}
<footer class="site-footer bg-light border-top mt-5">
    <div class="container py-5">
        <div class="row gy-4">
    
            {{-- Brand + About paragraph (من الأدمن) --}}
            <div class="col-12 col-md-4">
            <a href="{{ route('home') }}" class="d-inline-flex align-items-center mb-2 text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="{{ $footer['site_name'] ?? 'Medicate' }}" style="height:50px" class="me-2">
                <span class="fw-bold fs-5" style="color:#133b4b">{{ $footer['site_name'] ?? 'Medicate' }}</span>
            </a>
            <p class="text-muted mt-2 mb-0">
                {{-- نكتفي بملخص 180 حرف حتى يضل سطرين-ثلاثة --}}
                {{ \Illuminate\Support\Str::limit($footer['about_paragraph'] ?? '', 280) }}
            </p>
            </div>
    
            {{-- Quick Links --}}
            <div class="col-6 col-md-2">
            <h6 class="text-uppercase fw-semibold mb-3">Links</h6>
            <ul class="list-unstyled m-0">
                <li><a class="footer-link" href="{{ route('home') }}">Home</a></li>
                <li><a class="footer-link" href="{{ url('/about') }}">About</a></li>
                <li><a class="footer-link" href="{{ url('/doctors') }}">Doctors</a></li>
                <li><a class="footer-link" href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
            </div>
    
            {{-- Services (اختياري) --}}
            <div class="col-6 col-md-3">
            <h6 class="text-uppercase fw-semibold mb-3">Services</h6>
            <ul class="list-unstyled m-0">
                <li><a class="footer-link" href="#">Symptom Check</a></li>
                <li><a class="footer-link" href="#">Virtual Consultation</a></li>
                <li><a class="footer-link" href="#">Health Articles</a></li>
            </ul>
            </div>
    
            {{-- Contact (من contact_info) --}}
            <div class="col-12 col-md-3">
            <h6 class="text-uppercase fw-semibold mb-3">Contact</h6>
            <ul class="list-unstyled text-muted small mb-3">
                <li class="mb-1"><i class="fa-solid fa-location-dot me-2"></i> {{ $footer['contact']->address ?? '—' }}</li>
                <li class="mb-1"><i class="fa-solid fa-envelope me-2"></i> {{ $footer['contact']->email   ?? '—' }}</li>
                <li><i class="fa-solid fa-phone me-2"></i> {{ $footer['contact']->phone   ?? '—' }}</li>
            </ul>
    
            <div class="d-flex gap-2">
                @if(!empty($footer['socials']['x']))        <a class="btn btn-outline-secondary btn-sm px-2" href="{{ $footer['socials']['x'] }}" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>@endif
                @if(!empty($footer['socials']['facebook'])) <a class="btn btn-outline-secondary btn-sm px-2" href="{{ $footer['socials']['facebook'] }}" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>@endif
                @if(!empty($footer['socials']['linkedin'])) <a class="btn btn-outline-secondary btn-sm px-2" href="{{ $footer['socials']['linkedin'] }}" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>@endif
                @if(!empty($footer['socials']['instagram']))<a class="btn btn-outline-secondary btn-sm px-2" href="{{ $footer['socials']['instagram'] }}" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>@endif
            </div>
            </div>
    
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="bg-white border-top">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between py-3">
            <p class="mb-2 mb-md-0 small text-muted">
            © <span id="yearCopy">{{ date('Y') }}</span> {{ $footer['site_name'] ?? 'Medicate' }}. All rights reserved.
            </p>
            <a href="{{ route('diagnosis.new') }}" class="btn btn-primary btn-sm" style="background-color:#133b4b;border-color:#133b4b">
            Start Diagnosis
            </a>
        </div>
    </div>

    {{-- Back to top --}}
    <button type="button" id="backToTop" class="btn btn-primary shadow-sm"
        style="position:fixed; right:1rem; bottom:1rem; display:none; background-color:#fe0000; border-color:#fe0000"
        aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</footer>


<script>
    // Back to top
    const btt = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) btt.style.display = 'inline-flex';
        else btt.style.display = 'none';
    });
    btt?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
</script>

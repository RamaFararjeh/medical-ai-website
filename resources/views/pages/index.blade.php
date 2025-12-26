@extends('layout.page-layout.app')
@section('title', 'Home — Medicate')

@section('content')
{{-- hero section --}}
<section id="hero" class="position-relative">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
    
            {{-- Slide 1 --}}
            <div class="carousel-item active">
            <div class="hero-slide bg-cover" style="background-image:url('{{ asset('images/hero-section.jpg') }}');">
                <div class="hero-overlay"></div>
                <div class="container">
                <div class="hero-content">
                    <span class="badge rounded-1 px-3 py-2 bg-primary-subtle fw-semibold" style="color: #133b4b!important">
                    HIGHER LEVEL OF CARE
                    </span>
    
                    <h1 class="display-4 fw-bold lh-1 mt-3" style="color: #133b4b">
                    Setting Standards<br> In Physiotherapy
                    </h1>
    
                    <p class="lead text-secondary mt-3 mb-4" style="max-width: 640px;">
                    It is a long established fact that a reader will be distracted by the readable content
                    of a page when looking at its layout.
                    </p>
    
                    <a href="{{ route('about') }}" class="btn btn-primary btn-lg px-4 fw-semibold" style="background-color: #133b4b; border-color:#133b4b">
                    READ MORE <span class="ms-2">+</span>
                    </a>
                </div>
                </div>
            </div>
            </div>
    
            {{-- Slide 2 (اختياري) --}}
            <div class="carousel-item">
            <div class="hero-slide bg-cover" style="background-image:url('{{ asset('images/hero-section-2.jpg') }}');">
                <div class="hero-overlay"></div>
                <div class="container">
                <div class="hero-content">
                    <span class="badge rounded-1 px-3 py-2 bg-primary-subtle fw-semibold" style="color: #133b4b!important">
                    TRUSTED EXPERTS
                    </span>
                    <h2 class="display-5 fw-bold lh-1 mt-3" style="color: #133b4b">Personalized Care For Everyone</h2>
                    <p class="lead text-secondary mt-3 mb-4" style="max-width: 640px;">
                    Compassionate care with evidence-based practices to help you recover faster.
                    </p>
                    <a href="{{ route('diagnosis.new') }}" class="btn btn-primary btn-lg px-4 fw-semibold" style="background-color: #133b4b; border-color:#133b4b">
                    Start Diagnosis
                    </a>
                </div>
                </div>
            </div>
            </div>
    
        </div>

        {{-- Arrows --}}
        <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-nav shadow-sm"><i class="fa-solid fa-angle-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-nav shadow-sm"><i class="fa-solid fa-angle-right"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

{{-- about section --}}
<section id="about" class="about-section bg-light-subtle py-5">
    <div class="container py-4">
        <div class="row g-4 g-lg-5 align-items-center">
    
            {{-- الصورة --}}
            <div class="col-12 col-lg-6">
            <div class="about-media rounded-3 overflow-hidden shadow-sm">
                <img
                src="{{ asset('images/about.jpg') }}"
                alt="About Medicate"
                class="img-fluid w-100">
            </div>
            </div>
    
            {{-- المحتوى --}}
            <div class="col-12 col-lg-6">
            <span class="badge about-badge px-3 py-2 rounded-1 fw-semibold">WHAT ABOUT US</span>
    
            <h2 class="display-6 fw-bold mt-3 mb-3 about-title">
                The Heart And Science Of<br> Medic Test
            </h2>
    
            <p class="text-muted mb-4" style="max-width: 640px;">
                @if(!empty($about))
                    {!! nl2br(e($about->paragraph)) !!}
                @else
                    {{ $fallback['paragraph'] ?? '' }}
                @endif
            </p>
            
            <ul class="list-unstyled mb-4">
                @foreach(($items ?? []) as $item)
                    <li class="d-flex align-items-start gap-2 mb-3">
                        <span class="about-check flex-shrink-0 mt-1"><i class="fa-solid fa-check"></i></span>
                        <span class="fw-semibold text-body">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
            
            <a href="{{ route('about') }}" class="btn btn-primary btn-lg px-4 fw-semibold" style="background-color: #133b4b; border-color:#133b4b ">
                READ MORE <span class="ms-2">+</span>
            </a>
            </div>
        </div>
    </div>
</section>


{{-- doctors-section --}}
@php
  // إن وصلتنا مجموعة Eloquent من الكنترولر، نحولها للعرض المناسب
    if (isset($doctors) && $doctors instanceof \Illuminate\Support\Collection) {
        $list = $doctors->map(function ($d) {
            $img = $d->photo
                ? route('media.public', ['path' => $d->photo])   // storage via route
                : asset('images/doctor-placeholder.png');        // صورة افتراضية

            return [
                'name'       => $d->name,
                'specialty'  => $d->specialty ?? '—',
                'avatar'     => $img,
                'experience' => ($d->years_experience ?? 0).' yrs',
                'hospital'   => '—', // لو بدك عمود بالمستقبل غيّرها من DB
            ];
        })->all();
    } else {
      // Fallback (لو ما في داتا)
        $list = [
            ['name'=>'Dr. Sarah Khalid','specialty'=>'Cardiologist','avatar'=>asset('images/dr4.avif'),'experience'=>'10 yrs','hospital'=>'NUCT Clinic'],
            ['name'=>'Dr. Omar Haddad','specialty'=>'Dermatologist','avatar'=>asset('images/dr2.jpg'),'experience'=>'7 yrs','hospital'=>'Skin Care Center'],
            ['name'=>'Dr. Lina Qasem','specialty'=>'Pediatrician','avatar'=>asset('images/dr5.webp'),'experience'=>'9 yrs','hospital'=>'Kids Health'],
            ['name'=>'Dr. Fadi Nasser','specialty'=>'Orthopedic','avatar'=>asset('images/dr1.jpg'),'experience'=>'12 yrs','hospital'=>'Ortho Care'],
            ['name'=>'Dr. Rawan Saleh','specialty'=>'Neurologist','avatar'=>asset('images/dr6.png'),'experience'=>'8 yrs','hospital'=>'Neuro Center'],
            ['name'=>'Dr. Hani Saeed','specialty'=>'ENT','avatar'=>asset('images/dr3.jpg'),'experience'=>'6 yrs','hospital'=>'ENT Clinic'],
        ];
    }

  $chunks = collect($list)->chunk(4); // 4 بطاقات بكل سلايد
@endphp

<section id="doctors" class="py-5">
    <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-4">
        <div>
            <span class="badge badge-soft-blue px-3 py-2 fw-semibold">OUR DOCTORS</span>
            <h2 class="mt-3 mb-0 fw-bold" style="color:#133b4b">Meet Our Specialists</h2>
        </div>
        <div class="d-none d-md-flex gap-2">
            <button class="btn btn-outline-blue btn-sm rounded-circle" type="button"
                    data-bs-target="#doctorsCarousel" data-bs-slide="prev" aria-label="Prev">
            <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="btn btn-blue btn-sm rounded-circle" type="button"
                    data-bs-target="#doctorsCarousel" data-bs-slide="next" aria-label="Next">
            <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        </div>

        <div id="doctorsCarousel" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach($chunks as $gIndex => $group)
            <div class="carousel-item {{ $gIndex === 0 ? 'active' : '' }}">
                <div class="row g-4">
                @foreach($group as $index => $doc)
                    <div class="col-12 col-sm-6 col-lg-3">
                    <div class="doctor-card h-100 p-3 rounded-3 bg-white border">
                        <div class="position-relative text-center mb-3">
                        <img class="doctor-avatar" src="{{ $doc['avatar'] }}" alt="{{ $doc['name'] }}">
                        <span class="doc-badge">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                        <h5 class="mb-1 fw-bold">{{ $doc['name'] }}</h5>
                        <div class="text-main fw-semibold small mb-2">{{ $doc['specialty'] }}</div>
                        <ul class="list-unstyled small text-muted mb-3">
                        <li><i class="fa-regular fa-clock me-2"></i>{{ $doc['experience'] }} experience</li>
                        </ul>
                        <div class="d-flex gap-2 mt-auto">
                        <a href="#" class="btn btn-outline-blue btn-sm w-100">Profile</a>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endforeach
        </div>

        {{-- أسهم للموبايل تحت --}}
        <div class="d-flex d-md-none justify-content-center gap-2 mt-3">
            <button class="btn btn-outline-blue btn-sm rounded-circle" type="button"
                    data-bs-target="#doctorsCarousel" data-bs-slide="prev" aria-label="Prev">
            <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="btn btn-blue btn-sm rounded-circle" type="button"
                    data-bs-target="#doctorsCarousel" data-bs-slide="next" aria-label="Next">
            <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        </div>
    </div>
</section>


{{-- diagnosis-process --}}
@php
  // فallback إن ما في داتا من الأدمن
    $steps = !empty($processItems) ? $processItems : [
        ['title'=>'Start',       'desc'=>'Open the checker and accept the notice.'],
        ['title'=>'Profile',     'desc'=>'Enter age & gender to tailor suggestions.'],
        ['title'=>'Symptoms',    'desc'=>'Select your current symptoms from the list.'],
        ['title'=>'AI Analysis', 'desc'=>'Model processes patterns & risk factors.'],
        ['title'=>'Result',      'desc'=>'Get likely conditions & next actions.'],
    ];

  // أيقونات افتراضية حسب العنوان/الترتيب (لو ما عندك أيقونة بالـDB)
    $iconFor = function ($title, $idx) {
        $map = [
            'start'    => 'fa-power-off',
            'profile'  => 'fa-id-card',
            'symptom'  => 'fa-clipboard-check',
            'analysis' => 'fa-robot',
            'result'   => 'fa-notes-medical',
        ];
        foreach ($map as $k=>$v) if (str_contains(strtolower($title), $k)) return $v;
        // افتراضي بحسب الترتيب
        return ['fa-power-off','fa-id-card','fa-clipboard-check','fa-robot','fa-notes-medical'][$idx % 5];
    };
@endphp

<section id="diagnosisProcess" class="process-section py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
        <span class="badge badge-soft-blue px-3 py-2 fw-semibold">OUR STEP</span>
        <h2 class="fw-bold mt-3 mb-2" style="color:#133b4b">How Our Diagnosis Works</h2>
        <p class="text-muted mb-0">Simple five-step flow to get a fast, AI-assisted symptom check.</p>
        </div>

        <div class="position-relative">
        <div class="process-dash d-none d-lg-block"></div>

        <div class="row g-4 justify-content-center">
            @foreach ($steps as $i => $s)
            <div class="col-12 col-sm-6 col-lg-3 col-xxl">
                <div class="process-item h-100 text-center">
                <div class="process-icon-wrap mx-auto mb-3">
                    <div class="process-number">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="process-icon">
                    <i class="fa-solid {{ $iconFor($s['title'] ?? 'Step', $i) }}"></i>
                    </div>
                </div>
                <h5 class="fw-bold mb-2">{{ $s['title'] ?? 'Step' }}</h5>
                <p class="text-muted mb-0 small">{{ $s['desc'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
        </div>

        <div class="text-center mt-5">
        <a href="{{ url('/diagnosis/new') }}" class="btn btn-primary btn-lg px-4 fw-semibold"
            style="background-color:#fe0000;border-color:#fe0000">
            GET APPOINTMENT <span class="ms-2">+</span>
        </a>
        </div>
    </div>
</section>


{{-- cta-band section --}}
<section id="ctaBand" class="cta-band position-relative overflow-hidden text-white py-5">
    {{-- موجة أعلى --}}
    <svg class="cta-wave-top" viewBox="0 0 1440 80" preserveAspectRatio="none">
      <path d="M0,64 C240,8 480,8 720,64 C960,120 1200,120 1440,64 L1440,0 L0,0 Z" fill="currentColor" opacity=".15"/>
    </svg>

    {{-- عناصر عائمة --}}
    <i class="fa-solid fa-heart-pulse float-icon fi-1"></i>
    <i class="fa-solid fa-stethoscope float-icon fi-2"></i>
    <i class="fa-solid fa-syringe float-icon fi-3"></i>

    <div class="container position-relative">
        <div class="row align-items-center g-4">
          <div class="col-lg-7">
            <span class="badge badge-soft-main text-uppercase fw-semibold mb-2">Stay Healthy</span>
            <h3 class="fw-bold mb-2">Check Your Symptoms in Minutes</h3>
            <p class="mb-0 opacity-75">AI-assisted triage with evidence-based guidance. Quick, private, and free.</p>
          </div>
          <div class="col-lg-5 text-lg-end">
            <a href="{{ route('diagnosis.new') }}" class="btn btn-white-blue btn-lg fw-semibold">
              Start Diagnosis
            </a>
          </div>
        </div>
  
        {{-- عدادات حقيقية --}}
        <div class="row text-center g-4 mt-4">
          @php
            $stats = [
              ['label' => 'Patients Helped',   'val' => $diagnosisCount],
              ['label' => 'Verified Doctors',  'val' => $doctorCount],
              ['label' => 'Model Accuracy',    'val' => $modelAccuracy, 'suffix' => '%'],
            ];
          @endphp
  
          @foreach($stats as $s)
            <div class="col-6 col-lg-4">
              <div class="counter-card py-3">
                <div class="h2 fw-bold mb-0">
                  <span class="counter" data-to="{{ $s['val'] }}">
                    {{ $s['val'] }}
                  </span>{{ $s['suffix'] ?? '' }}
                </div>
                <div class="small opacity-75">{{ $s['label'] }}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    {{-- موجة أسفل --}}
    <svg class="cta-wave-bottom" viewBox="0 0 1440 80" preserveAspectRatio="none">
        <path d="M0,16 C240,72 480,72 720,16 C960,-40 1200,-40 1440,16 L1440,80 L0,80 Z" fill="currentColor" opacity=".15"/>
    </svg>
</section>

<script>
        // عدّادات عند الظهور
        (function(){
        const els = document.querySelectorAll('#ctaBand .counter');
        if(!els.length) return;
        const io = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{
            if(e.isIntersecting){
                const el = e.target, to = +el.dataset.to, dur = 1200;
                const start = performance.now();
                const step = (t)=>{
                const p = Math.min((t-start)/dur,1);
                const val = Math.floor(to * (0.2 + 0.8*Math.pow(p,0.8)));
                el.textContent = val.toLocaleString();
                if(p<1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
                io.unobserve(el);
            }
            });
        },{threshold:0.3});
        els.forEach(el=>io.observe(el));
        })();
</script>

@endsection

@extends('layout.page-layout.app')
@section('title','About Us — Medicate')

@section('content')
<section class="page-banner position-relative text-dark">
    {{-- الصورة كـ IMG لثبات أفضل --}}
    <picture class="banner-bg">
        {{-- لو عندك نسخة webp فعل السطر التالي --}}
        {{-- <source srcset="{{ asset('images/about.webp') }}" type="image/webp"> --}}
        <img src="{{ asset('images/banner.jpg') }}" alt="About banner" loading="lazy">
    </picture>

    {{-- تدرّج خفيف من اليسار إلى الشفافية --}}
    <div class="banner-overlay"></div>

    <div class="container position-relative">
        <div class="row">
            <div class="col-12 col-lg-8 py-5">
            <h1 class="display-5 fw-bold mb-3" style="color: #133b4b">About Us</h1>
    
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
            </div>
        </div>
    </div>
</section>

<section class="py-5 border-bottom bg-light-subtle">
    <div class="container py-3">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
            <span class="badge badge-soft-blue px-3 py-2 fw-semibold">ABOUT US</span>
            <h1 class="fw-bold mt-3 text-blue">We blend AI with Care</h1>
    
            {{-- فقرات الـ About من قاعدة البيانات --}}
            @if(isset($items) && $items->isNotEmpty())
                @foreach($items as $item)
                <p class="text-muted mb-2">{{ $item->paragraph }}</p>
    
                {{-- عرض نقاط الفقرة (JSON Array أو رقم) --}}
                @if(!empty($item->points))
                @if(is_array($item->points))
                    <div class="row g-3 mt-3">
                    @foreach($item->points as $p)
                        <div class="col-12 col-md-6 col-lg-4">
                        <div class="d-flex align-items-start gap-3 p-3 border rounded-3 bg-white shadow-sm h-100">
                            {{-- آيقونة صح داخل دائرة --}}
                            <i class="fa-solid fa-stethoscope" style="font-size:18px; color:#133b4b;"></i>

                            <span class="fw-semibold text-dark">{{ $p }}</span>
                        </div>
                        </div>
                    @endforeach
                    </div>
                @elseif(is_numeric($item->points))
                    <div class="mt-3">
                    <span class="badge bg-dark-subtle text-dark-emphasis">{{ (int)$item->points }}</span>
                    </div>
                @else
                    <div class="mt-3">
                    <span class="badge bg-secondary-subtle text-secondary-emphasis">{{ $item->points }}</span>
                    </div>
                @endif
                @endif

                @endforeach
            @endif    
            <a href="{{ route('diagnosis.new') }}"
                class="btn btn-primary btn-lg mt-4"
                style="background-color:#133b4b; border-color:#133b4b">
                Start Diagnosis
            </a>
            </div>
    
            <div class="col-lg-6">
            <div class="rounded-3 overflow-hidden">
                <img src="{{ asset('images/med.png') }}" class="img-fluid" alt="About" style="height: 400px">
            </div>
            </div>
        </div>
    </div>
</section>


<section class="py-5">
    <div class="container">
        <div class="row g-4">
        <div class="col-lg-7">
            <h3 class="fw-bold text-blue mb-3">Our Mission</h3>
            <p class="text-muted">
                {{ $mission->paragraph ?? 'Deliver accessible health insights for everyone. We collaborate with medical experts to validate our content and continuously improve model performance.' }}
            </p>

            <h4 class="fw-bold text-blue mt-4 mb-3">How We Work</h4>

            @if(!empty($workItems))
                <ul class="list-unstyled m-0">
                    @foreach($workItems as $it)
                    @php
                        // fallback للأيقونة لو مش موجودة
                        $icon = $it['icon'] ?? 'fa-solid fa-circle-check';
                    @endphp
                    <li class="d-flex mb-3">
                        <i class="{{ $icon }} text-main me-3 mt-1"></i>
                        <div>
                        <strong>{{ $it['point'] ?? '' }}</strong>
                        @if(!empty($it['description']))
                            <div class="text-muted small">{{ $it['description'] }}</div>
                        @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="col-lg-5">
            <div class="p-4 rounded-3 border bg-white h-100">
            <h5 class="fw-bold mb-3 text-blue"><i class="fa-solid fa-heart-pulse me-2"></i> Values</h5>
            <div class="d-grid gap-2">
                @if(!empty($valuesItems))
                    @foreach($valuesItems as $val)
                        <div class="p-3 bg-light rounded-3">
                            <strong>{{ $val['point'] ?? '' }}</strong><br>
                            <span class="text-muted small">{{ $val['description'] ?? '' }}</span>
                        </div>
                    @endforeach
                @endif

            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection

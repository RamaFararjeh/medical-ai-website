@extends('layout.admin-layout.app')

@section('title', 'Medical Settings')

@section('content')
<div class="container">
  <h2 class="fw-bold text-primary mb-4">
    <i class="fas fa-stethoscope me-2"></i> Medical Website Settings
  </h2>

  <form action="#" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Clinic / Platform Info --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-light fw-bold">
        <i class="fas fa-hospital me-2"></i> Clinic / Platform Info
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label>Clinic / Platform Name</label>
          <input type="text" name="site_name" class="form-control" value="Medicate — AI Diagnosis">
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label>Contact Email (Medical Support)</label>
            <input type="email" name="email" class="form-control" value="support@medicate.health">
          </div>
          <div class="col-md-6">
            <label>Hotline / Phone</label>
            <input type="text" name="phone" class="form-control" value="+962 7X XXX XXXX">
          </div>
        </div>

        <div class="mt-3">
          <label>Clinic Address</label>
          <input type="text" name="address" class="form-control" placeholder="Amman, Jordan — King Hussein Business Park">
        </div>

        <div class="row g-3 mt-1">
          <div class="col-md-6">
            <label>Working Hours</label>
            <input type="text" name="hours" class="form-control" placeholder="Sat–Thu, 9:00–17:00">
          </div>
          <div class="col-md-6">
            <label>Footer Text</label>
            <input type="text" name="footer_text" class="form-control" value="© 2025 Medicate. All health rights reserved.">
          </div>
        </div>
      </div>
    </div>

    {{-- Social & Profiles --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-light fw-bold">
        <i class="fas fa-share-nodes me-2"></i> Social & Profiles
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-4">
            <label>Facebook (Clinic Page)</label>
            <input type="url" name="facebook" class="form-control" value="https://facebook.com/medicate.health">
          </div>
          <div class="col-md-4">
            <label>Instagram (Health Tips)</label>
            <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/medicate.health">
          </div>
          <div class="col-md-4">
            <label>LinkedIn (Organization)</label>
            <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/company/medicate">
          </div>
        </div>
      </div>
    </div>

    {{-- Branding --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-light fw-bold">
        <i class="fas fa-syringe me-2"></i> Branding
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label>Clinic / Platform Logo</label>
            <input type="file" name="logo" class="form-control">
            <small class="text-muted">Recommended: PNG/SVG, transparent background.</small>
          </div>
          <div class="col-md-6">
            <label>Favicon</label>
            <input type="file" name="favicon" class="form-control">
            <small class="text-muted">Recommended: 32×32 PNG/ICO.</small>
          </div>
        </div>
      </div>
    </div>

    {{-- Homepage Sections --}}
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-light fw-bold">
        <i class="fas fa-house-medical me-2"></i> Homepage Sections
      </div>
      <div class="card-body">
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_hero" checked>
          <label class="form-check-label">
            Show Hero (Medical Banner + CTA)
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_symptoms_checker" checked>
          <label class="form-check-label">
            Show Symptoms Checker (AI Diagnosis)
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_services" checked>
          <label class="form-check-label">
            Show Medical Services
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_doctors" checked>
          <label class="form-check-label">
            Show Doctors / Specialists
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_appointments" checked>
          <label class="form-check-label">
            Show Appointments CTA
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_faq" checked>
          <label class="form-check-label">
            Show Medical FAQs
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_contact" checked>
          <label class="form-check-label">
            Show Contact / Location
          </label>
        </div>

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="show_privacy_banner" checked>
          <label class="form-check-label">
            Show Privacy & Data Protection Banner
          </label>
        </div>
      </div>
    </div>

    <button class="btn btn-primary">
      <i class="fas fa-save me-1"></i> Save Medical Settings
    </button>
  </form>
</div>
@endsection

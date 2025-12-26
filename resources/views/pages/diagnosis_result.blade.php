@extends('layout.page-layout.app')
@section('title','Diagnosis Result')

@section('content')
<section class="diag-hero border-bottom">
  <div class="container py-4">
    <div class="d-flex align-items-center justify-content-between">
      <div>
        <h1 class="h3 fw-bold mb-1 text-blue">AI Diagnosis Result</h1>
        <p class="text-muted mb-0">Preliminary suggestions based on your selected symptoms.</p>
      </div>
      <a href="{{ route('diagnosis.new') }}" class="btn btn-outline-blue d-none d-md-inline-flex">
        <i class="fa-solid fa-arrow-left me-2"></i> Start New Check
      </a>
    </div>

    <div class="diag-steps mt-4">
      <div class="step done"><span>1</span><small>Profile & Consent</small></div>
      <div class="sep"></div>
      <div class="step done"><span>2</span><small>Symptoms</small></div>
      <div class="sep"></div>
      <div class="step active"><span>3</span><small>AI Result</small></div>
    </div>
  </div>
</section>

<section class="py-4 py-md-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        {{-- Summary card --}}
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-blue">
              <i class="fa-solid fa-clipboard-check me-2"></i>Summary
            </h5>
            @if(!empty($predictions))
            <span class="badge px-3 py-2 fw-semibold"
            style="background:#d1e8ff; color:#0b5ed7; border-radius:50px;">
                Top match: {{ $predictions[0]['disease'] ?? '' }}
              </span>
            @endif
          </div>
          <div class="card-body">
            <p class="small text-muted mb-2">
              This result is generated automatically using a machine learning model trained on symptom–disease data.
              It is not a final medical diagnosis.
            </p>

            <div class="row g-3 mb-3">
              <div class="col-sm-4">
                <div class="small text-muted">Age</div>
                <div class="fw-semibold">{{ $age ?? '—' }}</div>
              </div>
              <div class="col-sm-4">
                <div class="small text-muted">Gender</div>
                <div class="fw-semibold text-capitalize">{{ $gender ?? '—' }}</div>
              </div>
              <div class="col-sm-4">
                <div class="small text-muted">Selected symptoms</div>
                <div class="fw-semibold">{{ count($selectedSymptoms ?? []) }}</div>
              </div>
            </div>

            @if(!empty($selectedSymptoms))
            <div class="mb-3">
              <div class="small text-muted mb-1">Symptoms you selected:</div>
          
              <div class="d-flex flex-wrap gap-2">
                @foreach($selectedSymptoms as $s)
                  <span class="badge rounded-pill text-bg-primary px-3 py-2">
                    {{ ucfirst($s) }}
                  </span>
                @endforeach
              </div>
            </div>
          @endif
          
          </div>
        </div>
        @if($suggestedSpecialty)
        <div class="card mt-3">
          <div class="card-body">
            <h6 class="fw-bold text-blue mb-1">
              Recommended specialist
            </h6>
            <p class="mb-1">Suggested specialty: <strong>{{ $suggestedSpecialty }}</strong></p>
      
            @if($suggestedDoctor)
              <p class="mb-0">
                Doctor: <strong>{{ $suggestedDoctor->name }}</strong>
                @if($suggestedDoctor->clinic_name)
                  – {{ $suggestedDoctor->clinic_name }}
                @endif
              </p>
            @else
              <p class="mb-0 small text-muted">No doctor found for this specialty in the system yet.</p>
            @endif
          </div>
        </div>
      @endif
      @if(!empty($suggestedMedicines))
  <div class="card mt-3">
    <div class="card-body">
      <h6 class="fw-bold text-blue mb-2">
        <i class="fa-solid fa-pills me-2"></i>Suggested medicines (supportive)
      </h6>

      <ul class="small text-muted mb-0">
        @foreach($suggestedMedicines as $m)
          <li>{{ $m }}</li>
        @endforeach
      </ul>

      <div class="alert alert-warning small mt-3 mb-0">
        These are general supportive/OTC suggestions and not a prescription. Always consult a doctor/pharmacist.
      </div>
    </div>
  </div>
@endif

        {{-- Predictions table --}}
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-white">
            <h5 class="m-0 fw-bold text-blue"><i class="fa-solid fa-stethoscope me-2"></i>AI Suggestions</h5>
          </div>
          <div class="card-body">
            @if(empty($predictions))
              <p class="text-muted m-0 small">No predictions were returned from the AI service.</p>
            @else
              <div class="table-responsive">
                <table class="table table-sm align-middle mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Disease</th>
                      <th>Estimated probability</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($predictions as $idx => $pred)
                      <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $pred['disease'] }}</td>
                        <td>{{ number_format($pred['probability'] * 100, 1) }}%</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          
            <div class="alert alert-warning small mt-3 mb-0">
              <i class="fa-solid fa-triangle-exclamation me-2"></i>
              Always consult a doctor or qualified healthcare provider before making any medical decisions.
            </div>
          </div>
        </div>
      </div>




      {{-- Right: Next steps --}}
      <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <h6 class="fw-bold text-blue mb-2">
              <i class="fa-solid fa-notes-medical me-2"></i>What to do next
            </h6>
            <ul class="small text-muted mb-0">
              <li>Use these suggestions to prepare questions for your doctor.</li>
              <li>If your top result matches how you feel, seek a medical opinion.</li>
              <li>If your symptoms are getting worse, go to an emergency department.</li>
            </ul>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-body">
            <h6 class="fw-bold text-blue mb-2"><i class="fa-solid fa-book-medical me-2"></i>Read related articles</h6>
            <p class="small text-muted mb-2">
              In the next phase we can link each disease to a trusted medical article page.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

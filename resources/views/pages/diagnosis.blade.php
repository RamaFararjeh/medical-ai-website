@extends('layout.page-layout.app')
@section('title','Start Diagnosis')

@section('content')
<section class="diag-hero border-bottom">
  <div class="container py-4">
    <div class="d-flex align-items-center justify-content-between">
      <div>
        <h1 class="h3 fw-bold mb-1 text-blue">Symptom Checker</h1>
        <p class="text-muted mb-0">Select your symptoms and get AI-assisted suggestions.</p>
      </div>
      <a href="{{ route('home') }}" class="btn btn-outline-blue d-none d-md-inline-flex">
        <i class="fa-solid fa-arrow-left me-2"></i> Back Home
      </a>
    </div>

    {{-- Stepper --}}
    <div class="diag-steps mt-4">
      <div class="step active"><span>1</span><small>Profile & Consent</small></div>
      <div class="sep"></div>
      <div class="step"><span>2</span><small>Select Symptoms</small></div>
      <div class="sep"></div>
      <div class="step"><span>3</span><small>AI Result</small></div>
    </div>
  </div>
</section>

<section class="py-4 py-md-5">
  <div class="container">
    <div class="row g-4">
      {{-- Left: Form --}}
      <div class="col-lg-8">
        <form id="diagForm" method="POST" action="{{ route('diagnosis.result') }}" autocomplete="off">
          @csrf

          {{-- Card: Basic Profile --}}
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
              <h5 class="m-0 fw-bold text-blue">
                <i class="fa-regular fa-id-badge me-2"></i>Basic Profile
              </h5>
            </div>
            <div class="card-body row g-3">
              <div class="col-sm-4">
                <label class="form-label">Age <span class="text-danger">*</span></label>
                <input type="number" min="0" max="120" class="form-control" name="age"
                       id="age" placeholder="e.g., 30" required>
              </div>
              <div class="col-sm-8">
                <label class="form-label">Gender</label>
                <div class="d-flex gap-2 flex-wrap">
                  <input type="radio" class="btn-check" name="gender" id="g-male" value="male" checked>
                  <label class="btn btn-outline-blue" for="g-male"><i class="fa-solid fa-mars me-1"></i> Male</label>

                  <input type="radio" class="btn-check" name="gender" id="g-female" value="female">
                  <label class="btn btn-outline-blue" for="g-female"><i class="fa-solid fa-venus me-1"></i> Female</label>

                  <input type="radio" class="btn-check" name="gender" id="g-other" value="other">
                  <label class="btn btn-outline-blue" for="g-other"><i class="fa-solid fa-user me-1"></i> Other</label>
                </div>
              </div>
            </div>
          </div>

          {{-- Card: Symptoms --}}
          <div class="card shadow-sm mb-4">
            <div class="card-header bg-white d-flex align-items-center justify-content-between">
              <h5 class="m-0 fw-bold text-blue">
                <i class="fa-solid fa-clipboard-list me-2"></i> Select Symptoms
              </h5>
              <span class="badge bg-light text-blue fw-semibold">
                <i class="fa-solid fa-check-double me-1"></i>
                <span id="selCount">0</span> selected
              </span>
            </div>
            <div class="card-body">
              {{-- Search --}}
              <div class="row g-3 align-items-center mb-3">
                <div class="col-md-8">
                  <div class="input-group">
                    <span class="input-group-text bg-white">
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" class="form-control" id="symSearch"
                           placeholder="Search symptom, e.g. fever / headache">
                  </div>
                </div>
                <div class="col-md-4 text-md-end">
                  <span class="small text-muted">Select at least one symptom.</span>
                </div>
              </div>

              {{-- Symptoms grid (coming from controller as $symptomsFromApi) --}}
              <div class="sym-grid" id="symGrid">
                @foreach($symptoms as $sym)
                  {{-- $sym is full feature name from API, e.g. "fever", "cough", "shortness of breath" --}}
                  <label class="sym-chip" data-label="{{ $sym }}">
                    <input type="checkbox" name="symptoms[]" value="{{ $sym }}" class="d-none">
                    <span>{{ ucfirst($sym) }}</span>
                  </label>
                @endforeach
              </div>
            </div>
          </div>

          {{-- Actions --}}
          <div class="d-flex align-items-center gap-2 mb-3">
            <button type="submit" id="btnAnalyze" class="btn btn-blue px-4 fw-semibold" disabled>
              <i class="fa-solid fa-wand-magic-sparkles me-2"></i> Analyze with AI
            </button>
            <button type="reset" class="btn btn-outline-blue">Reset</button>
          </div>

          <div class="alert alert-warning small mb-0">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            This tool does not replace a doctor. Seek urgent care for severe or worrying symptoms.
          </div>
        </form>
      </div>

      {{-- Right: Safety / Tips --}}
      <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2">
              <i class="fa-solid fa-shield-heart text-main me-2"></i>
              <h6 class="m-0 fw-bold">Safety First</h6>
            </div>
            <p class="small text-muted mb-2">
              This AI tool is for education and support only. It does not provide a final medical diagnosis.
            </p>
            <ul class="small text-muted mb-0">
              <li>For emergencies call your local emergency number.</li>
              <li>Do not ignore severe chest pain, difficulty breathing, or confusion.</li>
              <li>Always follow up with a healthcare professional.</li>
            </ul>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-body">
            <h6 class="fw-bold text-blue mb-2">
              <i class="fa-solid fa-lightbulb me-2"></i>How to get better results
            </h6>
            <ul class="small text-muted m-0">
              <li>Select all symptoms that apply to you, not just the main one.</li>
              <li>Be honest about your age and gender.</li>
              <li>If in doubt, repeat the check and then talk to a doctor.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('scripts')
<script>
  (function () {
    const grid      = document.getElementById('symGrid');
    const search    = document.getElementById('symSearch');
    const countSpan = document.getElementById('selCount');
    const ageInput  = document.getElementById('age');
    const btn       = document.getElementById('btnAnalyze');
    const form      = document.getElementById('diagForm');

    // لو لأي سبب عنصر ناقص، ما نكمّل
    if (!grid || !search || !countSpan || !ageInput || !btn || !form) {
      return;
    }

    function updateButtonState() {
      const selectedCount = grid.querySelectorAll('input:checked').length;
      const hasAge        = !!+ageInput.value;   // لازم يكون العمر مش فاضي
      btn.disabled        = !(selectedCount > 0 && hasAge);
    }

    // ✅ اختيار الأعراض (chip toggle)
    grid.addEventListener('click', function (e) {
      const chip = e.target.closest('.sym-chip');
      if (!chip) return;

      e.preventDefault(); // نوقف سلوك الـ label الافتراضي

      const chk = chip.querySelector('input[type=checkbox]');
      chk.checked = !chk.checked;
      chip.classList.toggle('active', chk.checked);

      countSpan.textContent = grid.querySelectorAll('input:checked').length;
      updateButtonState();
    });

    // فلترة بالسيرتش
    search.addEventListener('input', function (e) {
      const q = e.target.value.toLowerCase();
      grid.querySelectorAll('.sym-chip').forEach(function (chip) {
        chip.style.display = chip.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    });

    // تحديث حالة الزر لما العمر يتغيّر
    ageInput.addEventListener('input', updateButtonState);

    // عند Reset
    form.addEventListener('reset', function () {
      setTimeout(function () {
        grid.querySelectorAll('.sym-chip').forEach(function (chip) {
          chip.classList.remove('active');
          chip.querySelector('input[type=checkbox]').checked = false;
        });
        countSpan.textContent = '0';
        updateButtonState();
      }, 0);
    });
  })();
</script>
@endpush

<style>
  .sym-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
  gap: 0.75rem;
  max-height: 360px;        /* ارتفاع ثابت */
  overflow-y: auto;         /* سكرول داخلي مرتب */
  padding-right: 4px;
}

/* شكل الأعراض */
.sym-chip {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: .6rem 1rem;
  border-radius: 999px;
  border: 1px solid #dee2e6;
  background-color: #fff;
  cursor: pointer;
  font-size: 0.9rem;
  transition: all .15s ease-in-out;
  text-align: center;
}

.sym-chip:hover {
  background-color: #f8f9fa;
}

/* المختار */
.sym-chip.active {
  background-color: #0d6efd10;
  border-color: #0d6efd;
  color: #0d6efd;
  box-shadow: 0 0 0 .1rem rgba(13,110,253,.15);
}

</style>
@endsection


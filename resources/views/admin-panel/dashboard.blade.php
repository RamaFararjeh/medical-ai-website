@extends('layout.admin-layout.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">

  {{-- =========================
     Doctor Dashboard (Doctor only)
  ========================= --}}
  @if($isDoctor)
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h2 class="fw-bold m-0" style="color:#133b4b!important">
        <i class="fa-solid fa-user-doctor me-2"></i> Doctor Dashboard
      </h2>

      <span class="badge rounded-pill bg-info text-dark px-3 py-2">
        Doctor View
      </span>
    </div>

    <div class="alert alert-info d-flex align-items-center mb-3">
      <i class="fa-solid fa-circle-info me-2"></i>
      <div>
        <strong>Doctor Area</strong>
        <div class="small">هذه البيانات خاصة بالطبيب فقط.</div>
      </div>
    </div>

    @if(!$myDoctor)
      <div class="alert alert-warning">
        <strong>تنبيه:</strong> ما قدرنا نلاقي سجل الدكتور بجدول <code>doctors</code>.
        <div class="small mt-1">
          تأكدي إن <code>doctors.email</code> = <code>users.email</code> لنفس الحساب.
        </div>
      </div>
    @else
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-light fw-bold d-flex align-items-center justify-content-between">
          <div>
            <i class="fa-solid fa-id-card me-2"></i> My Information
          </div>
          <a href="{{ route('admin.doctors.edit', $myDoctor->id) }}" class="btn btn-sm btn-outline-primary">
            <i class="fa-regular fa-pen-to-square me-1"></i> Edit My Profile
          </a>
        </div>

        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="text-muted small">Name</div>
              <div class="fw-semibold">{{ $myDoctor->name }}</div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Specialty</div>
              <div class="fw-semibold">{{ $myDoctor->specialty ?? '—' }}</div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Email</div>
              <div class="fw-semibold">{{ $myDoctor->email ?? '—' }}</div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Phone</div>
              <div class="fw-semibold">{{ $myDoctor->phone ?? '—' }}</div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Experience</div>
              <div class="fw-semibold">
                {{ !empty($myDoctor->years_experience) ? $myDoctor->years_experience.' yrs' : '—' }}
              </div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Status</div>
              <div class="fw-semibold">
                @if(!empty($myDoctor->is_active))
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-secondary">Inactive</span>
                @endif
              </div>
            </div>

            @if(!empty($myDoctor->bio))
              <div class="col-12">
                <div class="text-muted small">Bio</div>
                <div>{{ $myDoctor->bio }}</div>
              </div>
            @endif
          </div>
        </div>
      </div>
    @endif

    {{-- فاصل بين Doctor و Admin لو نفس الشخص معهم الدورين --}}
    @if($isAdmin)
      <hr class="my-5">
      <div class="text-center mb-4">
        <span class="badge rounded-pill bg-secondary px-4 py-2">
          Admin Section Below
        </span>
      </div>
    @endif
  @endif


  {{-- =========================
     Admin Dashboard (Admin only)
  ========================= --}}
  @if($isAdmin)
    <h2 class="fw-bold mb-4" style="color: #133b4b!important">
      <i class="fas fa-chart-line me-2"></i> Admin Dashboard
    </h2>

    {{-- KPIs --}}
    <div class="row g-3">

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-user-doctor fa-2x text-primary mb-2"></i>
          <div class="text-muted">Doctors</div>
          <div class="h3 fw-bold text-primary mb-0">{{ $stats['doctors'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-users fa-2x text-success mb-2"></i>
          <div class="text-muted">Users</div>
          <div class="h3 fw-bold text-success mb-0">{{ $stats['users'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-circle-info fa-2x text-secondary mb-2"></i>
          <div class="text-muted">About</div>
          <div class="h3 fw-bold text-secondary mb-0">{{ $stats['about'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-list-check fa-2x text-teal mb-2"></i>
          <div class="text-muted">Values</div>
          <div class="h3 fw-bold text-teal mb-0">{{ $stats['values'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-bullseye fa-2x text-danger mb-2"></i>
          <div class="text-muted">Mission</div>
          <div class="h3 fw-bold text-danger mb-0">{{ $stats['mission'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-briefcase fa-2x text-dark mb-2"></i>
          <div class="text-muted">Work</div>
          <div class="h3 fw-bold text-dark mb-0">{{ $stats['work'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-diagram-project fa-2x text-info mb-2"></i>
          <div class="text-muted">Process</div>
          <div class="h3 fw-bold text-info mb-0">{{ $stats['process'] ?? 0 }}</div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card shadow-sm border-0 p-3 bg-light h-100 text-center">
          <i class="fa-solid fa-address-book fa-2x text-warning mb-2"></i>
          <div class="text-muted">Contact Info</div>
          <div class="h3 fw-bold text-warning mb-0">{{ $stats['contactInfo'] ?? 0 }}</div>
        </div>
      </div>

    </div>

    {{-- Latest Doctors --}}
    <div class="row g-3 mt-3">
      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header bg-light fw-bold">
            <i class="fa-solid fa-user-doctor me-2"></i> Latest Doctors
          </div>
          <div class="card-body p-0">
            @if(($latest['doctors'] ?? collect())->isEmpty())
              <div class="p-3 text-muted">No doctors yet.</div>
            @else
              <ul class="list-group list-group-flush">
                @foreach($latest['doctors'] as $d)
                  <li class="list-group-item d-flex align-items-center">
                    @php
                      $photo = !empty($d->photo) ? route('media.public', ['path' => $d->photo]) : null;
                    @endphp

                    @if($photo)
                      <img src="{{ $photo }}" class="rounded me-3" style="width:40px;height:40px;object-fit:cover">
                    @else
                      <div class="rounded bg-light me-3" style="width:40px;height:40px;line-height:40px;text-align:center">—</div>
                    @endif

                    <div class="flex-fill">
                      <div class="fw-semibold">{{ $d->name ?? '—' }}</div>
                      <div class="small text-muted">{{ $d->specialty ?? '—' }}</div>
                    </div>

                    <a href="{{ route('admin.doctors.edit', $d->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header bg-light fw-bold">
            <i class="fa-solid fa-gears me-2"></i> Quick Actions
          </div>
          <div class="card-body">
            <div class="row g-2">
              <div class="col-6">
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-outline-primary w-100">
                  <i class="fa-solid fa-user-plus me-1"></i> Add Doctor
                </a>
              </div>
              <div class="col-6">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('about.index') ? 'about.index':'admin.about.index') }}" class="btn btn-outline-secondary w-100">
                  <i class="fa-solid fa-circle-info me-1"></i> Manage About
                </a>
              </div>
              <div class="col-6">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('value.index') ? 'value.index':'admin.value.index') }}" class="btn btn-outline-teal w-100">
                  <i class="fa-solid fa-list-check me-1"></i> Manage Values
                </a>
              </div>
              <div class="col-6">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('work.index') ? 'work.index':'admin.work.index') }}" class="btn btn-outline-dark w-100">
                  <i class="fa-solid fa-briefcase me-1"></i> Manage Work
                </a>
              </div>
              <div class="col-6">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('mission.index') ? 'mission.index':'admin.mission.index') }}" class="btn btn-outline-danger w-100">
                  <i class="fa-solid fa-bullseye me-1"></i> Manage Mission
                </a>
              </div>
              <div class="col-6">
                <a href="{{ route(\Illuminate\Support\Facades\Route::has('process.index') ? 'process.index':'admin.process.index') }}" class="btn btn-outline-info w-100">
                  <i class="fa-solid fa-diagram-project me-1"></i> Manage Process
                </a>
              </div>
            </div>

            <hr>
            <p class="mb-0 text-muted small">
              Need to update clinic contact details?
              <a href="{{ route(\Illuminate\Support\Facades\Route::has('contact.index') ? 'contact.index':'admin.contact.index') }}">
                Go to Contact Info
              </a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  @endif

</div>

<style>
  .text-teal{ color:#0aa; }
  .btn-outline-teal{ border-color:#0aa; color:#0aa; }
  .btn-outline-teal:hover{ background:#0aa; color:#fff; }
</style>
@endsection

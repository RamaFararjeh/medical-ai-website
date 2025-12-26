@php
  $admin = Auth::guard('web')->user(); // أو Auth::user()
@endphp


<div id="sidebar" class="sidebar">
  <div class="logo text-center py-3">
      <img src="{{ asset('images/logo.png') }}" alt="Medical Logo">
  </div>

  <nav class="nav flex-column">

    {{-- —— Core —— --}}
    <hr class="my-1">
    <small class="ps-3 text-muted text-uppercase">Core</small>

    @if($admin && $admin->hasPermission('dashboard'))
      <a class="nav-link px-3 py-2 @if(request()->routeIs('dashboard')) active @endif"
         href="{{ route('dashboard') }}">
        <i class="fa-solid fa-gauge me-2"></i> Dashboard
      </a>
    @endif


    {{-- —— AI Diagnosis —— --}}
    @php
      $canSeeAiDiagnosis = $admin && (
        $admin->hasPermission('diagnosis-logs.index') ||
        $admin->hasPermission('diagnosis-reports.index')
      );
    @endphp

    @if($canSeeAiDiagnosis)
      <hr class="my-1">
      <small class="ps-3 text-muted text-uppercase">AI Diagnosis</small>
    @endif

    @if($admin && $admin->hasPermission('diagnosis-reports.index'))
      <a class="nav-link px-3 py-2 d-flex align-items-center
                @if(request()->routeIs('admin.diagnosis.reports.*')) active @endif"
         href="{{ route('admin.diagnosis.reports.index') }}">
        <i class="fa-solid fa-chart-line me-2"></i> Diagnosis Reports
      </a>
    @endif


    {{-- —— Management —— --}}
    <hr class="my-1">
    <small class="ps-3 text-muted text-uppercase">Management</small>

    @if($admin && $admin->hasPermission('roles.index'))
      <a class="nav-link px-3 py-2 @if(request()->routeIs('roles.*')) active @endif"
         href="{{ route('roles.index') }}">
        <i class="fa-solid fa-shield-halved me-2"></i> Roles
      </a>
    @endif

    @if($admin && $admin->hasPermission('users.list'))
      <a class="nav-link px-3 py-2 @if(request()->routeIs('users.*')) active @endif"
         href="{{ route('users.list') }}">
        <i class="fa-solid fa-users me-2"></i> Users
      </a>
    @endif


    {{-- —— Content —— --}}
    <hr class="my-1">
    <small class="ps-3 text-muted text-uppercase">Content</small>

    @php
      $contentChildActive =
          request()->routeIs('about.*')   || request()->routeIs('admin.about.*')
       || request()->routeIs('value.*')   || request()->routeIs('admin.value.*')
       || request()->routeIs('mission.*') || request()->routeIs('admin.mission.*')
       || request()->routeIs('work.*')    || request()->routeIs('admin.work.*')
       || request()->routeIs('process.*') || request()->routeIs('admin.process.*');

      $canSeeAnyContent = $admin && (
        $admin->hasPermission('about.index') ||
        $admin->hasPermission('value.index') ||
        $admin->hasPermission('mission.index') ||
        $admin->hasPermission('work.index') ||
        $admin->hasPermission('process.index')
      );
    @endphp

    @if($canSeeAnyContent)
      <div class="nav-item">
        <button class="nav-link px-3 py-2 w-100 d-flex align-items-center justify-content-between
                        @if($contentChildActive) active @endif"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#contentMenu"
                aria-expanded="{{ $contentChildActive ? 'true' : 'false' }}"
                aria-controls="contentMenu">
          <span><i class="fa-solid fa-folder-tree me-2"></i> Content</span>
          <i class="fa-solid fa-chevron-down small"
             style="transition:.2s; transform: rotate({{ $contentChildActive ? 180 : 0 }}deg);"></i>
        </button>

        <div id="contentMenu" class="collapse @if($contentChildActive) show @endif">
          <nav class="nav flex-column ms-3 my-1">

            @if($admin->hasPermission('about.index'))
              <a class="nav-link px-3 py-2 d-flex align-items-center
                        @if(request()->routeIs('about.*') || request()->routeIs('admin.about.*')) active @endif"
                 href="{{ route(\Illuminate\Support\Facades\Route::has('about.index') ? 'about.index' : 'admin.about.index') }}">
                <i class="fa-solid fa-circle-info me-2"></i> About
              </a>
            @endif

            @if($admin->hasPermission('value.index'))
              <a class="nav-link px-3 py-2 d-flex align-items-center
                        @if(request()->routeIs('value.*') || request()->routeIs('admin.value.*')) active @endif"
                 href="{{ route(\Illuminate\Support\Facades\Route::has('value.index') ? 'value.index' : 'admin.value.index') }}">
                <i class="fa-solid fa-list-check me-2"></i> Values
              </a>
            @endif

            @if($admin->hasPermission('mission.index'))
              <a class="nav-link px-3 py-2 d-flex align-items-center
                        @if(request()->routeIs('mission.*') || request()->routeIs('admin.mission.*')) active @endif"
                 href="{{ route(\Illuminate\Support\Facades\Route::has('mission.index') ? 'mission.index' : 'admin.mission.index') }}">
                <i class="fa-solid fa-bullseye me-2"></i> Mission
              </a>
            @endif

            @if($admin->hasPermission('work.index'))
              <a class="nav-link px-3 py-2 d-flex align-items-center
                        @if(request()->routeIs('work.*') || request()->routeIs('admin.work.*')) active @endif"
                 href="{{ route(\Illuminate\Support\Facades\Route::has('work.index') ? 'work.index' : 'admin.work.index') }}">
                <i class="fa-solid fa-briefcase me-2"></i> Work
              </a>
            @endif

          </nav>
        </div>
      </div>
    @endif

    @if($admin && $admin->hasPermission('process.index'))
      <a class="nav-link px-3 py-2 d-flex align-items-center
                @if(request()->routeIs('process.*') || request()->routeIs('admin.process.*')) active @endif"
         href="{{ route(\Illuminate\Support\Facades\Route::has('process.index') ? 'process.index' : 'admin.process.index') }}">
        <i class="fa-solid fa-diagram-project me-2"></i> Process
      </a>
    @endif

    @if($admin && $admin->hasPermission('contact.index'))
      <a class="nav-link px-3 py-2 d-flex align-items-center
                @if(request()->routeIs('contact.*') || request()->routeIs('admin.contact.*')) active @endif"
         href="{{ route(\Illuminate\Support\Facades\Route::has('contact.index') ? 'contact.index' : 'admin.contact.index') }}">
        <i class="fa-solid fa-address-book me-2"></i> Contact Info
      </a>
    @endif

    @if($admin && $admin->hasPermission('contact-messages.index'))
      <a class="nav-link px-3 py-2 d-flex align-items-center
                @if(request()->routeIs('admin.messages.*')) active @endif"
         href="{{ route('admin.messages.index') }}">
        <i class="fa-solid fa-envelope-open-text me-2"></i> Messages
      </a>
    @endif
    @if($admin && $admin->hasPermission('patients.index'))
    <a class="nav-link px-3 py-2 @if(request()->routeIs('admin.patients.*')) active @endif"
       href="{{ route('admin.patients.index') }}">
      <i class="fa-solid fa-hospital-user me-2"></i> Patients
    </a>
  @endif
  
    @if($admin && $admin->hasPermission('doctors.index'))
      <a class="nav-link px-3 py-2 @if(request()->routeIs('admin.doctors.*')) active @endif"
         href="{{ route('admin.doctors.index') }}">
        <i class="fa-solid fa-user-doctor me-2"></i> Doctors
      </a>
    @endif

    @if($admin && $admin->hasPermission('setting'))
      <a class="nav-link px-3 py-2 @if(request()->routeIs('setting')) active @endif"
         href="{{ route('setting') }}">
        <i class="fa-solid fa-gear me-2"></i> Settings
      </a>
    @endif

  </nav>
</div>

@extends('layout.admin-layout.app')
@section('title','AI Diagnosis Report')

@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4 fw-bold text-blue">AI Diagnosis Analytics</h1>

    {{-- فلتر التاريخ (اختياري) --}}
    <form class="d-flex gap-2" method="GET" action="{{ route('admin.diagnosis.reports.index') }}">
        <input type="date" name="from" class="form-control form-control-sm" value="{{ $filters['from'] ?? '' }}">
        <input type="date" name="to"   class="form-control form-control-sm" value="{{ $filters['to'] ?? '' }}">
        <button class="btn btn-sm btn-blue">Filter</button>
    </form>
  </div>

  @if($total == 0)
    <div class="alert alert-info">No diagnosis data yet.</div>
  @endif

  <div class="row g-4 mb-4">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-1">Total diagnoses</h6>
          <div class="fs-3 fw-bold">{{ $total }}</div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h6 class="text-muted mb-2">Risk levels</h6>
          @forelse($riskCounts as $r)
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-capitalize">{{ $r->risk ?? 'unknown' }}</span>
              <span class="fw-semibold">{{ $r->total }}</span>
            </div>
          @empty
            <p class="small text-muted mb-0">No data.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-white">
          <h6 class="m-0 fw-bold text-blue">Top diseases</h6>
        </div>
        <div class="card-body">
          <table class="table table-sm mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Disease</th>
                <th>Count</th>
              </tr>
            </thead>
            <tbody>
              @forelse($topDiseases as $idx => $row)
                <tr>
                  <td>{{ $idx + 1 }}</td>
                  <td>{{ $row->top_disease }}</td>
                  <td>{{ $row->total }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-muted small">No data.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-white">
          <h6 class="m-0 fw-bold text-blue">Top symptoms</h6>
        </div>
        <div class="card-body">
          <table class="table table-sm mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Symptom</th>
                <th>Count</th>
              </tr>
            </thead>
            <tbody>
              @forelse($topSymptoms as $idx => $row)
                <tr>
                  <td>{{ $idx + 1 }}</td>
                  <td>{{ $row->symptom }}</td>
                  <td>{{ $row->total }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" class="text-muted small">No data.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

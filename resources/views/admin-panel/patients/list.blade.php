@extends('layout.admin-layout.app')
@section('title','Patients')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Patients</h3>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Registered?</th>
            <th>Last Login</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($items as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td class="fw-semibold">{{ $row->name ?? '—' }}</td>
              <td>{{ $row->email ?? '—' }}</td>
              <td>{{ $row->phone ?? '—' }}</td>
              <td>
                @if($row->password)
                  <span class="badge bg-success">Yes</span>
                @else
                  <span class="badge bg-secondary">Guest</span>
                @endif
              </td>
              <td>{{ $row->last_login_at?->format('Y-m-d H:i') ?? '—' }}</td>
              <td>
                @if($row->is_active)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-secondary">Inactive</span>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="text-center text-muted py-4">No patients yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $items->links() }}
    </div>
  </div>
</div>
@endsection

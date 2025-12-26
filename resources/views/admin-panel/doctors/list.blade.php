@extends('layout.admin-layout.app')
@section('title','Doctors — List')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Doctors</h3>

    {{-- ✅ زر Add يظهر للأدمن فقط --}}
    @if(!empty($isAdmin) && $isAdmin)
      <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus me-1"></i> Add
      </a>
    @endif
  </div>

  @if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
  @endif

  {{-- ✅ تنبيه للدكتور --}}
  @if(!empty($isDoctor) && $isDoctor && empty($isAdmin))
    <div class="alert alert-info">
      <strong>Doctor View:</strong> يمكنك تعديل معلوماتك فقط.
    </div>
  @endif

  <div class="card border-0 shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:70px">#</th>
            <th style="width:80px">Photo</th>
            <th>Name</th>
            <th>Specialty</th>
            <th>Age</th>
            <th>Experience</th>

            {{-- ✅ Status للأدمن فقط --}}
            @if(!empty($isAdmin) && $isAdmin)
              <th>Status</th>
            @endif

            <th style="width:220px">Actions</th>
          </tr>
        </thead>

        <tbody>
          @forelse($items as $row)
            <tr>
              <td>{{ $loop->iteration }}</td>

              <td>
                @if(!empty($row->photo))
                  <img src="{{ route('media.public', ['path' => $row->photo]) }}"
                       class="rounded" style="width:48px;height:48px;object-fit:cover">
                @else
                  <div class="bg-light text-center rounded"
                       style="width:48px;height:48px;line-height:48px;">—</div>
                @endif
              </td>

              <td class="fw-semibold">{{ $row->name }}</td>
              <td class="text-muted">{{ $row->specialty ?? '—' }}</td>
              <td>{{ $row->age ?? '—' }}</td>
              <td>{{ $row->years_experience ? $row->years_experience.' yrs' : '—' }}</td>

              @if(!empty($isAdmin) && $isAdmin)
                <td>
                  @if($row->is_active)
                    <span class="badge bg-success">Active</span>
                  @else
                    <span class="badge bg-secondary">Inactive</span>
                  @endif
                </td>
              @endif

              <td>
                {{-- ✅ Edit مسموح للجميع (بس الكنترولر بحمي إن الدكتور يعدّل نفسه فقط) --}}
                <a href="{{ route('admin.doctors.edit',$row) }}" class="btn btn-sm btn-outline-primary">
                  <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                </a>

                {{-- ✅ Delete للأدمن فقط --}}
                @if(!empty($isAdmin) && $isAdmin)
                  <form class="d-inline" method="POST" action="{{ route('admin.doctors.destroy',$row) }}"
                        onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="fa-regular fa-trash-can me-1"></i> Delete
                    </button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="{{ (!empty($isAdmin) && $isAdmin) ? 8 : 7 }}" class="text-center text-muted py-4">
                No data found.
                @if(!empty($isDoctor) && $isDoctor && empty($isAdmin))
                  <div class="small mt-2">
                    تأكد أن ايميل حسابك مطابق لإيميل الطبيب داخل جدول doctors.
                  </div>
                @endif
              </td>
            </tr>
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

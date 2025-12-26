@extends('layout.admin-layout.app')
@section('title','Mission — List')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Mission</h3>
    <a href="{{ route('admin.mission.create') }}" class="btn btn-primary">
      <i class="fa-solid fa-plus me-1"></i> Add
    </a>
  </div>

  @if(session('ok')) <div class="alert alert-success">{{ session('ok') }}</div> @endif

  <div class="card border-0 shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:70px">#</th>
            <th>Paragraph</th>
            <th style="width:160px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($items as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td class="text-muted" style="max-width:720px">
                {{ \Illuminate\Support\Str::limit($row->paragraph, 160) }}
              </td>
              <td>
                <a href="{{ route('admin.mission.edit',$row) }}" class="btn btn-sm btn-outline-primary">
                  <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                </a>
                <form class="d-inline" method="POST" action="{{ route('admin.mission.destroy',$row) }}"
                      onsubmit="return confirm('Are you sure you want to delete this item?');">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="fa-regular fa-trash-can me-1"></i> Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center text-muted py-4">No data found.</td></tr>
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

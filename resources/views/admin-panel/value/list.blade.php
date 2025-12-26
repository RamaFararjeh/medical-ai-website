@extends('layout.admin-layout.app')
@section('title','Values — List')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Values</h3>
    <a href="{{ route('admin.value.create') }}" class="btn btn-primary">
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
            <th>Preview</th>
            <th style="width:140px">Items</th>
            <th style="width:180px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($items as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td class="text-muted" style="max-width:520px">
                @php
                  $first = is_array($row->items) && count($row->items) ? $row->items[0] : null;
                @endphp
                @if($first)
                  <div><strong>{{ \Illuminate\Support\Str::limit($first['point'] ?? '', 60) }}</strong></div>
                  <div class="small">{{ \Illuminate\Support\Str::limit($first['description'] ?? '', 120) }}</div>
                @else
                  <em>No items</em>
                @endif
              </td>
              <td>
                <span class="badge bg-secondary">{{ is_array($row->items) ? count($row->items) : 0 }}</span>
              </td>
              <td>
                <a href="{{ route('admin.value.edit',$row) }}" class="btn btn-sm btn-outline-primary">
                  <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                </a>
                <form class="d-inline" method="POST" action="{{ route('admin.value.destroy',$row) }}"
                      onsubmit="return confirm('Are you sure you want to delete this record?');">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="fa-regular fa-trash-can me-1"></i> Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-muted py-4">No data found.</td></tr>
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

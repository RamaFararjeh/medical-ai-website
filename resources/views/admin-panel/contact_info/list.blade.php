@extends('layout.admin-layout.app')
@section('title','Contact Info — List')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Contact Info</h3>
    <a href="{{ route('admin.contact.create') }}" class="btn btn-primary">
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
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th style="width:180px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($items as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td class="text-muted">{{ $row->address }}</td>
              <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
              <td>{{ $row->phone }}</td>
              <td>
                <a href="{{ route('admin.contact.edit',$row) }}" class="btn btn-sm btn-outline-primary">
                  <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                </a>
                <form class="d-inline" method="POST" action="{{ route('admin.contact.destroy',$row) }}"
                      onsubmit="return confirm('Are you sure you want to delete this item?');">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="fa-regular fa-trash-can me-1"></i> Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center text-muted py-4">No data found.</td></tr>
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

@extends('layout.admin-layout.app')
@section('title','Contact Messages')

@section('content')
<div class="container-fluid py-3">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="mb-0">Contact Messages</h4>

    <form class="d-flex gap-2" method="get">
      <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Search name, email, subject...">
      <select name="sort" class="form-select">
        <option value="created_at" @selected($col==='created_at')>Latest</option>
        <option value="name"       @selected($col==='name')>Name</option>
        <option value="email"      @selected($col==='email')>Email</option>
        <option value="subject"    @selected($col==='subject')>Subject</option>
      </select>
      <select name="dir" class="form-select">
        <option value="desc" @selected($dir==='desc')>DESC</option>
        <option value="asc"  @selected($dir==='asc')>ASC</option>
      </select>
      <button class="btn btn-primary">Filter</button>
    </form>
  </div>

  @if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
  @endif

  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th style="min-width:180px">Name</th>
            <th style="min-width:220px">Email</th>
            <th>Subject</th>
            <th style="width:30%">Message</th>
            <th style="min-width:150px">Created</th>
            <th style="width:120px">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($messages as $i => $m)
            <tr>
              <td>{{ $messages->firstItem() + $i }}</td>
              <td class="fw-semibold">{{ $m->name }}</td>
              <td><a href="mailto:{{ $m->email }}">{{ $m->email }}</a></td>
              <td>{{ $m->subject }}</td>
              <td class="text-muted small">{{ Str::limit($m->message, 120) }}</td>
              <td>
                <span class="badge text-bg-light border">
                  {{ $m->created_at?->format('Y-m-d H:i') }}
                </span>
              </td>
              <td>
                <div class="btn-group">
                  <a href="{{ route('admin.messages.show',$m->id) }}" class="btn btn-sm btn-outline-primary">
                    View
                  </a>
                  <form action="{{ route('admin.messages.destroy',$m->id) }}" method="post"
                        onsubmit="return confirm('Delete this message?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="text-center text-muted py-4">No messages found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
      <div class="small text-muted">
        Showing {{ $messages->firstItem() }}–{{ $messages->lastItem() }} of {{ $messages->total() }}
      </div>
      {{ $messages->links() }}
    </div>
  </div>
</div>
@endsection

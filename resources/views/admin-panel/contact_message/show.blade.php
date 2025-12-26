@extends('layout.admin-layout.app')
@section('title','Message #'.$message->id)

@section('content')
<div class="container-fluid py-3">
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-start mb-3">
        <h5 class="mb-0">Message #{{ $message->id }}</h5>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-secondary">Back</a>
      </div>

      <dl class="row">
        <dt class="col-sm-2">Name</dt>
        <dd class="col-sm-10">{{ $message->name }}</dd>

        <dt class="col-sm-2">Email</dt>
        <dd class="col-sm-10"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></dd>

        <dt class="col-sm-2">Subject</dt>
        <dd class="col-sm-10">{{ $message->subject }}</dd>

        <dt class="col-sm-2">Message</dt>
        <dd class="col-sm-10">{{ $message->message }}</dd>

        <dt class="col-sm-2">Created</dt>
        <dd class="col-sm-10">{{ $message->created_at?->format('Y-m-d H:i') }}</dd>
      </dl>
    </div>
  </div>
</div>
@endsection

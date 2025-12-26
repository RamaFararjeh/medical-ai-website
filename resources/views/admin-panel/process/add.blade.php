@extends('layout.admin-layout.app')
@section('title','Process — Add')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Add Process</h3>
    <a href="{{ route('admin.process.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.process.store') }}">
        @csrf

        <div class="mb-2 d-flex align-items-center justify-content-between">
          <label class="form-label m-0">Items</label>
          <button type="button" class="btn btn-sm btn-outline-primary" id="btnAddItem">
            <i class="fa-solid fa-plus"></i> Add item
          </button>
        </div>

        <div id="itemsWrapper">
          @php
            $oldTitles = old('titles', ['']);
            $oldDescs  = old('descriptions', ['']);
          @endphp

          @foreach($oldTitles as $idx => $t)
            <div class="row g-2 align-items-start item-row mb-2">
              <div class="col-md-4">
                <input type="text" name="titles[]" value="{{ $t }}" class="form-control" placeholder="Title">
              </div>
              <div class="col-md-7">
                <input type="text" name="descriptions[]" value="{{ $oldDescs[$idx] ?? '' }}" class="form-control" placeholder="Description">
              </div>
              <div class="col-md-1 d-grid">
                <button type="button" class="btn btn-outline-danger btnRemoveItem" title="Remove">
                  <i class="fa-solid fa-xmark"></i>
                </button>
              </div>
            </div>
          @endforeach
        </div>

        @error('titles') <div class="text-danger small mb-2">{{ $message }}</div> @enderror

        <div class="text-end">
          <button class="btn btn-primary">
            <i class="fa-regular fa-circle-check me-1"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
(function(){
  const wrapper = document.getElementById('itemsWrapper');
  const btnAdd  = document.getElementById('btnAddItem');

  function bindRemove(){
    wrapper.querySelectorAll('.btnRemoveItem').forEach(btn=>{
      btn.onclick = function(){
        const row = this.closest('.item-row');
        if(wrapper.querySelectorAll('.item-row').length > 1){
          row.remove();
        } else {
          row.querySelectorAll('input').forEach(i=> i.value = '');
        }
      }
    });
  }

  btnAdd.onclick = function(){
    const div = document.createElement('div');
    div.className = 'row g-2 align-items-start item-row mb-2';
    div.innerHTML = `
      <div class="col-md-4">
        <input type="text" name="titles[]" class="form-control" placeholder="Title">
      </div>
      <div class="col-md-7">
        <input type="text" name="descriptions[]" class="form-control" placeholder="Description">
      </div>
      <div class="col-md-1 d-grid">
        <button type="button" class="btn btn-outline-danger btnRemoveItem" title="Remove">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>`;
    wrapper.appendChild(div);
    bindRemove();
  }

  bindRemove();
})();
</script>
@endsection

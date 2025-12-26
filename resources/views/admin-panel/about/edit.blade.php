@extends('layout.admin-layout.app')
@section('title','About — Edit')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="m-0">Edit About #{{ $about->id }}</h3>
    <a href="{{ route('admin.about.index') }}" class="btn btn-light border">
      <i class="fa-solid fa-arrow-left-long me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.about.update',$about) }}">
        @csrf @method('PUT')

        <div class="mb-3">
          <label class="form-label">Paragraph</label>
          <textarea name="paragraph" rows="5" class="form-control @error('paragraph') is-invalid @enderror">{{ old('paragraph',$about->paragraph) }}</textarea>
          @error('paragraph') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-2 d-flex align-items-center justify-content-between">
          <label class="form-label m-0">Points</label>
          <button type="button" class="btn btn-sm btn-outline-primary" id="btnAddPoint">
            <i class="fa-solid fa-plus"></i> Add point
          </button>
        </div>

        <div id="pointsWrapper">
          @php $oldPoints = old('points', $defaultPoints ?? [""]); @endphp
          @foreach($oldPoints as $idx => $val)
            <div class="input-group mb-2 point-row">
              <input type="text" name="points[]" value="{{ $val }}" class="form-control" placeholder="Write a point...">
              <button type="button" class="btn btn-outline-danger btnRemovePoint" title="Remove">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          @endforeach
        </div>
        @error('points') <div class="text-danger small mb-2">{{ $message }}</div> @enderror

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
    const wrapper = document.getElementById('pointsWrapper');
    const btnAdd  = document.getElementById('btnAddPoint');

    function bindRemoveBtns(){
      wrapper.querySelectorAll('.btnRemovePoint').forEach(btn=>{
        btn.onclick = function(){
          const row = this.closest('.point-row');
          if(wrapper.querySelectorAll('.point-row').length > 1){
            row.remove();
          } else {
            row.querySelector('input').value = '';
          }
        }
      });
    }

    btnAdd.onclick = function(){
      const div = document.createElement('div');
      div.className = 'input-group mb-2 point-row';
      div.innerHTML = `
        <input type="text" name="points[]" class="form-control" placeholder="Write a point...">
        <button type="button" class="btn btn-outline-danger btnRemovePoint" title="Remove">
          <i class="fa-solid fa-xmark"></i>
        </button>`;
      wrapper.appendChild(div);
      bindRemoveBtns();
    }

    bindRemoveBtns();
  })();
</script>
@endsection

@include('admin/templates/header')  
<style>
  </style>
<div class="container-fluid pt-4 px-4">
  <div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h6 class="mb-0">Import Students</h6>
    </div>
    <form action="/import_student_process" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="student_file" class="form-label">Select Student Excel File</label>
        <input class="form-control" type="file" id="student_file" name="student_file">
        @error('student_file')
        <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Import Students</button>
    </form>
    @if (session()->has('message'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
  </div>
</div>

@include('admin/templates/footer')  

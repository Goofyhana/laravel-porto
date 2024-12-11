@extends('layouts.app')

@section('content')
<form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-sm bg-light">
@csrf
<h4 class="mb-4">Add New Project</h4>  

   <!-- Name -->
<div class="mb-3">
    <label for="name" class="form-label fw-bold">Name</label> 
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Enter Project Name" required>
</div>

   <!-- Link -->
<div class="mb-3">
    <label for="link" class="form-label fw-bold">Link</label>
    <input type="url" class="form-control" id="link" name="link" placeholder="Enter Project Link (e.g., https://example.com)" required>
</div>

   <!-- IssuedAt -->
<div class="mb-3">
    <label for="issued_at" class="form-label fw-bold">Issued At</label>
    <input type="date" class="form-control" id="issued_at" name="issued_at" placeholder="Enter Issued At" required>
</div>

  <!-- Description -->
<div class="mb-3">
    <label for="description" class="form-label fw-bold">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe the project"></textarea>
</div>

<button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
@endsection

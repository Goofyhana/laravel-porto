@extends('layouts.app')

@section('content')
<form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-sm bg-light">
@csrf
<h4 class="mb-4">Add New Certificate</h4>  
   <!-- Name -->
<div class="mb-3">
    <label for="name" class="form-label fw-bold">Name</label> 
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Certificate Name" required>
  </div>
   <!-- IssuedBy -->
  <div class="mb-3">
    <label for="issued_by" class="form-label fw-bold">Issued By</label>
    <input type="text" class="form-control" id="issued_by" name="issued_by" placeholder="Enter Issued Name" required>
  </div>
   <!-- IssuedAt -->
  <div class="mb-3">
    <label for="issued_at" class="form-label fw-bold">Issued At</label>
    <input type="date" class="form-control" id="issued_at" name="issued_at" placeholder="Enter Issued At" required>
  </div>
  <!-- Description -->
  <div class="mb-3">
    <label for="description" class="form-label fw-bold">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe the certificate"></textarea>
  </div>
  <!-- File -->
  <div class="mb-3">
        <label for="file" class="form-label fw-bold">Upload File (PDF only)</label>
        <input type="file" class="form-control" id="file" name="file" accept="application/pdf" required>
    </div>
    <!-- Submit Button -->
  <button type="submit" class="btn btn-primary w-100">Submit</button>
  </form>

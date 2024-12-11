@extends('layouts.app')

@section('content')
<h2>Edit Certificate</h2>

<form action="{{ route('certificate.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="{{ $certificate->name }}" 
               placeholder="Enter Certificate Name" required>
    </div>

    <!-- Issued By -->
    <div class="mb-3">
        <label for="issued_by" class="form-label fw-bold">Issued By</label>
        <input type="text" class="form-control" id="issued_by" name="issued_by" 
               value="{{ $certificate->issued_by }}" 
               placeholder="Enter Issued By" required>
    </div>

    <!-- Issued At -->
    <div class="mb-3">
        <label for="issued_at" class="form-label fw-bold">Issued At</label>
        <input type="date" class="form-control" id="issued_at" name="issued_at" 
               value="{{ $certificate->issued_at }}" 
               placeholder="Enter Issued At" required>
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" 
                  placeholder="Describe the certificate">{{ $certificate->description }}</textarea>
    </div>

    <!-- File -->
    <div class="mb-3">
        <label for="file" class="form-label fw-bold">Upload File (PDF only)</label>
        <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
        <p class="mt-2">
            Current file: 
            @if ($certificate->file)
                <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank">View current file</a>
            @else
                No file uploaded
            @endif
        </p>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

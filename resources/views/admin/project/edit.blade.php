@extends('layouts.app')

@section('content')
<h2>Edit Project</h2>

<form action="{{ route('project.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ $project->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="issued_at">Issued At</label>
        <input type="date" class="form-control" id="issued_at" name="issued_at" value="{{ $project->issued_at }}" required>
    </div>

    <div class="form-group">
        <label for="link">link</label>
        <input type="text" class="form-control" id="link" name="link" value="{{ $project->link }}" required>
    </div>

    

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

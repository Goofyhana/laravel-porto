@extends('layouts.app')

@section('content')
<form action="{{ route('skill.store')}}" method="POST" class="p-4 rounded shadow-sm bg-light">
    @csrf
    <h4 class="mb-4">Add New Skill</h4>
    <div class="mb-3">
        <label for="title" class="form-label fw-bold">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter skill title" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe the skill" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>

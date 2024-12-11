@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Home List</h2>
    <a href="{{ route('homeabout.create') }}" class="btn btn-primary">Create New Skill</a>
  </div>
  
  <table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>  
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($homeabout as $row)
      <tr>
        <td>{{ $row->title }}</td>
        <td>{{ $row->description }}</td>
        <td>
          <button onclick="confirmEdit('{{ $row->id }}')" class="btn btn-warning btn-sm">Edit</button>
          <form action="{{ route('skill.destroy', $row->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var successMessage = @json(session('success')); // Mengirim data session ke JavaScript

  if (successMessage) {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: successMessage
    });
  }
</script>

<script>
  // Jika ada session success, tampilkan SweetAlert

  function confirmEdit(skillId) {
    Swal.fire({
      title: 'Are you sure you want to edit this skill?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Edit it!',
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/skill/' + skillId + '/edit';
      }
    });
  }
</script>

@endsection

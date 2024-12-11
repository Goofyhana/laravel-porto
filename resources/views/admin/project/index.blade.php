<!-- resources/views/skill/index.blade.php -->
@extends('layouts.app')

@section('content')
<style>
.navbar {
    width: 100%;
    background-color: #333;
}

.navbar ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 10px 0;
}

.navbar li {
    margin: 0 20px;
}

.navbar a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s ease;
}

.navbar a:hover {
    background-color: #f39c12;
    transform: scale(1.1);
    color: #fff;
}

.navbar a:focus, .navbar a:active {
    outline: none;
}

@media (max-width: 768px) {
    .navbar ul {
        flex-direction: column;
        padding: 0;
    }

    .navbar li {
        margin: 10px 0;
    }
}
</style>
<nav class="navbar">
            <ul>
                <li><a href="skill">Skill</a></li>
                <li><a href="project">Project</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="certificate">Certificate</a></li>
            </ul>
        </nav>
<div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Project</h2>
    <a href="{{ route('project.create') }}" class="btn btn-primary">Create New Project</a>
  </div>
  
  <table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Issued At</th>
        <th scope="col">Link</th>  
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($project as $row)
      <tr>
        <td>{{ $row->name }}</td>
        <td>{{ $row->description }}</td>
        <td>{{ $row->issued_at }}</td>
        <td>{{ $row->link }}</td>
        <td>
        <button onclick="confirmEdit('{{ $row->id }}')" class="btn btn-warning btn-sm">Edit</button>
          <form action="{{ route('project.destroy', $row->id) }}" method="POST" style="display:inline-block;">
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
        window.location.href = '/project/' + skillId + '/edit';
      }
    });
  }
</script>
@endsection

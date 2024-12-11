Data Skill
<a href="{{ route('skill.create') }}">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach ($Skill as $row)
    <tr>
      <th scope="row">1</th>
      <td>{{ $row->title }}</td>
      <td>{{ $row->description }}</td>
      <td>
        <a href="">Detail</a>
        <a href="">Edit</a>
        <a href="">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
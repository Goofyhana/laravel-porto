@extends('layouts.app')

@section('content')
<h2>Edit contact</h2>

<form action="{{ route('contact.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')

   <!-- Nama -->
   <div class="mb-3">
    <label for="name" class="form-label fw-bold">Nama</label> 
    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
</div>

   <!-- Email (Gmail) -->
<div class="mb-3">
    <label for="gmail" class="form-label fw-bold">Email (Gmail)</label>
    <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Masukkan Email" required>
</div>

   <!-- WhatsApp -->
<div class="mb-3">
    <label for="whatsapp" class="form-label fw-bold">WhatsApp</label>
    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Masukkan Nomor WhatsApp" required>
</div>

  <!-- Link -->
<div class="mb-3">
    <label for="link" class="form-label fw-bold">Link</label>
    <input type="url" class="form-control" id="link" name="link" placeholder="Masukkan Link (Opsional)">
</div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

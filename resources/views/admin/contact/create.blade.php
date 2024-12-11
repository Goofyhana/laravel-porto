@extends('layouts.app')

@section('content')
<form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data" class="p-4 rounded shadow-sm bg-light">
@csrf
<h4 class="mb-4">Tambah Kontak Baru</h4>

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

<button type="submit" class="btn btn-primary w-100">Kirim</button>
</form>
@endsection
